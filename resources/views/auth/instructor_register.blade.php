@extends('layouts.main')

@section('title')
<title>Instructor Register</title>
@endsection

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-area bg-image"  data-bgimage=".....assets/images/bg/breadcrumb-bg-01.jpg">
        <div class="container">
            <div class="in-breadcrumb">
                <div class="row">
                    <div class="col text-center">
                        <h2> Register as An Instructor</h2>
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
                                <div id="lg2" class="tab-pane active">
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
                                                    <input name="certificate"  type="file" style="width:20%;" ><label for="certificate" class="input" placeholder="Upload a certificate" style="width:60%;margin-left:5%;">Upload a certificate </label> 
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
    </main> 
@endsection