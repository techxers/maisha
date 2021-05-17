<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\View;
use App\Models\Video;
use App\Models\Course;
use App\Models\Category;
use App\Models\MyCourse;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        
        $enrolled=View::all();

    
        if($user->role_id==2){
            $ins_courses=Course::all()->where('user_id',Auth::user()->id);
            return view('instructor.dashboard',compact('courses','ins_courses','enrolled'));
        }
        else if($user->role_id==0)
        {
            $ins_courses=Course::all();
            return view('instructor.dashboard',compact('courses','ins_courses','enrolled'));
        }
        else if($user->role_id==1){
            $courses=Course::where('status','active')->paginate(10);
            return view('dashboard.courses',compact('courses','categories','subcategories','search'));
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
        return view('dashboard.courses',compact('mycourses','courses','categories','subcategories','search'));
    }
    public function viewcourse($id,Request $request)
    {
      
        $user_id=Auth()->user()->id;
        $views=View::all();
       
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

            return view("dashboard.viewcourse",compact('course','categories','video','videos','instructor','play_id','views'));
    
    }
    public function mycourses(Request $request)
    {
        $search=$request->value;
       $mycourses=View::where('user_id',Auth::user()->id)->paginate(4);
       $courses=Course::all();
       $videos=Video::all();
       if($search==null)
       {
           $mycourses=View::where('user_id',Auth::user()->id)->paginate(4);
       }
       else{
            $courses=Course::where('title', 'LIKE', "%{$search}%")->paginate(4);
       }
        
    
        return view('dashboard.mycourses',compact('mycourses','courses','search','videos'));
    }
    public function inactive()
    {
        return view('instructor.pending');
    }
}
