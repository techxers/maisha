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
    public function index(){
        $user=Auth::user();
        $courses=Course::all();
        $ins_courses=Course::all()->where('user_id',Auth::user()->id);
        
        $enrolled=MyCourse::all();
        $mycourses=MyCourse::all()->where('user_id',Auth::user()->id);
    
        if($user->role_id==2){
            return view('instructor.dashboard',compact('courses','ins_courses','enrolled'));
        }
        else if($user->role_id==0)
        {
            return view('instructor.dashboard',compact('courses'));
        }
        else if($user->role_id==1){
            return view('dashboard.dashboard',compact('courses','mycourses'));
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
        if($search==null)
        {
            $courses=Course::where('status','active')->paginate(3);
        }
        else{
            $courses=Course::where('status','active')->where('title', 'LIKE', "%{$search}%")->paginate(6);
            
        }
        
        $categories=Category::all();
        $subcategories=Subcategory::all();
        return view('dashboard.courses',compact('courses','categories','subcategories','search'));
    }
    public function viewcourse($id,Request $request)
    {
        $enrolled= False;
        $user_id=Auth()->user()->id;
        $mycourse=MyCourse::where('course_id',$id)->where('user_id',$user_id)->first();
       
        if($mycourse)
        {
            $enrolled=True;
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

            return view("dashboard.viewcourse",compact('course','enrolled','categories','video','videos','instructor','play_id'));
    
    }
    public function inactive()
    {
        return view('instructor.pending');
    }
}
