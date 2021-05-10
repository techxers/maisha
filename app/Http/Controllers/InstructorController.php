<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class InstructorController extends Controller
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
    public function index(Request $request)
    {
        $search=$request->value;
        if($search==null)
        {
            $users=User::where('role_id',2)->paginate(6);
        }
        else{
            $users=User::where('role_id',2)->where('name', 'LIKE', "%{$search}%")->paginate(6);
        }
        
        return view('users.index',compact('users','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::findOrFail($id);
        $courses=Course::all()->where('user_id',$user->id);
        return view('users.show',compact('user','courses'));
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
        //
    }


    public function certificate($id)
    {
        $user=User::findOrFail($id);
        $certificate=public_path('certificates/'.$user->certificate);
        //$headers = ['Content-Type: application/pdf'];
        $fileName = $user->name.'.pdf';

        return response()->download($certificate,$fileName);
    }
    public function activate($id)
    {
        $user=User::findOrFail($id);
        $user->status='active';
        $user->save();

        return redirect()->back()->with('success','User activated successfully');
    }
    public function deactivate($id)
    {
        $user=User::findOrFail($id);
        $user->status='inactive';
        $user->save();

        return redirect()->back()->with('success','User deactivated successfully');
    }
}
