<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes=Quiz::all()->where('user_id',Auth::user()->id);
       
        return view('quizzes.index',compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses=Course::all()->where('user_id',Auth::user()->id);
        return view('quizzes.create',compact('courses'));
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
            'course_id'=>'required',
            'thumbnail'=>'mimes:jpeg,jpg,png,gif|required'
        ]);
       
        $quiz= new Quiz;

        $thumbnail=$request->thumbnail;
        $thumbname=time()."_.".$thumbnail->getClientOriginalExtension();
        $thumbnail->move(public_path("Images"), $thumbname);

        $quiz->title=$request->title;
        $quiz->thumbnail=$thumbname;
        $quiz->course_id=$request->course_id;
        $quiz->user_id=Auth::user()->id;
        $quiz->save();

       return redirect()->route('quizzes')->with('success','Quiz added successfully');
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
        $quiz=Quiz::findOrFail($id);
        $courses=Course::all();
        return view('quizzes.edit',compact('quiz','courses'));
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
            'course_id'=>'required'
        ]);
        $quiz=Quiz::findOrFail($id);

       
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
            $thumbname=$quiz->thumbnail;
        }

    
        $quiz->title=$request->title;
        $quiz->course_id=$request->course_id;
        $quiz->thumbnail=$thumbname;

        $quiz->save();

        return redirect()->back()->with('success','Quiz updated successfully');
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
