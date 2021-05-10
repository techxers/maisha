@extends('layouts.base2')

@section('title')
    <title> Edit Course</title>
@endsection

@section('content')


    
<div class="mdk-header-layout__content">

    <div data-push
         data-responsive-width="992px"
         class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="instructor-dashboard.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="instructor-courses.html">Courses</a></li>
                    <li class="breadcrumb-item active">Edit course</li>
                </ol>
                <div class="media align-items-center mb-headings">
                    <div class="media-body">
                        <h1 class="h2">Edit Course</h1>
                    </div>
                    <div class="media-right">
                        <input type="submit"class="btn btn-success" form="myform" value="SAVE">
                       
                    </div>
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
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                                @endif
                                <div class="card-body">

                                    <div class="form-group">
                                        <label class="form-label"
                                            for="title">Title</label>
                                        <input type="text" id="title" name="title" class="form-control" placeholder="Write a title" value="{{$course->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label"
                                            for="title">Category</label>
                                        <select name="category" id="" class="custom-control custom-select form-control">
                                            @foreach ($categories as $item)
                                                    <option {{$course->category==$item->name ? 'selected':''}} value="{{$item->name}} ">{{$item->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label"
                                            for="title">Subcategory</label>
                                        <select name="subcategory" id="" class="custom-control custom-select form-control">
                                            @foreach ($subcategories as $item)
                                                    <option {{$course->subcategory==$item->name ? 'selected':''}} value="{{$item->name}} ">{{$item->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label class="form-label">Description</label> <br>
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$course->description}}</textarea>
                                    </div>

                                </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Videos</h4>
                            </div>
                            <div class="card-body">
                                <p><a href="{{route('video.create',$course->id)}}"
                                       class="btn btn-primary">Add Video <i class="material-icons">add</i></a></p>
                                <div class="nestable"
                                     id="nestable-handles-primary">
                                    <ul class="nestable-list">
                                        @forelse ($videos as $video)
                                        <li class="nestable-item nestable-item-handle"data-id="2">
                            
                                             <div class="nestable-content">
                                                <div class="media align-items-center">
                                                    <div class="media-left">
                                                        <img src="{{asset('Images/'.$video->thumbnail)}}"
                                                            alt=""
                                                            width="100"
                                                            class="rounded">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="card-title h6 mb-0">
                                                            <a href="{{route('video.edit',$video->id)}}">{{$video->title}}</a>
                                                        </h5>
                        
                                                    </div>
                                                    <div class="media-right">
                                                        <a href="{{route('video.edit',$video->id)}}"
                                                        class="btn btn-white btn-sm"><i class="material-icons">edit</i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @empty
                                            No video added
                                        @endforelse
                                    </ul>
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
        </div>
 

@endsection