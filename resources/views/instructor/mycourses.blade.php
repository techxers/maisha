@extends('layouts.base2')

@section('title')
    <title> Course Manager</title>
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
                    <li class="breadcrumb-item active">Courses</li>
                </ol>

                <div class="d-flex flex-column flex-sm-row flex-wrap mb-headings align-items-start align-items-sm-center">
                    <div class="flex mb-2 mb-sm-0">
                        <h1 class="h2">Manage Courses</h1>
                        <div class="card card-body border-left-3 border-left-primary navbar-shadow mb-4">
                            <form action="{{route('instructors')}}" method="GET" id="search">
                                <div class="d-flex flex-wrap2 align-items-center mb-headings">
                                   
                                    <div class="flex search-form ml-3 search-form--light">
                                        <input type="text"
                                               class="form-control"
                                               placeholder="Search users"
                                               id="searchSample02" name="value" value="{{$search}}">
                                               <button type="submit" style="background-color: transparent;border:none;"><i class="material-icons">search</i></button>
                                      
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                 
                    <a href="{{route('createcourse')}}"
                        class="btn btn-success ml-5">Add course
                    </a>
                    
                </div>     
                @if(session('success'))
                <div class="alert alert-light alert-dismissible border-1 border-left-3 border-left-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="text-black-70">{{session('success')}}</div>
                </div>
                @endif        
                <div class="row">
                    @forelse ($courses as $course)
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">

                                <div class="d-flex flex-column flex-sm-row">
                                    <a href="{{route('editcourse',$course->id)}}"
                                       class="avatar avatar-lg avatar-4by3 mb-3 w-xs-plus-down-100 mr-sm-3">
                                        <img src="{{asset('Images/'.$course->thumbnail)}}"
                                             alt="Card image cap"
                                             class="avatar-img rounded">
                                    </a>
                                    <div class="flex"
                                         style="min-width: 200px;">
                                        <!-- <h5 class="card-title text-base m-0"><a href="instructor-course-edit.html"><strong>Learn Vue.js</strong></a></h5> -->
                                        <h4 class="card-title mb-1"><a href="{{route('editcourse',$course->id)}}"">{{$course->title}}</a></h4>
                                        <p class="text-black-70">{{$course->description}}</p>
                                        <div class="d-flex align-items-end">
                                            <div class="d-flex flex flex-column mr-3">
                                                <div class="d-flex align-items-center py-1 border-bottom">
                                                  
                                                </div>
                                                <div class="d-flex align-items-center py-1">
                                                    {{-- <small class="text-muted mr-2">GULP</small> --}}
                                                    @if($course->status=='active')
                                                        <small class="text-success">Approved </small>
                                                    @else
                                                        <small class="text-danger">Not Approved </small>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                          {{-- //  @can('course',$course) --}}
                            <div class="card__options dropdown right-0 pr-2">
                                <a href="#"
                                   class="dropdown-toggle text-muted"
                                   data-caret="false"
                                   data-toggle="dropdown">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item"
                                       href="{{route('editcourse',$course->id)}}">Edit course</a>
                            
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger"
                                       href="{{route('coursedelete',$course->id)}}">Delete course</a>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    @empty
                    <p>No courses added</p>
                    @endforelse
                </div>

                <!-- Pagination -->
               
            </div>
        </div>
@endsection