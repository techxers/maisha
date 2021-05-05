<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
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
        if($user->role_id==2||$user->role_id==0){
            return view('instructor.dashboard',compact('courses'));
        }
        else if($user->role_id==1){
            return view('dashboard.dashboard',compact('courses'));
        }
    }
    public function coursemanager()
    {
        if(Auth::user()->role_id==2)
        {
            $courses=Course::all()->where('user_id',Auth::user()->id);
            return view('instructor.mycourses',compact('courses'));
        }
        else{
            $courses=Course::all();
            return view('courses.index',compact('courses'));
        }
    }
    public function courses()
    {
        $courses=Course::all()->where('status','active');
        return view('dashboard.courses',compact('courses'));
    }
    public function viewcourse($id)
    {
        
        $course=Course::findOrFail($id);
        return view('dashboard.viewcourse',compact('course'));
    }
    public function inactive()
    {
        return view('instructor.pending');
    }
}
