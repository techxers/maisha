@extends('layouts.main')

@section('content')
<div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 wow fadeInRight" style="margin-left: 50%" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="{{ route('password.email') }}" method="post">
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
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
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
                  <button type="submit" id="form-submit" class="main-button ">Send Password Reset Link</button> 
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

