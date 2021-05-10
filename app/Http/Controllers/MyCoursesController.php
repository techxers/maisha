<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\MyCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
       $search=$request->value;
       $mycourses=MyCourse::where('user_id',Auth::user()->id)->paginate(4);
       $courses=Course::all();
       if($search==null)
       {
           $mycourses=MyCourse::where('user_id',Auth::user()->id)->paginate(4);
       }
       else{
            $courses=Course::where('title', 'LIKE', "%{$search}%")->paginate(4);
       }
        
    
        return view('dashboard.mycourses',compact('mycourses','courses','search'));
    }
    public function enroll($id)
    {
        $course=Course::where('id',$id)->first();
        
        $mycourse= new MyCourse;
        $mycourse->user_id=Auth::user()->id;
        $mycourse->course_id=$course->id;
        $mycourse->progress='enrolled';
        $mycourse->save();

        return redirect()->back()->with('success','Course enrolled successfully');
    }
}
