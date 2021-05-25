@extends('layouts.base')

@section('title')
    <title> My Videos</title>
@endsection

@section('content')
<div class="mdk-header-layout js-mdk-header-layout">


    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push
             data-responsive-width="992px"
             class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">My Courses</li>
                    </ol>
                    <div class="card-columns">
                        
                        @forelse ($mycourses as $item)
                        @foreach ($videos as $video)
                        @foreach ($courses as $course)
                            @if ($item->video_id==$video->id)
                            @if($video->course_id==$course->id&&$item->course_id )
                            <div class="card">
                                <div class="card-header">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="{{route('viewcourse',$course->id)}}">
                                                <img src="{{asset('Images/'.$video->thumbnail) }}"
                                                     alt="Card image cap"
                                                     width="100"
                                                     class="rounded">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="card-title m-0"><a href="{{route('viewcourse',$course->id)}}">{{$video->title}}</a></h4>
    
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="progress rounded-0">
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
                                </div> --}}
                            </div>
                            @endif
                            @endif
                            @endforeach
                        @endforeach
                       
                        @empty
                           You have no enrolled to any course 
                        @endforelse
                    </div>
                    {{$mycourses->links()}}
                </div>
            </div>
@endsection