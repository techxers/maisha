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
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Courses</li>
                </ol>
                <h1 class="h2">Courses</h1>
                <div class="card card-body border-left-3 border-left-primary navbar-shadow mb-4">
                    <form action="{{route('courses')}}" method="GET" id="search">
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
                                     style="width:100%;">
                            </a>
                            <div class="card-body">
                                <small class="text-muted">{{$course->category}}</small><br>
                                {{$course->description}}<br>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                {{$courses->links()}}
            </div>

        </div>
    
      
        
@endsection