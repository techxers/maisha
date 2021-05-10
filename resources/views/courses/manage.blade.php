@extends('layouts.base2')

@section('title')
    <title>View Course</title>
@endsection

@section('content')


    
{{-- <div class="mdk-header-layout__content">

    <div data-push
         data-responsive-width="992px"
         class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="instructor-dashboard.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="instructor-courses.html">Courses</a></li>
                    <li class="breadcrumb-item active">View course</li>
                </ol>
                <div class="media align-items-center mb-headings">
                    <div class="media-body">
                        <h1 class="h2">View Course</h1>
                    </div>
                    @can('admin')
                    @if ($course->status=='inactive')
                        <div class="media-right">
                            <a href="{{route('approve',$course->id)}}" class="btn btn-success" >Approve</a>
                        </div>
                    @else
                        <div class="media-right">
                            <a href="{{route('disapprove',$course->id)}}" class="btn btn-danger" >Disapprove</a>
                        </div>
                    @endif
                    @endcan
                    
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <form action="{{route('courseupdate',$course->id)}}" method="post" id="myform" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic Information</h4>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            @endif
                            <div class="card-body">

                                <div class="form-group">
                                    <label class="form-label"
                                           for="title">Title</label>
                                    <input readonly type="text" id="title" name="title" class="form-control bg-white" placeholder="Write a title" value="{{$course->title}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label"
                                           for="title">Category</label>
                                           <input readonly type="text" name="" id="" class="form-control bg-white" value="{{$course->category}}">
                                </div>
                                <div class="form-group mb-0">
                                    <label class="form-label">Description</label> <br>
                                    <textarea readonly name="description" id="" cols="30" rows="6" class="form-control bg-white">{{$course->description}}</textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="embed-responsive embed-responsive-16by9">
                                <video class="embed-responsive-item"
                                        src="{{asset('uploads/'.$video->path)}}"
                                        allowfullscreen="" controls controlsList="nodownload"></video>
                            </div>
                            <div class="card-body">
                                <label class="form-label">Video</label>
                                <input type="file" name="file" class="form-label"/>
                            </div>
                        </div>
                        <div class="card">
                            
                                <img src="{{asset('Images/'.$course->thumbnail)}}" alt="" style="width: 100%;">
                            
                            <div class="card-body">
                                <label class="form-label">Thumbnail</label>
                                <input type="file" name="thumbnail" class="form-label"/>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div> --}}
 
        <div class="mdk-header-layout__content">

            <div data-push
                 data-responsive-width="992px"
                 class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">

                    <div class="container-fluid page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="student-dashboard.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="student-browse-courses.html">Courses</a></li>
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
                                                        <button type="submit" style="background-color: transparent;border:none;" ><a>{{$video->title}}</a></button>
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
                                                    <button type="submit" style="background-color: transparent;border:none;" ><a>{{$video->title}}</a></button>
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
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p>
                                            @can('admin')
                                            @if ($course->status=='inactive')
                                                <div class="media-right">
                                                    <a href="{{route('approve',$course->id)}}" class="btn btn-success" >Approve</a>
                                                </div>
                                            @else
                                                <div class="media-right">
                                                    <a href="{{route('disapprove',$course->id)}}" class="btn btn-danger" >Disapprove</a>
                                                </div>
                                            @endif
                                            @endcan
                                        </p>
                                       
                                    </div>
                                </div>
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