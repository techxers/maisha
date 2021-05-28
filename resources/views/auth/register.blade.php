@extends('layouts.main')

@section('title')
<title>Register</title>
@endsection
@section('content')
    <div id="contact" class="contact-us section">
        <div class="container">
          <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 wow fadeInRight" style="margin-left: 50%" data-wow-duration="0.5s" data-wow-delay="0.25s">
              <form id="contact" action="{{route('register')}}" method="post">
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
                        <input type="text" name="name" placeholder="User Name">
                    </fieldset>
                  </div> 
                  <div class="col-lg-12">
                    <fieldset>
                        <input type="hidden" name="role_id" value="1">
                        <input type="hidden" name="qualification" value="">
                        <input type="hidden" name="certificate" value="">
                      <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                        <input name="phone" placeholder="Phone Number" type="tel">
                    </fieldset>
                  </div> 
                  <div class="col-lg-12">
                    <fieldset>
                        <select name="user_type" id="" placeholder="I am a" class="form-group" style="width: 100%;height:40px;">
                            <option value="owner">Home Owner</option>
                            <option value="househelp">Domestic Househelp</option>
                        </select>
                    </fieldset>
                  </div> 
                  <div class="col-lg-12">
                    <fieldset>
                        <input type="password" name="password" placeholder="Password">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="main-button ">Login</button>
                    </fieldset>
                  </div>
                  <div class="col-lg-12 mt-3">
                    <fieldset>
                      Already registered? <span><a href="{{route('login')}}">Sign in</a></span>   
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