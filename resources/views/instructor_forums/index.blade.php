@extends('layouts.base2')

@section('title')
    <title> Forum</title>
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
                    <li class="breadcrumb-item active">Forum</li>
                </ol>

                <div class="row">
                    <div class="col-md-8">

                       

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $item)
                                    <li>{{$error}}</li>
                                @endforeach
                            </div>
                        @endif
                        <div class="flex search-form form-control-rounded search-form--light mb-2"
                        style="min-width: 200px;">
                       

                   </div>
                        <div class="card">
                            <div class="card-header">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h4 class="card-title">General Questions</h4>
                                        <p class="card-subtitle">General Questions on the forum.</p>
                                    </div>
                                </div>
                            </div>

                            <ul class="list-group list-group-fit">
                                @forelse($general as $forum)
                                @foreach ($trainees as $item)
                                @if($forum->user_id==$item->id)
                                <li class="list-group-item forum-thread">
                                    <div class="media align-items-center">
                                        <div class="media-left">
                                            <div class="forum-icon-wrapper">
                                                <a href="{{route('forum.show',$forum->id)}}"
                                                   class="forum-thread-icon">
                                                    <i class="material-icons">description</i>
                                                </a>
                                                <a href="{{route('profile.show',$forum->user->id)}}"
                                                   class="forum-thread-user">
                                                    <img src="{{$forum->user->photo==null ? asset('Images/default.png') : asset('Images/'.$forum->user->photo) }}"
                                                         alt=""
                                                         width="20"
                                                         class="rounded-circle">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="d-flex align-items-center">
                                                <a href=" {{route('profile.show',$forum->user->id)}}"
                                                   class="text-body"><strong>{{$item->name}}</strong></a>
                                                <small class="ml-auto text-muted">{{$forum->created_at->diffForHumans()}}</small>
                                            </div>
                                            <a class="text-black-70"
                                               href="{{route('forum.show',$forum->id)}}">{{$forum->title}}</a>
                                        </div>
                                    </div>
                                </li>
                                @endif
                                @endforeach
                                @empty
                                <p class="text-black-70 m-3">There are no recent general questions on the Forum</p>
                                @endforelse
                                {{$general->links()}}
                            </ul>
                        </div>
                        @cannot('admin')
                        <div class="card">
                            <div class="card-header">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h4 class="card-title">Your Questions</h4>
                                        <p class="card-subtitle">Latest questions related to your course.</p>
                                    </div>
                                </div>
                            </div>

                            <ul class="list-group list-group-fit">
                                @forelse ($forums as $item)
                                @foreach ($courses as $course)
                                @if ($item->course_id==$course->id && Auth::user()->id==$course->user_id)
                                <li class="list-group-item forum-thread">
                                    <div class="media align-items-center">
                                        <div class="media-left">
                                            <div class="forum-icon-wrapper">
                                                <a href="{{route('profile.show',$forum->user->id)}}"
                                                   class="forum-thread-icon">
                                                    <i class="material-icons">description</i>
                                                </a>
                                                <a href="{{route('profile.show',$forum->user->id)}}"
                                                   class="forum-thread-user">
                                                    <img src="{{$item->user->photo==null ? asset('Images/default.png') : asset('Images/'.$item->user->photo) }}"
                                                         alt=""
                                                         width="20"
                                                         class="rounded-circle">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="d-flex align-items-center">
                                                <a href="{{route('forum.show',$item->id)}}"
                                                   class="text-body"><strong>{{$item->course_id==0 ? 'General' : $course->title}}</strong></a>
                                                <small class="ml-auto text-muted">{{$item->created_at->diffForHumans()}}</small>
                                            </div>
                                            <a class="text-black-70"
                                               href="{{route('forum.show',$item->id)}}">{{$item->title}}</a>
                                        </div>
                                    </div>
                                </li>
                                @endif
                                @endforeach
                                @empty
                                  <p class="text-black-70 m-3">  You have not been asked any questions</p>
                                @endforelse
                               {{$forums->links()}}
                            </ul>
                        </div>
                        @endcannot
                        @can('admin')
                        <div class="card">
                            <div class="card-header">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h4 class="card-title">Course Questions</h4>
                                        <p class="card-subtitle">Latest questions related to courses.</p>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group list-group-fit">
                                @forelse ($forums as $item)
                                @foreach ($courses as $course)
                                @if ($item->course_id==$course->id)
                                <li class="list-group-item forum-thread">
                                    <div class="media align-items-center">
                                        <div class="media-left">
                                            <div class="forum-icon-wrapper">
                                                <a href="{{route('forum.show',$item->id)}}"
                                                   class="forum-thread-icon">
                                                    <i class="material-icons">description</i>
                                                </a>
                                                <a href="{{route('profile.show',$forum->user->id)}}"
                                                   class="forum-thread-user">
                                                    <img src="{{$item->user->photo==null ? asset('Images/default.png') : asset('Images/'.$item->user->photo) }}"
                                                         alt=""
                                                         width="20"
                                                         class="rounded-circle">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="d-flex align-items-center">
                                                <a href="{{route('forum.show',$item->id)}}"
                                                   class="text-body"><strong>{{$item->course_id==0 ? 'General' : $course->title}}</strong></a>
                                                <small class="ml-auto text-muted">{{$item->created_at->diffForHumans()}}</small>
                                            </div>
                                            <a class="text-black-70"
                                               href="{{route('forum.show',$item->id)}}">{{$item->title}}</a>
                                        </div>
                                    </div>
                                </li>
                                @endif
                                @endforeach
                                @empty
                                  <p class="text-black-70 m-3">  You have not asked any questions</p>
                                @endforelse
                               {{$forums->links()}}
                            </ul>
                        </div>
                        @endcan
                    </div>
                    <div class="col-md-4">

                        <h4>About Forum Questions</h4>
                        <p class="text-black-70">General questions do not relate to any of your course by you are free to answer them.</p>
                        <p class="text-black-70">Your questions are those related to your courses and you are expected to answer them.</p>

                    </div>
                </div>
            </div>

        </div>
@endsection