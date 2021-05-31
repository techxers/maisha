<!DOCTYPE html>
<html lang="en"
      dir="ltr">

    
<!-- Mirrored from learnplus.demo.frontendmatter.com/fixed-student-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Apr 2021 12:54:52 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @yield('title')

        <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
        <meta name="robots"
              content="noindex">

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
              <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/logo/maisha1.png')}}">
    </head>

    <body class=" fixed-layout">

        <div class="preloader bg-danger">
            <div class="sk-chase bg-danger">
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
            </div>


            <!-- More spinner examples at https://github.com/tobiasahlin/SpinKit/blob/master/examples.html -->
        </div>

        <!-- Header Layout -->
        <div class="mdk-header-layout js-mdk-header-layout">

            <!-- Header -->

            <div id="header"
                 class="mdk-header bg-dark js-mdk-header m-0"
                 data-fixed
                 data-effects="waterfall">
                <div class="mdk-header__content">

                    <!-- Navbar -->
                    <nav id="default-navbar"
                         class="navbar navbar-expand navbar-danger bg-white m-0">
                        <div class="container">
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
                                
                            </a>

                    

                            <div class="flex"></div>

                            <!-- Menu -->
                            <ul class="nav navbar-nav flex-nowrap d-none d-lg-flex">
                                <li class="nav-item">
                                    <a class="nav-link text-danger"
                                       href="{{route('forums')}}">Forum</a>
                                </li>
                            </ul>

                            <!-- Menu -->
                            <ul class="nav navbar-nav flex-nowrap">

                             

                                <!-- Notifications dropdown -->
                                <li class="nav-item dropdown dropdown-notifications dropdown-menu-sm-full">
                                    <button class="nav-link btn-flush dropdown-toggle text-black"
                                            type="button"
                                            data-toggle="dropdown"
                                            data-dropdown-disable-document-scroll
                                            data-caret="false">
                                        <i class="material-icons">notifications</i>
                                        <span class="badge badge-notifications badge-danger">{{Auth::user()->unreadNotifications->count()}}</span>
                                    </button>
                                    
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div data-perfect-scrollbar
                                             class="position-relative">
                                             <div class="dropdown-header"><strong><a href="{{route('notifications.markread')}}">Mark All Read</a> </strong></div>
                                            
                                            <div class="list-group list-group-flush mb-0">
                                           @forelse (Auth::user()->unreadNotifications as $item)
                                           
                                               @if ($item->data['type']=='forum')
                                               <a href="{{route('forum.show',$item->data['forum_id'])}}"
                                               class="list-group-item list-group-item-action unread">
                                                <span class="d-flex align-items-center mb-1">
                                                    <small class="text-muted">{{$item->created_at->diffForHumans()}}</small>
       
                                                    <span class="ml-auto unread-indicator bg-primary"></span>
       
                                                </span>
                                                <span class="d-flex">
                                                    <span class="flex d-flex flex-column">
                                                        <strong>New question on the forum</strong>
                                                        <span class="text-black-70">
                                                            @foreach ($forums as $forum)
                                                                @if ($forum->id==$item->data['forum_id'])
                                                                    {{$forum->title}}
                                                                @endif
                                                            @endforeach
                                                        </span>
                                                    </span>
                                                </span>
                                               </a>
                                               @elseif($item->data['type']=='reply')
                                               <a href="{{route('forum.show',$item->data['forum_id'])}}"
                                                class="list-group-item list-group-item-action unread">
                                                 <span class="d-flex align-items-center mb-1">
                                                     <small class="text-muted">{{$item->created_at->diffForHumans()}}</small>
        
                                                     <span class="ml-auto unread-indicator bg-primary"></span>
        
                                                 </span>
                                                 <span class="d-flex">
                                                     <span class="flex d-flex flex-column">
                                                         <strong> New reply for your question</strong>
                                                         <span class="text-black-70">
                                                             @foreach ($forums as $forum)
                                                                 @if ($forum->id==$item->data['forum_id'])
                                                                 You have a new reply for your question on <b>{{' '.$forum->title}}</b>
                                                                 @endif
                                                             @endforeach
                                                         </span>
                                                     </span>
                                                 </span>
                                                </a>
                        
                                               @endif
                                           @empty
                                           <a href="#"
                                                  class="list-group-item list-group-item-action unread">
                                                   <span class="d-flex align-items-center mb-1">
                                                       <small class="text-muted"></small>
                                                       No new notifications
                                                       <span class="ml-auto unread-indicator bg-primary"></span>
                                                   </span>
                                               </a>
                                           @endforelse
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
                                       role="button"> <img src="{{Auth::user()->photo==null ? asset('Images/default.png') : asset('Images/'.Auth::user()->photo) }}"
                                       alt="Avatar"
                                       class="rounded-circle"
                                       width="40">
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item"
                                        href="{{route('profile.edit',Auth::user()->id)}}">
                                         <i class="material-icons">edit</i> Edit Account
                                     </a>
                                     <a class="dropdown-item"
                                     href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                         <i class=" material-icons">lock</i> Logout
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

            <!-- Header Layout Content -->
            <div class="mdk-header-layout__content d-flex flex-column">


                <div class="page ">
                    @yield('content')
                  
                </div>
            </div>
            <!-- // END Header Layout Content -->

        </div>
        <!-- // END Header Layout -->

        <div class="mdk-drawer js-mdk-drawer"
             id="default-drawer">
            <div class="mdk-drawer__content ">
                
                <div class="sidebar sidebar-left sidebar-dark bg-dark o-hidden"
                data-perfect-scrollbar>
               <div class="sidebar-p-y">
                   @if (Auth::user()->role_id==1)
                   <div class="sidebar-heading">User</div>
                   <ul class="sidebar-menu sm-active-button-bg">
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button"
                           href="{{route('courses')}}">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">search</i> Browse Courses
                        </a>
                    </li>
                   </ul>
                   <!-- Account menu -->
                   
                   <div class="sidebar-heading">Courses</div>
                   <ul class="sidebar-menu sm-active-button-bg">
                       
                       <li class="sidebar-menu-item">
                           <a class="sidebar-menu-button"
                              href="{{route('mycourses')}}">
                               <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">important_devices</i> My Videos
                           </a>
                       </li>
                       <li class="sidebar-menu-item">
                           <a class="sidebar-menu-button"
                              href="{{route('quizresults')}}">
                               <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">poll</i> Quiz Results
                           </a>
                       </li>
                       <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button"
                        href="{{route('forums')}}">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">message</i> Forum
                        </a>
                    </li>
                       
                   </ul>
                   <!-- Components menu -->
                   <div class="sidebar-heading">Actions</div>
                   <ul class="sidebar-menu">
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button"
                           href="{{route('profile.edit',Auth::user()->id)}}">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">edit</i> Edit Profile
                        </a>
                    </li>
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
                   @elseif(Auth::user()->role_id==2)
                   <div class="sidebar-heading">User</div>
                   <ul class="sidebar-menu sm-active-button-bg">
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button"
                           href="{{route('coursemanager')}}">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">import_contacts</i> Course Manager
                        </a>
                    </li>
                   </ul>
                   <!-- Account menu -->
                   
                   <div class="sidebar-heading">Courses</div>
                   <ul class="sidebar-menu sm-active-button-bg">
                       <li class="sidebar-menu-item">
                           <a class="sidebar-menu-button"
                              href="{{route('categories')}}">
                               <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">list</i> Categories
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
                              href="{{route('categories')}}">
                               <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">list</i>Users
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
        <script src="{{asset('dashboard/assets/js/chartjs.js')}}"></script>

        <!-- Student Dashboard Page JS -->
        <!-- <script src="'dashboard/assets/js/chartjs-rounded-bar.js')}}"></script> -->
        <script src="{{asset('dashboard/assets/js/page.student-dashboard.js')}}"></script>

    </body>


<!-- Mirrored from learnplus.demo.frontendmatter.com/fixed-student-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Apr 2021 12:54:52 GMT -->
</html>