<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('courses.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'category'=>'required',
            'file'=>'required|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',
            'thumbnail'=>'mimes:jpeg,jpg,png,gif|required'
        ]);
        $course= new Course;
        $file =$request->file;
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path("uploads"), $filename);

        $thumbnail=$request->thumbnail;
        $thumbname=time()."_.".$thumbnail->getClientOriginalExtension();
        $thumbnail->move(public_path("Images"), $thumbname);

        $course->title=$request->title;
        $course->user_id=Auth::user()->id;
        $course->description=$request->description;
        $course->category=$request->category;
        $course->thumbnail=$thumbname;
        $course->save();

        $video=new Video;
        $video->course_id=$course->id;
        $video->path=$filename;
        $video->save();

        return redirect()->route('coursemanager')->with('success','Course uploaded successfully');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course=Course::findOrFail($id);
        $categories=Category::all();

        if(Auth::user()->id==$course->user_id){
            return view("courses.edit",compact('course','categories'));
        }
        else{
            return view("courses.manage",compact('course','categories'));
        }
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
    
        $course=Course::findOrFail($id);

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'category'=>'required',
        ]);
        
        $filename=null;
        if($request->has('file')){
            $request->validate([
                'file'=>'required|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',
            ]);
            $file =$request->file;
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("uploads"), $filename);
        }
        else{
            $filename=$course->path;
        }

        $thumbname=null;
        if($request->has('thumbnail')){
            $request->validate([
                'thumbnail'=>'mimes:jpeg,jpg,png,gif'
            ]);
            $thumbnail=$request->thumbnail;
            $thumbname=time()."_.".$thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path("Images"), $thumbname);
        }
        else{
            $thumbname=$course->thumbnail;
        }

        $course->title=$request->title;
        $course->description=$request->description;
        $course->category=$request->category;
        $course->path=$filename;
        $course->thumbnail=$thumbname;
        $course->save();

        return redirect()->route('coursemanager')->with('success','Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course=Course::findOrFail($id);
        $course->delete();

        return redirect()->route('coursemanager')->with('success','Course deleted successfully');

    }

    public function approve($id)
    {
        $course=Course::findOrFail($id);
        $course->status='active';
        $course->save();

        return redirect()->back()->with('success','Course approved successfully');
    }
    public function disapprove($id)
    {
        $course=Course::findOrFail($id);
        $course->status='inactive';
        $course->save();

        return redirect()->back()->with('success','Course disapproved successfully');
    }
}
