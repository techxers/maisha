<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @yield('title')
       <!-- Custom Fonts -->
       <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,700%7CRoboto:400,500%7CRoboto:400,500&amp;display=swap"
       rel="stylesheet">

 <!-- Perfect Scrollbar -->
 <link type="text/css"
       href="{{asset('dashboard/assets/vendor/perfect-scrollbar.css')}}"
       rel="stylesheet">

 <!-- Material Design Icons -->
 <link type="text/css"
       href="{{asset('dashboard/assets/css/material-icons.css')}}"
       rel="stylesheet">

 <!-- Font Awesome Icons -->
 <link type="text/css"
       href="{{asset('dashboard/assets/css/fontawesome.css')}}"
       rel="stylesheet">

 <!-- Preloader -->
 <link type="text/css"
       href="{{asset('dashboard/assets/vendor/spinkit.css')}}"
       rel="stylesheet">

 <!-- App CSS -->
 <link type="text/css"
       href="{{asset('dashboard/assets/css/app.css')}}"
       rel="stylesheet">
       <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.ico')}}')}}">
</head>

<body class=" layout-fluid">

 <div class="preloader bg-danger" >
     <div class="sk-chase bg-danger">
         <div class="sk-chase-dot"></div>
         <div class="sk-chase-dot"></div>
         <div class="sk-chase-dot"></div>
         <div class="sk-chase-dot"></div>
         <div class="sk-chase-dot"></div>
         <div class="sk-chase-dot"></div>
     </div>
 </div>

 <!-- Header Layout -->
 <div class="mdk-header-layout js-mdk-header-layout">

     <!-- Header -->

     <div id="header"
          data-fixed
          class="mdk-header js-mdk-header mb-0">
         <div class="mdk-header__content">

             <!-- Navbar -->
             <nav id="default-navbar"
                  class="navbar navbar-expand navbar-danger bg-white m-0">
                 <div class="container-fluid">
                     <!-- Toggle sidebar -->
                     <button class="navbar-toggler d-block"
                             data-toggle="sidebar"
                             type="button">
                         <span class="material-icons">menu</span>
                     </button>

                     <!-- Brand -->
                     <a href="{{route('dashboard')}}"
                        class="navbar-brand">
                         <img width="8%" style="border-radius: 50%;margin:0.5%;" src="{{asset('assets/images/logo/maisha1.png')}}"
                              class="mr-2"
                              alt="Hello" />
                         <span class="d-none d-xs-md-block"></span>
                     </a>

                     

                     <div class="flex"></div>

                     <!-- Menu -->
                     

                     <!-- Menu -->
                     <ul class="nav navbar-nav flex-nowrap">
                         <!-- Notifications dropdown -->
                         <li class="nav-item dropdown dropdown-notifications dropdown-menu-sm-full">
                             <button class="nav-link btn-flush dropdown-toggle"
                                     type="button"
                                     data-toggle="dropdown"
                                     data-dropdown-disable-document-scroll
                                     data-caret="false">
                                 <i class="material-icons">notifications</i>
                                 <span class="badge badge-notifications badge-danger">2</span>
                             </button>
                             <div class="dropdown-menu dropdown-menu-right">
                                 <div data-perfect-scrollbar
                                      class="position-relative">
                                     <div class="dropdown-header"><strong>Messages</strong></div>
                                     <div class="list-group list-group-flush mb-0">

                                         <a href="student-messages.html"
                                            class="list-group-item list-group-item-action unread">
                                             <span class="d-flex align-items-center mb-1">
                                                 <small class="text-muted">5 minutes ago</small>

                                                 <span class="ml-auto unread-indicator bg-primary"></span>

                                             </span>
                                             <span class="d-flex">
                                                 <span class="avatar avatar-xs mr-2">
                                                     <img src="{{asset('dashboard/assets/images/people/110/woman-5.jpg')}}"
                                                          alt="people"
                                                          class="avatar-img rounded-circle">
                                                 </span>
                                                 <span class="flex d-flex flex-column">
                                                     <strong>Michelle</strong>
                                                     <span class="text-black-70">Clients loved the new design.</span>
                                                 </span>
                                             </span>
                                         </a>

                                         <a href="student-messages.html"
                                            class="list-group-item list-group-item-action unread">
                                             <span class="d-flex align-items-center mb-1">
                                                 <small class="text-muted">5 minutes ago</small>

                                                 <span class="ml-auto unread-indicator bg-primary"></span>

                                             </span>
                                             <span class="d-flex">
                                                 <span class="avatar avatar-xs mr-2">
                                                     <img src="{{asset('dashboard/assets/images/people/110/woman-5.jpg')}}"
                                                          alt="people"
                                                          class="avatar-img rounded-circle">
                                                 </span>
                                                 <span class="flex d-flex flex-column">
                                                     <strong>Michelle</strong>
                                                     <span class="text-black-70">🔥 Superb job..</span>
                                                 </span>
                                             </span>
                                         </a>

                                     </div>

                                     <div class="dropdown-header"><strong>System notifications</strong></div>
                                     <div class="list-group list-group-flush mb-0">

                                         <a href="student-messages.html"
                                            class="list-group-item list-group-item-action border-left-3 border-left-danger">
                                             <span class="d-flex align-items-center mb-1">
                                                 <small class="text-muted">3 minutes ago</small>

                                             </span>
                                             <span class="d-flex">
                                                 <span class="avatar avatar-xs mr-2">
                                                     <span class="avatar-title rounded-circle bg-light">
                                                         <i class="material-icons font-size-16pt text-danger">account_circle</i>
                                                     </span>
                                                 </span>
                                                 <span class="flex d-flex flex-column">

                                                     <span class="text-black-70">Your profile information has not been synced correctly.</span>
                                                 </span>
                                             </span>
                                         </a>

                                         <a href="student-messages.html"
                                            class="list-group-item list-group-item-action">
                                             <span class="d-flex align-items-center mb-1">
                                                 <small class="text-muted">5 hours ago</small>

                                             </span>
                                             <span class="d-flex">
                                                 <span class="avatar avatar-xs mr-2">
                                                     <span class="avatar-title rounded-circle bg-light">
                                                         <i class="material-icons font-size-16pt text-success">group_add</i>
                                                     </span>
                                                 </span>
                                                 <span class="flex d-flex flex-column">
                                                     <strong>Adrian. D</strong>
                                                     <span class="text-black-70">Wants to join your private group.</span>
                                                 </span>
                                             </span>
                                         </a>

                                         <a href="student-messages.html"
                                            class="list-group-item list-group-item-action">
                                             <span class="d-flex align-items-center mb-1">
                                                 <small class="text-muted">1 day ago</small>

                                             </span>
                                             <span class="d-flex">
                                                 <span class="avatar avatar-xs mr-2">
                                                     <span class="avatar-title rounded-circle bg-light">
                                                         <i class="material-icons font-size-16pt text-warning">storage</i>
                                                     </span>
                                                 </span>
                                                 <span class="flex d-flex flex-column">

                                                     <span class="text-black-70">Your deploy was successful.</span>
                                                 </span>
                                             </span>
                                         </a>

                                     </div>
                                 </div>
                             </div>
                         </li>
                         <!-- // END Notifications dropdown -->
                         <!-- User dropdown -->
                         <li class="nav-item dropdown ml-1 ml-md-3">
                             <a class="nav-link dropdown-toggle"
                                data-toggle="dropdown"
                                href="#"
                                role="button"><img src="{{asset('dashboard/assets/images/people/50/guy-6.jpg')}}"
                                      alt="Avatar"
                                      class="rounded-circle"
                                      width="40"></a>
                             <div class="dropdown-menu dropdown-menu-right">
                                 <a class="dropdown-item"
                                    href="student-account-edit.html">
                                     <i class="material-icons">edit</i> Edit Account
                                 </a>
                                
                                 <a class="dropdown-item"
                                    href="guest-login.html">
                                     <i class="material-icons">lock</i> Logout
                                 </a>
                             </div>
                         </li>
                         <!-- // END User dropdown -->

                     </ul>
                     <!-- // END Menu -->
                 </div>
             </nav>
             <!-- // END Navbar -->

         </div>
     </div>

     <!-- // END Header -->
     @yield('content')
    
                             <!-- // END Components Menu -->
                             <div class="mdk-drawer js-mdk-drawer"
                             id="default-drawer">
                            <div class="mdk-drawer__content ">
                                <div class="sidebar sidebar-left sidebar-dark bg-dark o-hidden"
                                     data-perfect-scrollbar>
                                    <div class="sidebar-p-y">
                                       @if(Auth::user()->role_id==2)
                                        <div class="sidebar-heading">User</div>
                                        <ul class="sidebar-menu sm-active-button-bg">
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="{{route('dashboard')}}">
                                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_box</i> Instructor
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- Account menu -->
                                        
                                        <div class="sidebar-heading">Courses</div>
                                        <ul class="sidebar-menu sm-active-button-bg">
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="{{route('coursemanager')}}">
                                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">import_contacts</i> My Courses
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="{{route('categories')}}">
                                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">list</i> Categories
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="{{route('subcategories')}}">
                                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">filter_list</i> Subcategories
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="{{route('quizzes')}}">
                                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">help</i> Quiz Manager
                                                </a>
                                            </li>
                                           
                                        </ul>
                                        <!-- Components menu -->
                                        <div class="sidebar-heading">Actions</div>
                                        <ul class="sidebar-menu">
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                              document.getElementById('logout-form').submit();">
                                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">lock_open</i> Logout
                                                </a>
                                            
                                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                 @csrf
                                             </form>
                                            </li>
                                        </ul>
                                        @elseif(Auth::user()->role_id==0)
                                        <div class="sidebar-heading">User</div>
                                        <ul class="sidebar-menu sm-active-button-bg">
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="{{route('dashboard')}}">
                                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_box</i> Admin
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- Account menu -->
                                        
                                        <div class="sidebar-heading">Courses</div>
                                        <ul class="sidebar-menu sm-active-button-bg">
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="{{route('coursemanager')}}">
                                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">import_contacts</i> Course Manager
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="{{route('instructors')}}">
                                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">group</i>Users
                                                </a>
                                            </li>
                                            
                                           
                                        </ul>
                                        <!-- Components menu -->
                                        <div class="sidebar-heading">Actions</div>
                                        <ul class="sidebar-menu">
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                              document.getElementById('logout-form').submit();">
                                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">lock_open</i> Logout
                                                </a>
                                            
                                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                 @csrf
                                             </form>
                                            </li>
                                        </ul>
                                        @endif
                                        
                     </div>
                 </div>
             </div>
         </div>

