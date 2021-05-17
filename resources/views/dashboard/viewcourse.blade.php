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
                                              
                                                <form action="" method="get">
                                                    <input type="hidden" name="play_id" value="{{$video->id}}">
                                                  {{$views->where('video_id',$video->id)->count()}} Views
                                                    <button type="submit" style="background-color: transparent;border:none;" ><a>{{'   '.$video->title}}</a></button>
                                                </form>
                                             
                                                
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
                                <div class="card">
                                    <div class="card-header">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                    
                                            </div>
                                            <div class="media-body">
                                                <h4 class="card-title"><a href="{{route('show.instructors',$instructor->id)}}">{{$instructor->name}}</a></h4>
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

                </div>

                
                        

@endsection