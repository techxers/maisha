<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
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
        $quiz=Quiz::findOrFail($id);
        return view('questions.create',compact('quiz'));
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
            'question'=>'required|string',
            'first'=>'required|string',
            'second'=>'required|string',
            'third'=>'required|string',
            'fourth'=>'required|string'
        ]);

        $question= new Question;
        $question->quiz_id=$id;
        $question->question=$request->question;
        $question->first=$request->first;
        $question->second=$request->second;
        $question->third=$request->third;
        $question->fourth=$request->fourth;
        $question->answer= $request->answer;
        $question->save();

        return redirect()->route('quiz.edit',$id)->with('success','Question added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question=Question::findOrFail($id);
        return view('questions.edit',compact('question'));
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
            'question'=>'required|string',
            'first'=>'required|string',
            'second'=>'required|string',
            'third'=>'required|string',
            'fourth'=>'required|string'
        ]);

        $question=  Question::findOrFail($id);
        $question->question=$request->question;
        $question->first=$request->first;
        $question->second=$request->second;
        $question->third=$request->third;
        $question->fourth=$request->fourth;
        $question->answer= $request->answer;
        $question->save();

        return redirect()->route('quiz.edit',$question->quiz_id)->with('success','Question updated successfully');
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
