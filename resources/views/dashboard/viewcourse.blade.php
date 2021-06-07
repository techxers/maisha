@extends('layouts.base')

 @section('title')
    <title>View Course</title>
@endsection
<link href="https://unpkg.com/video.js@7.3.0/dist/video-js.min.css" rel="stylesheet">
    <script src="https://unpkg.com/video.js@7.3.0/dist/video.min.js"></script>
<script src="https://unpkg.com/video.js@7.3.0/dist/newskin.js"></script>

   <style>
    .video-js{
        background-color: rgb(255,63,36);
    }
.video-js {
  color: rgb(255,63,36);
}
.vjs-poster
{
    background-color: rgb(255,63,36);
    width: 100%;
}
/* Change the border of the big play button. */
.vjs-big-play-button {
  border-color: rgb(255,63,36);
}
/* Change the color of various "bars". */
.vjs-volume-level,
.vjs-play-progress,
.vjs-slider-bar {
  background:rgb(255,63,36);
} 
video{ /* video border */ border: 1px solid #ccc;  border-radius: 20px; /* tranzitionstransitions applied to the vodeovideo element */ -moz-transition: all 1s ease-in-out; -webkit-transition: all 1s ease-in-out; -o-transition: all 1s ease-in-out; -ms-transition: all 1s ease-in-out; transition: all 1s ease-in-out; } /* background color and gradient */ video, #start, #stop, #pause, #plus, #minus, #mute { /* background color */ background-color: #ffcccc; /* background gradient */ background-image: linear-gradient(top, #fff, #fcc); background-image: -moz-linear-gradient(top, #fff, #fcc); background-image: -webkit-linear-gradient(top, #fff, #fcc); background-image: -o-linear-gradient(top, #fff, #fcc); background-image: -ms-linear-gradient(top, #fff, #fcc); } /* shadows */ video, #start, #stop, #pause, #plus, #minus, #mute { box-shadow: 0 0 10px #ccc; } video:hover, video:focus, #start:hover, #stop:hover, #pause:hover, #plus:hover, #minus:hover, #mute:hover { /* glow */ box-shadow: 0 0 20px #f88; } #controls { display: none; margin: 10px 30px; } /* style for buttons */ #start, #stop, #pause, #plus, #minus, #mute { border: 1px solid #ccc; padding: 5px; border-radius: 10px; width: 60px; margin: 0 10px 0 0; } body{ /* color tranzitiontransition */ -webkit-transition: background-color 1s ease-in-out; -moz-transition: background-color 1s ease-in-out; -o-transition: background-color 1s ease-in-out; -ms-transition: background-color 1s ease-in-out; transition: background-color 1s ease-in-out; /* initial color */ background-color: #fff; } #butterfly{ position: absolute; left: 0; top: -6px; background-image: url(butterfly.png); width: 40px; height: 40px; } #progressbar{ display: none; /* size */ width: 500px; height: 20px; /* position and border */ position: relative; border: 1px solid #ccc; margin: 10px; border-radius: 20px; /* background color */ background-color: #cccccc; /* background gradient */ background-image: linear-gradient(top, #fff, #ccc); background-image: -moz-linear-gradient(top, #fff, #ccc); background-image: -webkit-linear-gradient(top, #fff, #fcc); background-image: -o-linear-gradient(top, #fff, #ccc); background-image: -ms-linear-gradient(top, #fff, #ccc); /* shadow */ box-shadow: 0 0 10px #ccc; } #loadingprogress{ /* border */ border-radius: 20px; /* initial size */ height: 20px; width: 0; /* background color */ background-color: #9acd00; /* background gradient */ background-image: linear-gradient(top, #ffffff, #9acd00); background-image: -moz-linear-gradient(top, #ffffff, #9acd00); background-image: -webkit-linear-gradient(top, #ffffff, #9acd00); background-image: -o-linear-gradient(top, #ffffff, #9acd00); background-image: -ms-linear-gradient(top, #ffffff, #9acd00); }


</style>

@section('content')
<div class="mdk-header-layout__content">

    <div data-push
         data-responsive-width="992px"
         class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('courses')}}">Courses</a></li>
                    <li class="breadcrumb-item active">{{$course->title}}</li>
                </ol>
             
                <div class="card">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <div class="media-left">
                                <h4 class="mb-0"><strong>Course Title: </strong></h4>
                            </div>
                            <div class="media-body">
                                <h4 class="card-title">
                                    {{$course->title}}
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                
                            <div class="media-wrapper ">
                                
                                <video id="player" 
                                class="video-js" 
                                controls preload="none" 
                                style="width: 100%" 
                                height="450" 
                                poster="{{asset('Images/'.$video->thumbnail)}}"  data-setup="{}">
                                    <source src="{{asset('uploads/'.$video->path)}}" type="video/mp4">
                                  </video>
                            </div>
                            <div class="card-body">
                                {{$video->title}}
                                <div class="align-right">
                                    <small class="text-muted-light">{{$views->where('video_id',$video->id)->count()}} Views</small>
                                </div>
                            </div>
                    </div>
                   
                        <div class="card-header">
                            <div class="media align-items-center">
                                <div class="media-left">
                                    <img src="{{$course->user->photo==null ? asset('Images/default.png') : asset('Images/'.$course->user->photo)}}"
                                         alt="About Adrian"
                                         width="50"
                                         class="rounded-circle">
                                </div>
                                <div class="media-body">
                                    <h4 class="card-title"><a href="{{route('profile.show',$course->user->id)}}">{{$course->user->name}}</a></h4>
                                    <p class="card-subtitle">Instructor</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>{{$course->description}}</p>
                            
                        </div>
                    
                    <div class="card-footer">
                        @if (session('success'))
                        <div class="alert alert-success">
                             {{session('success')}}
                        </div>
                        @endif
                        <div class="card-body">
                            @if($show_quiz==true&&$quiz->status=='approved')
                             @if(Auth::user()->myquizzes->where('quiz_id',$quiz->id)->count()==0)
                            <p>
                                <a href="{{route('myquiz.create',$quiz->id)}}"
                                   class="btn btn-success">
                                   <i class="material-icons btn__icon--right">help</i>
                                    <strong>Take Quiz</strong>
                                </a>
                            </p>
                            @else 
                            <p>
                                <a href="{{route('myquiz.show',$quiz->id)}}"
                                   class="btn btn-success">
                                   <i class="material-icons btn__icon--right">help</i> View Quiz Results
                                </a>
                            </p>
                            @endif
                            @else 
                            <a href="#" class="btn btn-white">
                                 No quiz for this course
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mdk-drawer js-mdk-drawer"
             data-align="end">
            <div class="mdk-drawer__content ">
                <div class="sidebar sidebar-right sidebar-light bg-white o-hidden"
                     data-perfect-scrollbar>
                    <div class="sidebar-p-y">
                        <div class="sidebar-heading">Course Videos</div>
                        <div class="countdown sidebar-p-x"
                             data-value="4"
                             data-unit="hour"></div>
                        <ul class="list-group list-group-fit">
                            @foreach ($videos as $video)
                            <li class="list-group-item {{$video->id==$play_id ?'active':''}}">
                                <a href="/viewcourse/{{$course->id}}?play_id={{$video->id}}">
                                    <span class="media align-items-center">
                                        <span class="media-left">
                                            <span class="btn btn-white btn-circle"><img src="{{asset('Images/'.$video->thumbnail)}}" width="30" alt=""></span>
                                        </span>
                                        <span class="media-body">
                                            {{$video->title}}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

   
                 {{-- <div class="mdk-header-layout__content">

                    <div data-push
                         data-responsive-width="992px"
                         class="mdk-drawer-layout js-mdk-drawer-layout">
                        <div class="mdk-drawer-layout__content page ">
    
                            <div class="container page__container">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('courses')}}">Courses</a></li>
                                    <li class="breadcrumb-item active">{{$course->title}}</li>
                                </ol>
                                <h1 class="h2">{{$course->title}}</h1>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="media-wrapper ">
                                                
                                                <video id="player" 
                                                class="video-js" 
                                                controls preload="none" 
                                                style="width: 100%" 
                                                height="400" 
                                                poster="{{asset('Images/'.$video->thumbnail)}}"  data-setup="{}">
                                                    <source src="{{asset('uploads/'.$video->path)}}" type="video/mp4">
                                    
                                                  </video>
                                            </div>
                                            <div class="card-body">
                                                {{$video->title}}
                                                <div class="align-right">
                                                    <small class="text-muted-light">{{$views->where('video_id',$video->id)->count()}} Views</small>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Lessons -->
                                        <ul class="card list-group list-group-fit">
                                            <span style="display: none;">{{$i=1}}</span>
                                        @forelse ($videos as $video)
                                        
                                            <li class="list-group-item {{$video->id==$play_id ?'active':''}}">
                                                <div class="media ">
                                                    <div class="media-left">
                                                        <div class="text-black">{{$i++}}</div>
                                                    </div>
                                                    <div class="media-body">
                                                        <a class=" {{$video->id==$play_id ?'text-white':($views->where('user_id',Auth::user()->id)->where('video_id',$video->id)->count()==0 ?'text-muted-light':'')}}" href="/viewcourse/{{$course->id}}?play_id={{$video->id}}" >{{$video->title}}</a>
                                                    </div>
                                                    <div class="media-right">
                                                        <small class="text-black">{{$views->where('video_id',$video->id)->count()}} Views</small>
                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                            <li class="list-group-item">No videos to show</li>
                                        @endforelse
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                     
                                        <div class="card">
                                            @if (session('success'))
                                            <div class="alert alert-success">
                                                 {{session('success')}}
                                            </div>
                                            @endif
                                            <div class="card-body text-center">
                                                @if($show_quiz==true&&$quiz->status=='approved')
                                                 @if(Auth::user()->myquizzes->where('quiz_id',$quiz->id)->count()==0)
                                                <p>
                                                    <a href="{{route('myquiz.create',$quiz->id)}}"
                                                       class="btn btn-success btn-block flex-column">
            
                                                        <strong>Take Quiz</strong>
                                                    </a>
                                                </p>
                                                @else 
                                                <p>
                                                    <a href="{{route('myquiz.show',$quiz->id)}}"
                                                       class="btn btn-success btn-block flex-column">
                                                        View Quiz Results
                                                    </a>
                                                </p>
                                                @endif
                                                @else 
                                                <a href="#" class="btn btn-white btn-block flex-column">
                                                     No quiz for this course
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="media align-items-center">
                                                    <div class="media-left">
                                                        <img src="{{$course->user->photo==null ? asset('Images/default.png') : asset('Images/'.$course->user->photo)}}"
                                                             alt="About Adrian"
                                                             width="50"
                                                             class="rounded-circle">
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="card-title"><a href="{{route('profile.show',$course->user->id)}}">{{$course->user->name}}</a></h4>
                                                        <p class="card-subtitle">Instructor</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <p>{{$course->description}}</p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        
@endsection