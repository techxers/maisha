@extends('layouts.main')

@section('title')
<title>Login</title>
@endsection

@section('content')
   
    <div id="contact" class="contact-us section">
        <div class="container">
          <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 wow fadeInRight" style="margin-left: 50%" data-wow-duration="0.5s" data-wow-delay="0.25s">
              <form id="contact" action="{{route('login')}}" method="post">
                <div class="row">
                  @csrf
                  <div class="col-lg-12">
                      @if ($errors->any())
                          <div class="alert alert-danger">
                              @foreach ($errors->all() as $error)
                                  <li>{{$error}}</li>
                              @endforeach
                          </div>
                      @endif
                  </div>  
                  <div class="col-lg-12">
                    <fieldset>
                      <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <input type="password" name="password" id="" placeholder="Your password">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="main-button ">Login</button> 
                    </fieldset>
                  
                  </div>
                  <div class="col-lg-12 mt-3">
                    <fieldset>
                      Not registered? <span><a href="{{route('register')}}">Sign up</a></span>   <a href="{{route('password.request')}}" class="ml-5">Forgot Password?</a>
                    </fieldset>
                  </div>
                  
                </div>
                <div class="contact-dec">
                  <img src="{{asset('test/assets/images/contact-decoration.png')}}" alt="contact">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection