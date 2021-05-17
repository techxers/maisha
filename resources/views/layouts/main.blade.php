<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Maisha Homecare</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('test/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('test/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('test/assets/css/templatemo-space-dynamic.css')}}">
    <link rel="stylesheet" href="{{asset('test/assets/css/animated.css')}}">
    <link rel="stylesheet" href="{{asset('test/assets/css/owl.css')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/images/logo/maisha1.png')}}">
<!--
    
TemplateMo 562 Space Dynamic

https://templatemo.com/tm-562-space-dynamic

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <a href="/"><img src="{{asset('assets/images/logo/maisha1.png')}}" style="width:10%;border-radius:70%;" ></a> 
            </a>
           
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="/#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="/#about">About Us</a></li>
              {{-- <li class="scroll-to-section"><a href="/#services">Services</a></li> --}}
              <li class="scroll-to-section"><a href="/#portfolio">How it Works</a></li>
              <li class="scroll-to-section"><a href="/#blog">Our Team</a></li> 
              <li class="scroll-to-section"><a href="/#contact">Contact Us</a></li> 
              <li class="submenu"><a href="">Register</a>
                <ul>
            
                    <li><a href="{{route('register')}}">Trainee</a></li>
                    <li><a href="{{route('instructor')}}">Instructor</a></li>
                </ul>
            </li>
              <li class="scroll-to-section"><div class="main-red-button"><a href="{{route('login')}}">Login</a></div></li>  
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
    @yield('content')
    <footer>
        <div class="container">
          <div class="row">
            <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
              <p>© Copyright 2021 Maisha Homecare. All Rights Reserved. 
              
              <br>Design: <a rel="nofollow" href="https://templatemo.com">Maisha Homecare</a></p>
            </div>
          </div>
        </div>
      </footer>
      <!-- Scripts -->
      <script src="{{asset('test/vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('test/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('test/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
      {{-- <script src="{{asset('test/vendor/bootstrap/js/popper.min.js')}}"></script> --}}
      <script src="{{asset('test/assets/js/owl-carousel.js')}}"></script>
      <script src="{{asset('test/assets/js/animation.js')}}"></script>
      <script src="{{asset('test/assets/js/imagesloaded.js')}}"></script>
      <script src="{{asset('test/assets/js/templatemo-custom.js')}}"></script>
      
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
{{-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> --}}
    
    </body>
    </html>