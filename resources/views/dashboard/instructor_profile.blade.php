@extends('layouts.base')

@section('title')
    <title> View Instructor Profile</title>
@endsection
@section('content')
<div class="mdk-header-layout__content">

    <div data-push
         data-responsive-width="992px"
         class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Instructor Profile</li>
                </ol>
                @if(session('success'))
                <div class="alert alert-light alert-dismissible border-1 border-left-3 border-left-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="text-black-70">{{session('success')}}</div>
                </div>
                @endif
                <div class="text-center">
                    <a href="#"><img src="assets/images/people/110/guy-8.jpg"
                             alt=""
                             class="rounded-circle"></a>
                    <h1 class="h2 mb-0 mt-1">{{$user->name}}</h1>
                    <p class="lead text-muted mb-0">{{$user->qualification}}</p>
                   @can('admin') <p><a href="{{route('certificate',$user->id)}}" style="text-decoration: none;"> <i class="material-icons text-black mr-0">arrow_downward</i> Download Cerfificate</a></p>@endcan
                    <div class="badge badge-primary ">{{$user->role_id==0 ?'ADMIN' : 'INSTRUCTOR'}}</div>
                    @can('admin')
                    <hr>
                        <h5 class="text-muted mb-1">Account Status</h5>
                        @if($user->status=='active')
                            <div class="rating">
                                <i class="material-icons text-success md-18 mr-2">lens</i>Active  <a href="{{route('deactivate',$user->id)}}" class="btn btn-danger ml-2">Deactivate</a>
                            </div>
                        @else
                            <div class="rating">
                                <i class="material-icons text-danger md-18 mr-2">lens</i>Inactive <a href="{{route('activate',$user->id)}}" class="btn btn-success ml-2">Activate</a>
                            </div>
                        @endif
                    @endcan
                   
                </div>
                <hr>
                <h4>{{$user->courses->count()}} Course(s) by {{$user->name}}</h4>
                <div class="card-columns">
                    @forelse ($user->courses as $course)
                    <div class="card">
                        <div class="card-header">
                            <div class="media align-items-center">
                                <div class="media-left">
                                    <a href="{{route('viewcourse',$course->id)}}">
                                        <img src="{{asset('Images/'.$course->thumbnail)}}"
                                             alt="Card image cap"
                                             width="100"
                                             class="rounded">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="card-title mb-0"><a href="{{route('viewcourse',$course->id)}}">{{$course->title}}</a></h4>
                                   <small>{{$course->category}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        User had not added any course
                    @endforelse
                </div>
            </div>

        </div>
@endsection