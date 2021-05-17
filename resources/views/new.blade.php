@extends('layouts.main')

@section('title')
<title>Home || Maisha Homecare</title>
@endsection
@section('content')
    <!-- Hero Slider start -->
    <div class="hero-slider">
       
        <div class="single-slide-1 bg-image"    data-bgimage="{{asset('assets/images/bg/happy.png')}}" style="background-image: url('{{asset('assets/images/other/new.png')}}')">
            <!-- Hero Content One Start -->
            <div class="hero-content-one container">
                <div class="row">
                    <div class="col-lg-8"> 
                        <div class="slider-text-primary text-left slider-mt-200 mt-1" >
                            <h3 style="color: rgb(240, 27, 27);">WELCOME TO MAISHA HOMECARE HUB</h3>
                            <h1 class="text-white" > Africa’s first 100% online domestic training platform</h1>
                            <p class="text-white">Maisha Homecare Hub is a hospitality training facility committed to empowering home support workers to deliver value for their clients (home owners).</p>
                           
                            <div class="slider-button">
                                <a href="{{route('about')}}" class="default-btn gradient-btn mr--10">Learn More</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hero Content One End -->
        </div>
        
      
       
    </div>
    <!-- Hero Slider end -->
    
    <!-- Feature Area -->
    <div class="feature-area section-pb section-pt-90">
        <div class="container">
            <div class="row">
               
                <div class="col-lg-4 col-md-6">
                    <!-- Single Feature -->
                    <div class="single-feature text-center mt--30">
                        <div class="single-feature-icons border-b-one">
                            <span><img src="{{asset('assets/images/bg/avatar.gif')}}" alt=""></span>
                        </div>
                        <div class="single-feature-contents">
                            <h4>Housekeeping Training</h4>
                            <p>Learn general housekeeping, safety and prevention, bed & bathroom-making techniques, towel folding methods kitchen intervention, laundry and ironing.</p>
                        </div>
                    </div> <!--// Single Feature -->
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <!-- Single Feature -->
                    <div class="single-feature text-center mt--30">
                        <div class="single-feature-icons border-b-one">
                            <span><img src="{{asset('assets/images/bg/childcare.jpg')}}" alt=""></span>
                        </div>
                        <div class="single-feature-contents">
                            <h4>Nursery (Child Care)</h4>
                            <p> We train on child safety, food handling, food storing, bathroom-making techniques (pottie cleaning), keeping all toys hygienic and nursery (Child Care)</p>
                        </div>
                    </div> <!--// Single Feature -->
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <!-- Single Feature -->
                    <div class="single-feature text-center mt--30">
                        <div class="single-feature-icons border-b-one">
                            <span><img src="{{asset('assets/images/bg/kitchen.png')}}" alt=""></span>
                        </div>
                        <div class="single-feature-contents">
                            <h4>Kitchen Training</h4>
                            <p>Our videos trains domestic workers to cook wonderfully wholesome family meals, use various kitchen tools and ensure kitchen safety.</p>
                        </div>
                    </div> <!--// Single Feature -->
                </div>
                
            </div>
        </div>
    </div>
    <!--// Feature Area -->
    
    <!-- why Choose Area -->
    <div class="why-choose-area section-ptb bg-light-grey section-bg-shape" >
        <div class="container">
            <div class="row">
                <div class="col-lg-6 ml-auto mr-auto">
                    <!-- Section Title -->
                    <div class="section-title text-center">
                        <h2>Why Choose Us</h2>
                        <p>Maisha Homecare focuses on achieving and maintaining the highest standards and cleanliness within home environment.  </p>
                    </div><!--// Section Title -->
                </div>
            </div>
            
            <div class="row choose-main-area align-items-center">
                <div class="col-lg-6 col-md-7 order-md-1 order-2">
                    <div class="choose-contents-wrap s--mt--30 ">
                        <div class="section-title-two">
                            <h2>Get Started For Free</h2>
                        </div>
                        <p>Our training prepare domestic support workers to deliver the utmost care and attention required in homes.</p>

                        <p>The training courses will teach maids in-depth cleaning, efficiency as well as safety.

                            We offer various types of trainings, housekeeping, kitchen keeping and all child care.</p>
                        <div class="choose-button">
                            <a href="{{route('features')}}" class="default-btn gradient-btn mr--10">How it works</a>
                                <a href="{{route('register')}}" class="primary-btn hover-gradient-btn ml--10">Try For Free</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5  order-md-2 order-1">
                    <div class="choose-image-wrap text-center">
                        <img src="{{asset('assets/images/bg/domestic.jpg')}}" alt="">
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!--// why Choose Area -->
    
    <br>
  
    <div class="video-area section-pt section-pb-b bg-image"   data-bgimage="{{asset('assets/images/bg/bg-010.jpg')}}">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-7 ml-auto mr-auto">
                    <!-- Section Title -->
                    <div class="section-title text-center" > 
                        <h2>See Videos How It Works</h2>
                        <p class="text-black">We strive towards to change the very standards of practice in the cleaning and housekeeping industry with our revolutionary quality of service.</p>
                    </div><!--// Section Title -->
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="video-inner-wrap">
                        <iframe width="50%" height="315px" src="https://www.youtube.com/embed/mwuNTe95dtQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="our-brand-area section-ptb">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-6 ml-auto mr-auto">
                    <!-- Section Title -->
                    <div class="section-title text-center">
                        <h2>Our Mission & Vision</h2>
                        <p>Our mission and vision is to bring housekeeping solutions that are carefully designed to accomplish ultimate convenience at excellent value to our discerning customers, while enabling growth and financial soundness for the organisation.

                        </p>
                    </div><!--// Section Title -->
                </div>
            </div>
            
            
        </div>
    </div>    
@endsection