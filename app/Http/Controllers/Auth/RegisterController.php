<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if($data['role_id']==1)
        {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone'=>['required'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'user_type'=>[''],
                'qualification'=>[''],
                'certificate'=>[''],
            ]);
        }
        else if($data['role_id']==2){
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone'=>['required'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'user_type'=>[''],
                'qualification'=>['required'],
                'certificate'=>['required','mimes:pdf'],
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $filename=null;
        $status='active';
        if($data['role_id']==2)
        {
        $status='inactive';
        $filename=time().'_.'.$data['certificate']->extension();
        $data['certificate']->move(public_path('certificates'), $filename);
        }
      
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone'=>$data['phone'],
            'role_id'=>$data['role_id'],
            'user_type'=>$data['user_type'],
            'qualification'=>$data['qualification'],
            'certificate'=>$filename,
            'status'=>$status,
            'password' => Hash::make($data['password']),
        ]);
    }
}
