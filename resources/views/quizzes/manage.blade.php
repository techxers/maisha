@extends('layouts.base2')

@section('title')
    <title> Quiz Manager</title>
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
                    <li class="breadcrumb-item active">Quizzes</li>
                </ol>

                <div class="media align-items-center mb-headings">
                    <div class="media-body">
                        <h1 class="h2">Quizzes</h1>
                    </div>
                </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                    @endif
                <div class="card-columns">
                    
                    @forelse ($quizzes as $item)
                    <div class="card card-sm">
                        <div class="card-body media">
                            <div class="media-left">
                                <a href="{{route('quiz.edit',$item->id)}}"
                                   class="avatar avatar-lg avatar-4by3">
                                    <img src="{{asset('Images/'.$item->thumbnail)}}"
                                         alt="Card image cap"
                                         class="avatar-img rounded">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="card-title mb-0"><a href="{{route('quiz.edit',$item->id)}}">{{$item->title}}</a></h4>
                                <small class="text-muted">
                                    {{$questions->where('quiz_id',$item->id)->count()}} Questions
                                </small>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{route('quiz.edit',$item->id)}}"
                               class="btn btn-default btn-sm float-left"><i class="material-icons btn__icon--left">edit</i> View </a>
                            @if ($item->status=='approved')
                                <div class="clearfix text-success">
                                    Approved
                                </div>
                            @else
                                <div class="clearfix text-danger">
                                    Unapproved
                                </div>
                            @endif
                               
                        </div>
                    </div>
                    @empty
                        No recent quizzes added
                    @endforelse
                </div>
            </div>
        </div>

@endsection