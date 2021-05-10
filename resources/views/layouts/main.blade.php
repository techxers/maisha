<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from demo.hasthemes.com/streamo-preview/streamo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Apr 2021 13:06:11 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield('title')
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.ico')}}')}}">
    
    <!-- CSS 
    ========================= -->
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    
    <!-- Fonts CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/material-design-iconic-font.min.css')}}">
    
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins.css')}}">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    
    <!-- Modernizer JS -->
    <script src="{{asset('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
</head>

<body>
    <div class="main-wrapper" >
   
        <header class="header-area inner-header" style="background-color: white;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-7">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="/"><img src="{{asset('assets/images/logo/maisha1.png')}}" style="width:50%;margin-left:-35px;border-radius:70%;" ></a> 
                        </div>
                        <!-- Logo -->
                    </div>
                    <div class="col-lg-9 col-5">
                        <div class="main-menu">
                            <nav class="main-navigation">
                                <ul>
                                    <li class="active"><a href="/">Home</a>
                                    </li>
                                    <li><a href="/about">About</a></li>
                                    <li><a href="/features">How it Works</a>
                                    </li>
                                    <li><a href="/contact">Contact</a></li>
                                    @guest
                                        <li><a href="">Register</a>
                                            <ul class="sub-menu">
                                                {{-- <li><a href="{{route('instructor.register')}}">Instructor</a></li> --}}
                                                <li><a href="{{route('register')}}">Trainee</a></li>
                                                <li><a href="{{route('instructor')}}">Instructor</a></li>
                                    
                                                
                                            </ul>
                                        </li>
                                    @endguest
                                    @auth
                                        <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                                    @endauth
                                    
                                </ul>
                            </nav>
                            @auth 
                            <div class="login-button" style="">
                                

                                <a class="login-btn border-r-5 tb-gradient-hover" href="{{route('logout')}}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                               
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            @endauth
                            @guest
                            <div class="login-button" >
                                <a class="login-btn border-r-5 tb-gradient-hover" href="{{route('login')}}">Log in</a>
                            </div>
                           @endguest
                            
                        </div>
                    </div>
                    
                    <div class="col">
                        <!-- mobile-menu start -->
                        <div class="mobile-menu d-block d-lg-none"></div>
                        <!-- mobile-menu end -->
                    </div>
                </div>
            </div>
            
        </header>
    @yield('content')
    <footer class="footer-area" style="background-color: rgb(240, 27, 27);" >
        <div class="footer-top-one ">
            <div class="container">
                <div class="row">   
                    <div class="col-custom-4 mt--50">
                        <!-- footer-widget -->
                        <div class="footer-widget">
                            <h4 class="footer-widget-title">About Maisha</h4>

                            <div class="footer-contet">
                                <p>Maisha Homecare Hub is a hospitality training facility committed to empowering home support workers to deliver value for their clients (home owners).</p>
                                <ul class="fotter-socail">
                                    <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-linkedin"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                </ul>
                            </div>

                        </div>
                        <!--// footer-widget -->
                    </div>

                    <div class="col-custom-3 mt--50">
                        <!-- footer-widget -->
                        <div class="footer-widget">
                            <h4 class="footer-widget-title">Company</h4>

                            <div class="footer-contet">
                                <ul class="footer-list">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Service</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>

                        </div>
                        <!--// footer-widget -->
                    </div>

                    <div class="col-custom-3 mt--50">
                        <!-- footer-widget -->
                        <div class="footer-widget">
                            <h4 class="footer-widget-title">Services</h4>

                            <div class="footer-contet">
                                <ul class="footer-list">
                                    <li><a href="#">Video</a></li>
                                    <li><a href="#">Movie</a></li>
                                    <li><a href="#">Tv Series</a></li>
                                    <li><a href="#">Live</a></li>
                                </ul>
                            </div>

                        </div>
                        <!--// footer-widget -->
                    </div>

                    <div class="col-custom-3 mt--50">
                            <!-- footer-widget -->
                            <div class="footer-widget">
                                <h4 class="footer-widget-title">Contact</h4>

                                <div class="footer-contet">
                                    <ul class="footer-contact-list">
                                        <li> <i class="zmdi zmdi-phone"></i> <a href="#">+022222222</a></li>
                                        <li> <i class="zmdi zmdi-home"></i> <a href="#">Queen meri street abc/23 Bangladesh</a></li>
                                        <li> <i class="zmdi zmdi-email"></i> <a href="#">demo@gmail.com</a></li>
                                    </ul>
                                </div>

                            </div>
                            <!--// footer-widget -->
                        </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom" style="background-color: rgb(240, 27, 27)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <p class="copyright-text">Copyright &copy; {{now()->year}} All right reserve</p>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <ul class="footer-bottom-list">
                            <li><a href="#">Help</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">support</a></li>
                            <li><a href="#">contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--// Footer Area -->
    
</div>
<!-- Main Wrapper End -->

<!-- JS
============================================ -->

