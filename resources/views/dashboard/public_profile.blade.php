@extends('layouts.base')

@section('title')
    <title> Trainee View Profile</title>
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
                    <li class="breadcrumb-item active"> Profile</li>
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
                    <a href="#"><img src="{{$user->photo==null ? asset('Images/default.png') : asset('Images/'.$user->photo)}} "
                             alt=""
                             class="rounded-circle"></a>
                    <h1 class="h2 mb-0 mt-1">{{$user->name}}</h1>
                     <p class="lead text-muted mb-0">Joined since {{$user->created_at}}</p>
                    {{--<p><a href="{{route('certificate',$user->id)}}" style="text-decoration: none;"> <i class="material-icons text-black mr-0">arrow_downward</i> Download Cerfificate</a></p> --}}
                    <div class="badge badge-primary ">Trainee</div>
                    {{-- <hr> --}}
               
                </div>
                <hr>
                <h4>{{$user->views->count()}} Videos watched by {{$user->name}}</h4>
                {{-- <div class="card-columns">
                    @forelse ($user->views as $view)
                    <div class="card">
                        <div class="card-header">
                            <div class="media align-items-center">
                                <div class="media-left">
                                    <a href="{{route('editcourse',$view->id)}}">
                                        <img src="{{asset('Images/'.$course->thumbnail)}}"
                                             alt="Card image cap"
                                             width="100"
                                             class="rounded">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="card-title mb-0"><a href="{{route('editcourse',$course->id)}}">{{$course->title}}</a></h4>
                                   <small>{{$course->category}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        User had not added any course
                    @endforelse
                </div> --}}
            </div>

        </div>
@endsection