<!-- App Settings FAB -->
<div id="app-settings">
  
</div>

</div>
</div>

 <!-- jQuery -->
 <script src="{{asset('dashboard/assets/vendor/jquery.min.js')}}"></script>

 <!-- Bootstrap -->
 <script src="{{asset('dashboard/assets/vendor/popper.min.js')}}"></script>
 <script src="{{asset('dashboard/assets/vendor/bootstrap.min.js')}}"></script>

 <!-- Perfect Scrollbar -->
 <script src="{{asset('dashboard/assets/vendor/perfect-scrollbar.min.js')}}"></script>

 <!-- MDK -->
 <script src="{{asset('dashboard/assets/vendor/dom-factory.js')}}"></script>
 <script src="{{asset('dashboard/assets/vendor/material-design-kit.js')}}"></script>

 <!-- App JS -->
 <script src="{{asset('dashboard/assets/js/app.js')}}"></script>

 <!-- Highlight.js -->
 <script src="{{asset('dashboard/assets/js/hljs.js')}}"></script>

 <!-- App Settings (safe to remove) -->
 <script src="{{asset('dashboard/assets/js/app-settings.js')}}"></script>

 <!-- Global Settings -->
 <script src="{{asset('dashboard/assets/js/settings.js')}}"></script>

 <!-- Moment.js -->
 <script src="{{asset('dashboard/assets/vendor/moment.min.js')}}"></script>
 <script src="{{asset('dashboard/assets/vendor/moment-range.js')}}"></script>

 <!-- Chart.js -->
 <script src="{{asset('dashboard/assets/vendor/Chart.min.js')}}"></script>
 <script src="{{asset('dashboard/assets/js/chartjs-rounded-bar.js')}}"></script>
 <script src="{{asset('dashboard/assets/js/chartjs.js')}}"></script>

 <!-- Instructor Dashboard Page JS -->
 <script src="{{asset('dashboard/assets/js/page.instructor-dashboard.js')}}"></script>

 <!-- List.js -->
 <script src="{{asset('dashboard/assets/vendor/list.min.js')}}"></script>
 <script src="{{asset('dashboard/assets/js/list.js')}}"></script>
</body>


<!-- Mirrored from learnplus.demo.frontendmatter.com/student-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Apr 2021 12:53:39 GMT -->
</html>
       
