@extends('layouts.base')

@section('title')
    <title> View Question</title>
@endsection

@section('content')
<div class="mdk-header-layout__content">

    <div data-push
         data-responsive-width="992px"
         class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('forums')}}">Forum</a></li>
                    <li class="breadcrumb-item active">View </li>
                </ol>

                <div class="row">
                    <div class="col-md-8">

                        <h1 class="h2 mb-2">{{$forum->title}}</h1>
                        <p class="text-muted d-flex align-items-center mb-4">
                            <a href="{{route('forums')}}"
                               class="mr-3">Back</a>
                      

                        </p>

                        <div class="card card-body">
                            <div class="d-flex">
                                <a href="#"
                                   class="avatar avatar-online mr-3">
                                    {{-- <img src="assets/images/256_rsz_nicolas-horn-689011-unsplash.jpg"
                                         alt="people"
                                         class="avatar-img rounded-circle"> --}}
                                </a>
                                <div class="flex">
                                    <p class="d-flex align-items-center mb-2">
                                        <a href="student-profile.html"
                                           class="text-body mr-2"><strong>You</strong></a>
                                        <small class="text-muted">{{$forum->created_at}}</small>
                                    </p>
                                    <p>{{$forum->description}}</p>
                                    
                                    
                                </div>
                            </div>
                        </div>

                        
                        <div class="pt-3">
                            <h4>Replies</h4>
                            <div class="d-flex mb-3">
                                <a href="student-profile.html"
                                   class="avatar avatar-xs mr-3">
                                    <img src="assets/images/256_rsz_karl-s-973833-unsplash.jpg"
                                         alt="people"
                                         class="avatar-img rounded-circle">
                                </a>
                                <div class="flex">
                                    <a href="student-profile.html"
                                       class="text-body"><strong>Joseph S. Ferland</strong></a>
                                    <span class="text-black-70">How can I load Charts on a page?</span><br>
                                    <span class="text-black-50">on <a href="student-take-course.html"
                                           class="text-black-50"
                                           style="text-decoration: underline;">Data Visualization With Chart.js</a></span><br>
                                    <div class="d-flex align-items-center">
                                        <small class="text-black-50 mr-2">27 min ago</small>
                                        <a href="#"
                                           class="text-black-50"><small>Liked</small></a>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex ml-sm-32pt mt-3 border rounded p-3 bg-light mb-3">
                                <a href="#"
                                   class="avatar avatar-xs mr-3">
                                    <img src="assets/images/people/110/guy-6.jpg"
                                         alt="Guy"
                                         class="avatar-img rounded-circle">
                                </a>
                                <div class="flex">
                                    <div class="d-flex align-items-center">
                                        <a href="student-profile.html"
                                           class="text-body"><strong>FrontendMatter</strong></a>
                                        <small class="ml-auto text-muted">just now</small>
                                    </div>
                                    <p class="mt-1 mb-0 text-black-70">Hi Joseph,<br> Thank you for purchasing our course! <br><br>Please have a look at the charts library documentation <a href="#">here</a> and follow the instructions.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <h4>Our Instructors</h4>
                        <p class="text-black-70">Our experienced instructors are ready to answer your questions.</p>

                        <div class="mb-4">
                            @forelse ($instructors as $item)
                            <div class="d-flex align-items-center mb-2">
                                <a href="student-profile.html"
                                   class="avatar avatar-sm mr-3">
                                    {{-- <img src="assets/images/people/50/guy-1.jpg"
                                         alt=""
                                         class="avatar-img rounded-circle"> --}}
                                </a>
                                <a href="student-profile.html"
                                   class="flex mr-2 text-body"><strong>{{$item->name}}</strong></a>
                                <span class="text-black-70 mr-2">{{$courses->where('user_id',$item->id)->count()}} Courses</span>
                                <i class="text-muted material-icons font-size-16pt">opacity</i>
                            </div>
                            @empty
                                No instructors to show
                            @endforelse

                        </div>

                    </div>
                </div>
            </div>

        </div>
@endsection