<!-- jQuery JS -->
<script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
<!-- Popper JS -->
<script src="assets/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Plugins JS -->
<script src="assets/js/plugins.js"></script>
<!-- Ajax Mail -->
<script src="assets/js/ajax-mail.js"></script>
<!-- Main JS -->
<script src="assets/js/main.js"></script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8&amp;callback=myMap"></script>
<script>
    // When the window has finished loading create our google map below
    google.maps.event.addDomListener(window, 'load', init);

    //function init() {
        // // Basic options for a simple Google Map
        // // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        // var mapOptions = {
        //     // How zoomed in you want the map to start at (always required)
        //     zoom: 12,

        //     scrollwheel: false,

        //     // The latitude and longitude to center the map (always required)
        //     center: new google.maps.LatLng(23.761226, 90.420766), // New York

        //     // How you would like to style the map. 
        //     // This is where you would paste any style found on Snazzy Maps.
        //     styles: [{
        //             "featureType": "all",
        //             "elementType": "labels.text.fill",
        //             "stylers": [{
        //                     "saturation": 36
        //                 },
        //                 {
        //                     "color": "#000000"
        //                 },
        //                 {
        //                     "lightness": 40
        //                 }
        //             ]
        //         },
        //         {
        //             "featureType": "all",
        //             "elementType": "labels.text.stroke",
        //             "stylers": [{
        //                     "visibility": "on"
        //                 },
        //                 {
        //                     "color": "#000000"
        //                 },
        //                 {
        //                     "lightness": 16
        //                 }
        //             ]
        //         },
        //         {
        //             "featureType": "all",
        //             "elementType": "labels.icon",
        //             "stylers": [{
        //                 "visibility": "off"
        //             }]
        //         },
        //         {
        //             "featureType": "administrative",
        //             "elementType": "geometry.fill",
        //             "stylers": [{
        //                     "color": "#000000"
        //                 },
        //                 {
        //                     "lightness": 20
        //                 }
        //             ]
        //         },
        //         {
        //             "featureType": "administrative",
        //             "elementType": "geometry.stroke",
        //             "stylers": [{
        //                     "color": "#000000"
        //                 },
        //                 {
        //                     "lightness": 17
        //                 },
        //                 {
        //                     "weight": 1.2
        //                 }
        //             ]
        //         },
        //         {
        //             "featureType": "landscape",
        //             "elementType": "geometry",
        //             "stylers": [{
        //                     "color": "#000000"
        //                 },
        //                 {
        //                     "lightness": 20
        //                 }
        //             ]
        //         },
        //         {
        //             "featureType": "poi",
        //             "elementType": "geometry",
        //             "stylers": [{
        //                     "color": "#000000"
        //                 },
        //                 {
        //                     "lightness": 21
        //                 }
        //             ]
        //         },
        //         {
        //             "featureType": "road.highway",
        //             "elementType": "geometry.fill",
        //             "stylers": [{
        //                     "color": "#000000"
        //                 },
        //                 {
        //                     "lightness": 17
        //                 }
        //             ]
        //         },
        //         {
        //             "featureType": "road.highway",
        //             "elementType": "geometry.stroke",
        //             "stylers": [{
        //                     "color": "#000000"
        //                 },
        //                 {
        //                     "lightness": 29
        //                 },
        //                 {
        //                     "weight": 0.2
        //                 }
        //             ]
        //         },
        //         {
        //             "featureType": "road.arterial",
        //             "elementType": "geometry",
        //             "stylers": [{
        //                     "color": "#000000"
        //                 },
        //                 {
        //                     "lightness": 18
        //                 }
        //             ]
        //         },
        //         {
        //             "featureType": "road.local",
        //             "elementType": "geometry",
        //             "stylers": [{
        //                     "color": "#000000"
        //                 },
        //                 {
        //                     "lightness": 16
        //                 }
        //             ]
        //         },
        //         {
        //             "featureType": "transit",
        //             "elementType": "geometry",
        //             "stylers": [{
        //                     "color": "#000000"
        //                 },
        //                 {
        //                     "lightness": 19
        //                 }
        //             ]
        //         },
        //         {
        //             "featureType": "water",
        //             "elementType": "geometry",
        //             "stylers": [{
        //                     "color": "#000000"
        //                 },
        //                 {
        //                     "lightness": 17
        //                 }
        //             ]
        //         }
        //     ]
        // };

        // Get the HTML DOM element that will contain your map 
        // We are using a div with id="map" seen below in the <body>
        var mapElement = document.getElementById('googleMap');

        // Create the Google Map using our element and options defined above
        var map = new google.maps.Map(mapElement, mapOptions);

        // Let's also add a marker while we're at it
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(36.8219,1.2921),
            map: map,
            title: 'googlemap!',
            animation: google.maps.Animation.BOUNCE

        });
    }
</script>
</body>


<!-- Mirrored from demo.hasthemes.com/streamo-preview/streamo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Apr 2021 13:06:17 GMT -->
</html>