@extends('layouts.main')

@section('title')
<title>Register</title>
@endsection

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-area bg-image" data-bgimage=".....assets/images/bg/breadcrumb-bg-01.jpg">
        <div class="container">
            <div class="in-breadcrumb">
                <div class="row">
                    <div class="col text-center">
                        <h2> Register</h2>
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
                                            <form action="{{route('register')}}" method="post">
                                                <div class="login-input-box">
                                                    @csrf
                                                    <input type="hidden" name="role_id" value="1">
                                                    <input type="hidden" name="qualification" value="">
                                                    <input type="hidden" name="certificate" value="">
                                                    <input type="text" name="name" placeholder="User Name">
                                                    <input name="email" placeholder="Email" type="email">
                                                    <input name="phone" placeholder="Phone Number" type="tel">
                                                    <select name="user_type" id="" placeholder="I am a" class="form-group" style="width: 100%;height:40px;">
                                                        <option value="owner">Home Owner</option>
                                                        <option value="househelp">Domestic Househelp</option>
                                                    </select>
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