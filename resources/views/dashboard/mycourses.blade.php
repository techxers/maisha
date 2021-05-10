@extends('layouts.base')

@section('title')
    <title> Courses</title>
@endsection

@section('content')
<div class="mdk-header-layout js-mdk-header-layout">


    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push
             data-responsive-width="992px"
             class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">My Courses</li>
                    </ol>
                    <div class="media mb-headings align-items-center">
                        <div class="media-body">
                            <h1 class="h2">My Courses</h1>
                            <div class="card card-body border-left-3 border-left-primary navbar-shadow mb-4">
                                <form action="{{route('mycourses')}}" method="GET" id="search">
                                    <div class="d-flex flex-wrap2 align-items-center mb-headings">
                                       
                                        <div class="flex search-form ml-3 search-form--light">
                                            <input type="text"
                                                   class="form-control"
                                                   placeholder="Search courses"
                                                   id="searchSample02" name="value" value="{{$search}}">
                                                   <button type="submit" style="background-color: transparent;border:none;"><i class="material-icons">search</i></button>
                                          
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-columns">
                        @forelse ($mycourses as $item)
                        @foreach ($courses as $course)
                            @if ($item->course_id==$course->id)
                            <div class="card">
                                <div class="card-header">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="student-student-take-course.html">
                                                <img src="{{asset('Images/'.$course->thumbnail)}}"
                                                     alt="Card image cap"
                                                     width="100"
                                                     class="rounded">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="card-title m-0"><a href="{{route('viewcourse',$course->id)}}">{{$course->title}}</a></h4>
    
                                        </div>
                                    </div>
                                </div>
                                <div class="progress rounded-0">
                                    <div class="progress-bar progress-bar-striped bg-primary"
                                         role="progressbar"
                                         style="width: 100%"
                                         aria-valuenow="40"
                                         aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                </div>
                                <div class="card-footer bg-white">
                                    <a href="student-take-course.html"
                                       class="btn btn-primary btn-sm">Continue <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                                </div>
                            </div>
                            @endif
                        @endforeach
                       
                        @empty
                           You have no enrolled to any course 
                        @endforelse
                    </div>
                    {{$mycourses->links()}}
                </div>
            </div>
@endsection