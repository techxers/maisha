@extends('layouts.base')

@section('title')
    <title> Forum</title>
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
                    <li class="breadcrumb-item active">Forum</li>
                </ol>

                <div class="row">
                    <div class="col-md-8">

                        <div class="d-flex align-items-center mb-4">
                            <h1 class="h2 flex mr-3 mb-0">Forum</h1>
                            <a href="{{route('forum.create')}}"
                               class="btn btn-success">Ask a Question</a>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors as $item)
                                    <li>{{$error}}</li>
                                @endforeach
                            </div>
                        @endif
                       
                

                        <div class="card">
                            <div class="card-header">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h4 class="card-title">Your Questions</h4>
                                        <p class="card-subtitle">Latest questions your have asked on the forum.</p>
                                    </div>
                                    <div class="media-right">
                                        <a href="{{route('forum.create')}}"
                                           class="btn btn-white btn-sm"><i class="material-icons">add</i></a>
                                    </div>
                                </div>
                            </div>

                            <ul class="list-group list-group-fit">
                                @forelse ($forums as $item)
                                @foreach ($courses as $course)
                                @if ($item->id==$course->id)
                                <li class="list-group-item forum-thread">
                                    <div class="media align-items-center">
                                        <div class="media-left">
                                            <div class="forum-icon-wrapper">
                                                <a href="student-forum-thread.html"
                                                   class="forum-thread-icon">
                                                    <i class="material-icons">description</i>
                                                </a>
                                                <a href="student-profile.html"
                                                   class="forum-thread-user">
                                                    <img src="assets/images/people/50/guy-1.jpg"
                                                         alt=""
                                                         width="20"
                                                         class="rounded-circle">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="d-flex align-items-center">
                                                <a href="{{route('forum.show',$item->id)}}"
                                                   class="text-body"><strong>{{$item->course_id==0 ? 'General' : $course->title}}</strong></a>
                                                <small class="ml-auto text-muted">{{$item->created_at}}</small>
                                            </div>
                                            <a class="text-black-70"
                                               href="{{route('forum.show',$item->id)}}">{{$item->title}}</a>
                                        </div>
                                    </div>
                                </li>
                                @endif
                                @endforeach
                                @empty
                                    You have not asked any questions
                                @endforelse
                               

                              

                            

                            </ul>
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