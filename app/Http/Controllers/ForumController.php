<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Forum;
use App\Models\Course;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ForumNotification;
use Illuminate\Support\Facades\Notification;

class ForumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role_id==1){
        $instructors=User::all()->where('role_id',2);
        $trainees=User::all()->where('role_id',1);
        $courses=Course::all();
        $myforums=Forum::where('user_id',Auth::user()->id)->paginate(5);
        $forums=Forum::paginate(5);

        return view('forums.index',compact('instructors','courses','forums','myforums','trainees'));
        }
        else if(Auth::user()->role_id==2)
        {
            $courses=Course::all()->where('user_id',Auth::user()->id);
            $trainees=User::all()->where('role_id',1);
            $general=Forum::where('course_id',0)->paginate(5);
            $forums=Forum::where('course_id','!=',0)->paginate(5);
            return view('instructor_forums.index',compact('courses','general','forums','trainees'));
        }
        else if(Auth::user()->role_id==0)
        {
            $courses=Course::all();
            $trainees=User::all()->where('role_id',1);
            $general=Forum::where('course_id',0)->paginate(5);
            $forums=Forum::where('course_id','!=',0)->paginate(5);
            return view('instructor_forums.index',compact('courses','general','forums','trainees'));
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses=Course::all();
        return view('forums.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string',
            'description'=>'required|string'
        ]);
        
        $forum= new Forum;
        $forum->title=$request->title;
        $forum->description=$request->description;
        $forum->course_id=$request->course_id;
        $forum->user_id=Auth::user()->id;
        $forum->save();
         
        $course=Course::findOrFail($forum->course_id);

        if($forum->course_id!=0)
        {
            $user=User::where('id',$course->user_id)->first();
        }
        else{
            $user=User::all()->where('role_id',2);
        }
       
        $type='forum';
        $sender_id=$forum->user_id;
        $forum_id=$forum->id;
        $course_id=$forum->course_id;
        Notification::send($user,new ForumNotification($type,$sender_id,$forum,$course_id));
        

        return redirect()->route('forums')->with('success','Your question has been posted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $forum=Forum::findOrFail($id);
        $instructors=User::all()->where('role_id',2);
        $courses=Course::all();
        $user=User::findOrFail($forum->user_id);
        $replies=Reply::all()->where('forum_id',$id);
        $users=User::all();

        if(Auth::user()->role_id==1)
        {
    
            return view('forums.show',compact('users','forum','instructors','courses','user','replies'));
        }
        else{
            return view('instructor_forums.show',compact('users','forum','instructors','courses','user','replies'));
        }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $forum=Forum::findOrFail($id);
        $forum->delete();

        return redirect()->route('forums')->with('success','Question removed successfully');
    }
}
