<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\MyQuiz;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes=Quiz::all();
        $courses=Course::all();
        $myquizzes=MyQuiz::where('user_id',Auth::user()->id)->distinct('quiz_id')->pluck('quiz_id');
        $answers=MyQuiz::all()->where('user_id',Auth::user()->id);
        return view('myquizzes.index',compact('myquizzes','quizzes','courses','answers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $quiz=Quiz::where('id',$id)->first();
        if(!$quiz)
        {
            return redirect()->back()->with('error','A quiz for this course has not been created');
        }
       
        $results=MyQuiz::where('user_id',Auth::user()->id)->where('quiz_id',$id)->get();
    
        $answered=MyQuiz::where('user_id',Auth::user()->id)->where('quiz_id',$id)->pluck('question_id');
        
        $questions=Question::whereNotIn('id',$answered)->where('quiz_id',$quiz->id)->get();
        $all=Question::all()->where('quiz_id',$quiz->id);
        $first=$questions->first();
       
        if($questions->count()==0)
        {
            return redirect()->route('myquiz.show',$id)->with('success','You have completed this quiz');
        }
        $number=1;
        return view('myquizzes.create',compact('all','results','answered','quiz','questions','first','number'));
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
            'choice'=>'required'
        ]);


        $question=Question::findOrFail($id);
        $result=null;
        if($request->choice==$question->answer)
        {
            $result='correct';
        }
        else if($request->choice!=$question->answer)
        {
            $result='incorrect';
        }

        $myquiz=new MyQuiz;
        $myquiz->user_id=Auth::user()->id;
        $myquiz->question_id=$id;
        $myquiz->quiz_id=$question->quiz_id;
    
        $myquiz->result=$result;
        $myquiz->save();

        return redirect()->route('myquiz.create',$question->quiz_id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz=Quiz::findOrFail($id);
        $results=MyQuiz::all()->where('user_id',Auth::user()->id)->where('quiz_id',$id);
        $questions=Question::all()->where('quiz_id',$id);
        return view('myquizzes.view',compact('quiz','results','questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        
       $restart= MyQuiz::where('user_id',Auth::user()->id)->where('quiz_id',$id)->delete();

        if($restart)
        {
            return redirect()->route('myquiz.create',$id);
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
        //
    }
}
