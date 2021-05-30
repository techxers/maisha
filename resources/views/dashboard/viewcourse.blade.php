@extends('layouts.base')

 @section('title')
    <title>View Course</title>
@endsection
<style>
    span{
        margin-left: 50%;
    }
</style>
@section('content')
{{--
 
        <div class="mdk-header-layout__content">

            <div data-push
                 data-responsive-width="992px"
                 class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">

                    <div class="container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('courses')}}">Courses</a></li>
                            <li class="breadcrumb-item active">{{$course->title}}</li>
                        </ol>
                        <h1 class="h2">{{$course->title}}</h1>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <video class="embed-responsive-item"
                                      
                                                src="{{asset('uploads/'.$video->path)}}"
                                                allowfullscreen="" controls controlsList="nodownload"></video>
                                    </div>
                                    <div class="card-body">
                                        {{$video->title}} <span>{{$views->where('video_id',$video->id)->count()}} Views</span>
                                    </div>
                                </div>

                                <!-- Lessons -->
                                <ul class="card list-group list-group-fit">
                                    @forelse ($videos as $video)
                                    @if($video->id==$play_id)
                                        <li class="list-group-item active">
                                            <div class="media">
                                                <div class="media-left">
                                                    <div class="text-muted"></div>
                                                </div>
                                                <div class="media-body">
                                                    <form action="" method="get">
                                                        <input type="hidden" name="play_id" value="{{$video->id}}">
                                                        <button type="submit" style="background-color: transparent;border:none;" ><h6 class="text-white"><a> {{$video->title}}</a> {{$views->where('video_id',$video->id)->count()}} Views</h6></button>
                                                    </form>
                                                    
                                                </div>
                                            </div>
                                        </li>
                                    @else
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="text-muted"></div>
                                            </div>
                                            <div class="media-body">
                                              
                                                <a href="/viewcourse/{{$course->id}}?{{$video->id}}"> {{$video->title}}</a>
                                             
                                                
                                            </div>
                                        </div>
                                    </li>
                                    @endforelse
                                    @empty
                                        No videos added
                                    @endforelse 
                                </ul>
                            </div>
                            <div class="col-md-4">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{session('success')}}
                                    </div>
                                @endif
                                @can('admin')
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p>
                                            
                                            @if ($course->status=='inactive')
                                                <div class="media-right">
                                                    <a href="{{route('approve',$course->id)}}" class="btn btn-success" >Approve</a>
                                                </div>
                                            @else
                                                <div class="media-right">
                                                    <a href="{{route('disapprove',$course->id)}}" class="btn btn-danger" >Disapprove</a>
                                                </div>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                @endcan
                                <div class="card-body text-center">
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach ($errors as $item)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </div>
                                @endif
                               
                                @cannot('admin')

                                
                                @if($show_quiz==true&&$quiz->status=='approved')
                                @if(Auth::user()->myquizzes->where('quiz_id',$quiz->id)->count()==0)
                                <div class="card">
                                        <p>
                                            <div class="media-right">
                                                <a href="{{route('myquiz.create',$quiz->id)}}" class="btn btn-success" >Take Quiz</a>
                                            </div> 
                                            Take a quiz on this course  
                                        </p>
                                    </div>
                                </div>
                                @else
                                <div class="card">
                                    <p>
                                        <div class="media-right">
                                            <a href="{{route('myquiz.show',$quiz->id)}}" class="btn btn-success" >View Quiz</a>
                                        </div> 
                                        You have attempted this quiz
                                    </p>
                                </div>
                                </div>
                                @endif
                                @endif
                                @endcannot
                               
                                <div class="card">
                                    <div class="card-header">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                    
                                            </div>
                                            <div class="media-body">
                                                <h4 class="card-title"><a href="{{route('profile.show',$instructor->id)}}">{{$instructor->name}}</a></h4>
                                                <p class="card-subtitle">Instructor</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h4>About Course</h4>
                                        <p>{{$course->description}}</p>
                                        
                                    </div>
                                </div>
                               
                        
                            </div>
                        </div>
                    </div>

                </div> --}}

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
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <video class="embed-responsive-item"
                                      
                                                src="{{asset('uploads/'.$video->path)}}"
                                                allowfullscreen="" controls controlsList="nodownload"></video>
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
                                                        <div class="text-muted">{{$i++}}</div>
                                                    </div>
                                                    <div class="media-body">
                                                        <a class=" {{$video->id==$play_id ?'text-white':($views->where('user_id',Auth::user()->id)->where('video_id',$video->id)->count()==0 ?'text-muted-light':'')}}" href="/viewcourse/{{$course->id}}?play_id={{$video->id}}">{{$video->title}}</a>
                                                    </div>
                                                    <div class="media-right">
                                                        <small class="text-muted-light">{{$views->where('video_id',$video->id)->count()}} Views</small>
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
                                                        <img src="{{$course->user->photo==null ? asset('Images/default.jpg') : asset('Images/'.$course->user->photo)}}"
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