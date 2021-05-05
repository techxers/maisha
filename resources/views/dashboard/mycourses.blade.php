@extends('layouts.base')

@section('title')
    <title> Courses</title>
@endsection

@section('content')
<div class="mdk-header-layout js-mdk-header-layout">

    <!-- Header -->

    <div id="header"
         data-fixed
         class="mdk-header js-mdk-header mb-0">
        <div class="mdk-header__content">

            <!-- Navbar -->
            <nav id="default-navbar"
                 class="navbar navbar-expand navbar-dark bg-primary m-0">
                <div class="container-fluid">
                    <!-- Toggle sidebar -->
                    <button class="navbar-toggler d-block"
                            data-toggle="sidebar"
                            type="button">
                        <span class="material-icons">menu</span>
                    </button>

                    <!-- Brand -->
                    <a href="student-dashboard.html"
                       class="navbar-brand">
                        <img src="{{asset('dashboard/assets/images/logo/whit')}}e.svg"
                             class="mr-2"
                             alt="LearnPlus" />
                        <span class="d-none d-xs-md-block">LearnPlus</span>
                    </a>

                    <!-- Search -->
                    <form class="search-form d-none d-md-flex">
                        <input type="text"
                               class="form-control"
                               placeholder="Search">
                        <button class="btn"
                                type="button"><i class="material-icons font-size-24pt">search</i></button>
                    </form>
                    <!-- // END Search -->

                    <div class="flex"></div>

                    <!-- Menu -->
                    <ul class="nav navbar-nav flex-nowrap d-none d-lg-flex">
                        <li class="nav-item">
                            <a class="nav-link"
                               href="student-forum.html">Forum</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="student-help-center.html">Get Help</a>
                        </li>
                    </ul>

                    <!-- Menu -->
                    <ul class="nav navbar-nav flex-nowrap">

                        <li class="nav-item d-none d-md-flex">
                            <a href="student-cart.html"
                               class="nav-link">
                                <i class="material-icons">shopping_cart</i>
                            </a>
                        </li>

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
                                                    <img src="{{asset('dashboard/assets/images/people/11')}}0/woman-5.jpg"
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
                                                    <img src="{{asset('dashboard/assets/images/people/11')}}0/woman-5.jpg"
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
                               role="button"><img src="{{asset('dashboard/assets/images/people/50')}}/guy-6.jpg"
                                     alt="Avatar"
                                     class="rounded-circle"
                                     width="40"></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item"
                                   href="student-account-edit.html">
                                    <i class="material-icons">edit</i> Edit Account
                                </a>
                                <a class="dropdown-item"
                                   href="student-profile.html">
                                    <i class="material-icons">person</i> Public Profile
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

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push
             data-responsive-width="992px"
             class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="student-dashboard.html">Home</a></li>
                        <li class="breadcrumb-item active">My Courses</li>
                    </ol>
                    <div class="media mb-headings align-items-center">
                        <div class="media-body">
                            <h1 class="h2">My Courses</h1>
                        </div>
                        <div class="media-right">
                            <div class="btn-group btn-group-sm">
                                <a href="#"
                                   class="btn btn-white active"><i class="material-icons">list</i></a>
                                <a href="#"
                                   class="btn btn-white"><i class="material-icons">dashboard</i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-columns">
                        <div class="card">
                            <div class="card-header">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="student-student-take-course.html">
                                            <img src="{{asset('dashboard/assets/images/vuejs.png')}}"
                                                 alt="Card image cap"
                                                 width="100"
                                                 class="rounded">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="card-title m-0"><a href="student-take-course.html">Learn VueJs the easy way!</a></h4>

                                    </div>
                                </div>
                            </div>
                            <div class="progress rounded-0">
                                <div class="progress-bar progress-bar-striped bg-primary"
                                     role="progressbar"
                                     style="width: 40%"
                                     aria-valuenow="40"
                                     aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                            <div class="card-footer bg-white">
                                <a href="student-take-course.html"
                                   class="btn btn-primary btn-sm">Continue <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="student-student-take-course.html">
                                        <img src="{{asset('dashboard/assets/images/gulp.png')}}"
                                                 alt="Card image cap"
                                                 width="100"
                                                 class="rounded">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="card-title m-0"><a href="#">Npm &amp; Gulp Advanced Workflow</a></h4>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="progress rounded-0">
                                <div class="progress-bar progress-bar-striped bg-success"
                                     role="progressbar"
                                     style="width: 100%"
                                     aria-valuenow="100"
                                     aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                            <div class="card-footer bg-white ">
                                <a href="student-take-course.html"
                                   class="btn btn-success btn-sm">Completed <i class="material-icons btn__icon--right">check</i></a>
                                <a href="student-take-course.html"
                                   class="btn btn-white btn-sm">Take a Quiz <i class="material-icons btn__icon--right">replay</i> </a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="student-student-take-course.html">
                                            <img src="{{asset('dashboard/assets/images/github.png')}}"
                                                 alt="Card image cap"
                                                 width="100"
                                                 class="rounded">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="card-title m-0"><a href="#">Github Webhooks for Beginners</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="progress rounded-0">
                                <div class="progress-bar progress-bar-striped bg-primary"
                                     role="progressbar"
                                     style="width: 80%"
                                     aria-valuenow="80"
                                     aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                            <div class="card-footer bg-white">
                                <a href="student-take-course.html"
                                   class="btn btn-primary btn-sm">Continue <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="student-student-take-course.html">
                                            <img src="{{asset('dashboard/assets/images/gulp.png')}}""
                                                 alt="Card image cap"
                                                 width="100"
                                                 class="rounded">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="card-title m-0"><a href="#">Gulp and Slush</a></h4>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="progress rounded-0">
                                <div class="progress-bar progress-bar-striped bg-primary"
                                     role="progressbar"
                                     style="width: 56%"
                                     aria-valuenow="56"
                                     aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                            <div class="card-footer bg-white">
                                <a href="student-take-course.html"
                                   class="btn btn-primary btn-sm">Continue <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header ">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="student-student-take-course.html">
                                            <img src="{{asset('dashboard/assets/images/vuejs.png')}}"
                                                 alt="Card image cap"
                                                 width="100"
                                                 class="rounded">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="card-title m-0"><a href="#">VueJs</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="progress rounded-0">
                                <div class="progress-bar progress-bar-striped bg-primary"
                                     role="progressbar"
                                     style="width: 40%"
                                     aria-valuenow="40"
                                     aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                            <div class="card-footer bg-white">
                                <a href="student-take-course.html"
                                   class="btn btn-primary btn-sm">Continue <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <ul class="pagination justify-content-center pagination-sm">
                        <li class="page-item disabled">
                            <a class="page-link"
                               href="#"
                               aria-label="Previous">
                                <span aria-hidden="true"
                                      class="material-icons">chevron_left</span>
                                <span>Prev</span>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link"
                               href="#"
                               aria-label="1">
                                <span>1</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link"
                               href="#"
                               aria-label="1">
                                <span>2</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link"
                               href="#"
                               aria-label="Next">
                                <span>Next</span>
                                <span aria-hidden="true"
                                      class="material-icons">chevron_right</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
@endsection