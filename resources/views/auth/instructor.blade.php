@extends('layouts.main')

@section('title')
<title>Instructor Register</title>
@endsection

{{-- @section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-area bg-image"  data-bgimage=".....assets/images/bg/breadcrumb-bg-01.jpg">
        <div class="container">
            <div class="in-breadcrumb">
                <div class="row">
                    <div class="col text-center">
                        <h2 style="color: rgb(240, 27, 27);"> Register as An Instructor</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Register</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Breadcrumb -->
    
    
    <!-- Page Conttent -->
    <main class="page-content">
        
        <!-- login-register  -->
        <div class="register-page section-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <!-- login-register-tab-list end -->
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            @if($errors->any())
                                            <div class="alert alert-danger">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                            </div>
                                            @endif
                                            <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
                                                <div class="login-input-box">
                                                    @csrf
                                                    <input type="hidden" name="role_id" value="2">
                                                    <input type="hidden" name="user_type" value="">
                                                    <input type="text" name="name" placeholder="User Name" autocomplete="off">
                                                    <input name="email" placeholder="Email" type="email">
                                                    <input name="phone" placeholder="Phone Number" type="tel">
                                                    <input name="qualification" placeholder="Academic qualification e.g diploma or degree in ..." type="text">
                                                    <input name="certificate"  type="file" style="width:20%;" ><label for="certificate" class="input" placeholder="Upload a CV or certificate" style="width:60%;margin-left:5%;">Upload a certificate </label> 
                                                    <input type="password" name="password" placeholder="Password">
                                                    <input type="password" name="password_confirmation" placeholder="Confirm Password">
                                                   
                                                </div>
                                                <div class="button-box">
                                                    <button class="register-btn btn" type="submit"><span>Register</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> 
@endsection --}}
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
                        <input type="hidden" name="role_id" value="2">
                        <input type="hidden" name="user_type" value="">
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
                        <input name="qualification" placeholder="Academic qualification e.g diploma or degree in ..." type="text">
                    </fieldset>
                  </div> 
                  <div class="col-lg-12">
                    <fieldset>
                         <input name="certificate"  type="file" style="width:54%;padding:10px;" ><label for="certificate" class="input" placeholder="Upload a CV or certificate" style="width:45%;margin-left:1%;">Upload a certificate/CV </label> 
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
                      <button type="submit" id="form-submit" class="main-button ">Register</button>
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