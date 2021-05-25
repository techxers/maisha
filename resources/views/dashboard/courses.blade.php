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

            <div class="container">   
                <div class="card card-body border-left-3 border-left-primary navbar-shadow mb-4" style="width:100%;">
                    <form action="{{route('courses')}}" method="GET" id="search">
                        <div class="row">
                        <div class="d-flex flex-wrap2 align-items-center mb-headings">
                            <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="custom-select"
                                       class="form-label">Category</label><br>
                                <select id="custom-select"
                                        class="form-control custom-select"
                                        style="width: 100%;" name="category">
                                        <option value="all">All categories</option>
                                        @foreach ($categories as $item)
                                            <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="custom-select"
                                       class="form-label">Subcategories</label><br>
                                <select id="custom-select"
                                        class="form-control custom-select"
                                        style="width: 100%;" name="subcategory">
                                        <option value="all">All subcategories</option>
                                        @foreach ($subcategories as $item)
                                            <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                            <div class="flex search-form ml-3 mt-2 search-form--light" style="width:100%;">
                                
                                <input type="text"
                                       class="form-control"
                                       placeholder="Search courses"
                                       id="searchSample02" name="value" value="{{$search}}">
                                       <button type="submit" style="background-color: transparent;border:none;"><i class="material-icons">search</i></button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>

              
                <div class="row">
                    
                    @foreach ($courses as $course)
                    <div class="col-lg-3">
                        <div class="card">
                            
                            <a href="{{route('viewcourse',$course->id)}}">
                                <img src="{{asset('Images/'.$course->thumbnail)}}"
                                     alt="Card image cap"
                                     style="width:100%;">
                            </a>
                            <div class="card-body">
                                <small class="text-muted">{{$course->category}}</small><br>
                                <h5 class="card-title mb-0"><a href="{{route('viewcourse',$course->id)}}">{{$course->title}}</a> 
                                 @if ($quizzes->where('course_id',$course->id)->count()>0)
                                 <button  class="btn btn-white btn-sm float-right" title="This course has a quiz"> <i class="material-icons btn__icon--right">help</i> </button></h5>
                                 @endif
                                     
                                
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
                {{$courses->links()}}
            </div>

        </div>
    
      
        
@endsection