<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
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
    public function create($id)
    {
        $course_id=Course::where('id',$id)->first();
        return view('videos.create',compact('course_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $request->validate([
            'title'=>'required',
            'file'=>'required|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',
            'thumbnail'=>'mimes:jpeg,jpg,png,gif|required'
        ]);

        $file =$request->file;
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path("uploads"), $filename);

        $thumbnail=$request->thumbnail;
        $thumbname=time()."_.".$thumbnail->getClientOriginalExtension();
        $thumbnail->move(public_path("Images"), $thumbname);

        $video=new Video;
        $video->title=$request->title;
        $video->course_id=$id;
        $video->thumbnail=$thumbname;
        $video->path=$filename;

        $video->save();

        return redirect()->route('editcourse',$id)->with('success','Video added successfully');
        

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
        $video=Video::findOrFail($id);
        return view('videos.edit',compact('video'));
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
        $request->validate([
            'title'=>'required',

        ]);
        $video=Video::findOrFail($id);

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
            $filename=$video->path;
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
            $thumbname=$video->thumbnail;
        }

    
        $video->title=$request->title;
        $video->thumbnail=$thumbname;
        $video->path=$filename;

        $video->save();

        return redirect()->route('editcourse',$video->course_id)->with('success','Video updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
