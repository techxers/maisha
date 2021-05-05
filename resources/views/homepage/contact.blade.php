@extends('layouts.main')

@section('title')
<title>Contact || Maisha Homecare</title>
@endsection
@section('content')
<main class="page-content">
       
       
    <div class="breadcrumb-area bg-image" data-bgimage=".....assets/images/bg/breadcrumb-bg-01.jpg">
        <div class="container">
            <div class="in-breadcrumb">
                <div class="row">
                    <div class="col text-center">
                        <h2>Contact Us</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Contact</li>
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
        <div class="contact-us-wrapper section-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="contact-form-wrap">
                            <form id="contact-form" action="#" method="POST">
                                <div class="contact-page-form">
                                    <div class="row contact-input">
                                        <div class="col-lg-6 col-md-6 contact-inner">
                                            <input name="name" type="text" placeholder="First Name" id="first-name">
                                        </div>
                                        <div class="col-lg-6 col-md-6 contact-inner">
                                            <input name="lastname" type="text" placeholder="Last Name" id="last-name">
                                        </div>
                                        <div class="col-lg-6 col-md-6 contact-inner">
                                            <input type="text" placeholder="Enter Your E-mail" id="email" name="email">
                                        </div>
                                        <div class="col-lg-6 col-md-6 contact-inner">
                                            <input name="subject" type="text" placeholder="Phone Number" id="subject">
                                        </div>
                                        <div class="col-lg-12 col-md-12 contact-inner contact-message">
                                            <textarea name="message"  placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="contact-submit-btn text-center">
                                        <button class="submit-btn" type="submit">Send Message</button>
                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="contact-info-inner" style="background-color: transparent;margin-top:120%;color:black;">
                            <!-- Single-contact-info -->
                            <div class="single-contact-info">
                                <div class="contact-info-icon">
                                    <i class="zmdi zmdi-home"></i>
                                </div>
                                <div class="contact-black-text">
                                    <p> Home #02 Hangla pur <br> Dhaka , Bangladesh </p>
                                </div>
                            </div>
                            <!--// Single-contact-info -->
                            
                            <!-- Single-contact-info -->
                            <div class="single-contact-info">
                                <div class="contact-info-icon">
                                    <i class="zmdi zmdi-phone"></i>
                                </div>
                                <div class="contact-black-text">
                                    <p> <a href="#">+022222222</a> <a href="#">+01111109999</a> </p>
                                </div>
                            </div>
                            <!--// Single-contact-info -->
                            
                            <!-- Single-contact-info -->
                            <div class="single-contact-info">
                                <div class="contact-info-icon">
                                    <i class="zmdi zmdi-email"></i>
                                </div>
                                <div class="contact-black-text">
                                    <p><a href="#">example@e-mail.com</a> <a href="#">example@e-mail.com</a> </p>
                                </div>
                            </div>
                            <!--// Single-contact-info -->
                            
                            <!-- Single-contact-info -->
                            <div class="single-contact-info">
                                <div class="contact-info-icon">
                                    <i class="zmdi zmdi-globe-alt"></i>
                                </div>
                                <div class="contact-black-text">
                                    <p> <a href="#">www.streamo.net</a></p>
                                </div>
                            </div>
                            <!--// Single-contact-info -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
      
       
        
        <!-- Our-brand-area Start -->
     
        <!--// Our-brand-area End -->
        
        
    </main>
    <!--// Page Conttent -->
@endsection