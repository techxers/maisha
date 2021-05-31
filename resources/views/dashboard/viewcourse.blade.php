@extends('layouts.base')

 @section('title')
    <title>View Course</title>
@endsection
<link href="https://unpkg.com/video.js@7.3.0/dist/video-js.min.css" rel="stylesheet">
    <script src="https://unpkg.com/video.js@7.3.0/dist/video.min.js"></script>
<script src="https://unpkg.com/video.js@7.3.0/dist/newskin.js"></script>
<style>
    span{
        margin-left: 50%;
    }
    .video-js{
        background-color: aliceblue;
    }
    /* Change all text and icon colors in the player. */
.video-js {
  color: blue;
}
.vjs-poster
{
    background-color: blue;
    width: 100%;
}

/* Change the border of the big play button. */
.vjs-big-play-button {
  border-color: blue;
}

/* Change the color of various "bars". */
.vjs-volume-level,
.vjs-play-progress,
.vjs-slider-bar {
  background:blue;
}
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
                                <h1 class="h2">{{$course->title}}</h1>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="media-wrapper ">
                                                {{-- <video class="embed-responsive-item"
                                      
                                                src="{{asset('uploads/'.$video->path)}}"
                                                allowfullscreen="" controls controlsList="nodownload" type="video/mp4" poster="{{asset('Images/'.$video->thumbnail)}}" ></video> --}}
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
                        </div>
                        
@endsection