<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use App\Models\View;
use App\Models\Forum;
use App\Models\Video;
use App\Models\Course;
use App\Models\MyQuiz;
use App\Models\Category;
use App\Models\MyCourse;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class DashboardController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
        $search=$request->value;
   
        $user=Auth::user();
        $courses=Course::all();
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $forums=Forum::all();
        
        $enrolled=View::all();
        $quizzes=Quiz::all();
    
        if($user->role_id==2){
            $ins_courses=Course::where('user_id',Auth::user()->id)->paginate(5);
            $myviews=View::all();
            $allquizzes=MyQuiz::all();

            $quizzes=Quiz::all()->where('user_id',Auth::user()->id);
            $myquizzes=Quiz::where('user_id',Auth::user()->id)->pluck('id');
            $attempts=MyQuiz::whereIn('quiz_id',$myquizzes)->distinct('quiz_id')->pluck('quiz_id');
            //dd($attempts);
            return view('instructor.dashboard',compact('allquizzes','quizzes','attempts','myviews','courses','ins_courses','enrolled'));
        }
        else if($user->role_id==0)
        {
            $views=View::all()->pluck('course_id');
            $ins_courses=Course::withCount('views')->orderBy('views_count','DESC')->get();
            //dd( $ins_courses);
            $forums=Forum::orderBy('created_at','DESC')->get();

            return view('instructor.dashboard',compact('courses','ins_courses','enrolled','forums'));
        }
        else if($user->role_id==1){
            $courses=Course::where('status','active')->paginate(10);
            $quizzes=Quiz::all()->where('status','approved');
            return view('dashboard.courses',compact('quizzes','courses','categories','subcategories','search'));
        }
    }
    public function coursemanager(Request $request)
    {
        if(Auth::user()->role_id==2)
        {
           $search=$request->value;
           if($search==null)
           {
                $courses=Course::where('user_id',Auth::user()->id)->paginate(4);
           }
           else{
                 $courses=Course::where('user_id',Auth::user()->id)->where('title', 'LIKE', "%{$search}%")->paginate(4);
        }
            
            return view('instructor.mycourses',compact('courses','search'));
        }
        else{
            $search=$request->value;
           if($search==null)
           {
                $courses=Course::paginate(4);
           }
           else{
                 $courses=Course::where('title', 'LIKE', "%{$search}%")->paginate(4);
           }
            
            return view('courses.index',compact('courses','search'));
        }
    }
    public function courses(Request $request)
    {
        $search=$request->value;
        $courses=null;
        $category=$request->category;
        $subcategory=$request->subcategory;


        if($search==null)
        {
            $courses=Course::where('status','active')->paginate(10);
        }
        else if($search!=null && $category=='all' && $subcategory=='all'){
            $courses=Course::where('status','active')->where('title', 'LIKE', "%{$search}%")->paginate(10);
        }
        else if($search!=null && $category!='all' && $subcategory=='all'){
            $courses=Course::where('status','active')->where('title', 'LIKE', "%{$search}%")->where('category','LIKE',"%{$category}%")->paginate(10);
        }
        else if($search!=null && $category=='all' && $subcategory!='all'){
            $courses=Course::where('status','active')->where('title', 'LIKE', "%{$search}%")->where('subcategory','LIKE',"%{$subcategory}%")->paginate(10);
        }
        else if($search!=null && $category!='all' && $subcategory!='all'){
            $courses=Course::where('status','active')->where('title', 'LIKE', "%{$search}%")->where('category','LIKE',"%{$category}%")->orWhere('subcategory','LIKE',"%{$subcategory}%")->paginate(10);
        }
        else if($search==null && $category!='all' && $subcategory!='all'){
            $courses=Course::where('status','active')->where('category','LIKE',"%{$category}%")->orWhere('subcategory','LIKE',"%{$subcategory}%")->paginate(10);
        }
        else if($search==null && $category=='all' && $subcategory!='all'){
            $courses=Course::where('status','active')->Where('subcategory','LIKE',"%{$subcategory}%")->paginate(10);
        }
        else if($search==null && $category!='all' && $subcategory=='all'){
            $courses=Course::where('status','active')->where('category','LIKE',"%{$category}%")->paginate(10);
        }
    
        $mycourses=View::all()->where('user_id',Auth::user()->id);
    
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $quizzes=Quiz::all()->where('status','approved');
        return view('dashboard.courses',compact('quizzes','mycourses','courses','categories','subcategories','search'));
    }
    public function viewcourse($id,Request $request)
    {
      
        $user_id=Auth()->user()->id;
        $views=View::all();
        $quiz=Quiz::where('course_id',$id)->first();
        $show_quiz=false;
        if($quiz && $quiz->questions->count()>0)
        {
            $show_quiz=true;
        }
            $course=Course::findOrFail($id);
            $play_id=$request->play_id;
            
            if($play_id==null)
            {
                $video=Video::where('course_id',$course->id)->first();
            }
            else{
                $video=Video::where('id',$play_id)->first();
                $view= View::where('course_id',$course->id)->where('video_id',$play_id)->where('user_id',Auth::user()->id)->first();
                if(!$view)
                {
                    $view= new View;
                    $view->course_id=$course->id;
                    $view->user_id=Auth::user()->id;
                    $view->video_id=$play_id;
                    $view->save();
                }
            }
        
            $categories=Category::all();
        
            $videos=Video::all()->where('course_id',$id);
            $instructor=User::where('id',$course->user_id)->first();

            return view("dashboard.viewcourse",compact('show_quiz','quiz','course','categories','video','videos','instructor','play_id','views'));
    
    }
    public function mycourses(Request $request)
    {
        $search=$request->value;
       $mycourses=View::where('user_id',Auth::user()->id)->paginate(8);
       $courses=Course::all();
       $videos=Video::all();
       if($search==null)
       {
           $mycourses=View::where('user_id',Auth::user()->id)->paginate(8);
       }
       else{
            $courses=Course::where('title', 'LIKE', "%{$search}%")->paginate(8);
       }
        
    
        return view('dashboard.mycourses',compact('mycourses','courses','search','videos'));
    }
    public function inactive()
    {
        return view('instructor.pending');
    }
    public function profile($id)
    {
        if(Auth::user()->role_id==1)
        {
            $user=User::findOrFail($id);
            return view('dashboard.profile');
        }
        $user=User::findOrFail($id);
        return view('instructor.profile');
    }
    public function viewprofile($id)
    {
        $user=User::findOrFail($id);
        if(Auth::user()->role_id==2 || Auth::user()->role_id==0)
        {
            if($user->role_id==2 || $user->role_id==0)
            {
            
                return view('users.show',compact('user'));
            }
            else if($user->role_id==1)
            {
                return view('users.trainee_profile',compact('user'));
            }
        }
        else if(Auth::user()->role_id==1)
        {
            if($user->role_id==2 || $user->role_id==0)
            {
            
                return view('dashboard.instructor_profile',compact('user'));
            }
            else if($user->role_id==1)
            {
                return view('dashboard.public_profile',compact('user'));
            }
        }
    }
    public function update($id,Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
        ]);
            $photoname=null;
            if($request->has('photo'))
            {
                $request->validate([
                    'photo'=>'mimes:jpeg,jpg,png,gif|required'
                ]);
                $photo=$request->photo;
                $img = Image::make($photo);
                $img->resize(110, 110);
                $photoname=time()."_.".$photo->getClientOriginalExtension();
                $img->save(public_path("Images/".$photoname));
            }
            else{
                $photoname=Auth::user()->photo;
            }
            $password=Auth::user()->password;
            if($request->password==null)
            {
                $password=Auth::user()->password;
            }
            else
            {
                $request->validate([
                    'password'=>'min:8',
                ]);
                $password=Hash::make($request->password);
            }
            $filename=Auth::user()->certificate;
            if($request->has('file'))
            {
                $request->validate([
                    'file'=>['required','mimes:pdf']
                ]);
                $filename=time().'_.'.$request->file->extension();
                $request->file->move(public_path('certificates'), $filename);
            }
      
        $user=User::findOrFail($id);
        $user->name=$request->name;
        $user->photo=$photoname;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->certificate=$filename;
        $user->password=$password;
        $user->save();


        return redirect()->back()->with('success','Profile updated successfully');
    }
    public function markread()
    {
        $user=Auth::user();
        $user->notifications->markAsRead();

        return redirect()->back();
    }

}
