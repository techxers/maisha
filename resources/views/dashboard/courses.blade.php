@extends('layouts.base')

@section('title')
    <title> Courses</title>
@endsection

@section('content')
 
<div class="mdk-header-layout__content">
    <div data-push
         data-responsive-width="992px"
         class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="student-dashboard.html">Home</a></li>
                    <li class="breadcrumb-item active">Courses</li>
                </ol>
                <h1 class="h2">Courses</h1>
                <div class="row">
                    @foreach ($courses as $course)
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4 class="card-title mb-0"><a href="{{route('viewcourse',$course->id)}}">{{$course->title}}</a></h4>
                            </div>
                            <a href="{{route('viewcourse',$course->id)}}">
                                <img src="{{asset('Images/'.$course->thumbnail)}}"
                                     alt="Card image cap"
                                     style="width:100%;height:50%;">
                            </a>
                            <div class="card-body">
                                <small class="text-muted">{{$course->category}}</small><br>
                                {{$course->description}}<br>
                              
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>

        </div>
    
      
        
@endsection