@extends('layouts.base')

@section('title')
    <title> Take Quiz</title>
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
                    <li class="breadcrumb-item active">Quiz</li>
                </ol>
                <div class="card-group">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="mb-0"><strong>{{$all->count()}}</strong></h4>
                            <small class="text-muted-light">TOTAL</small>
                        </div>
                    </div>
                    {{-- <div class="card">
                        <div class="card-body text-center">
                            <h4 class="text-success mb-0"><strong>{{$results->where('result','correct')->count()}}</strong></h4>
                            <small class="text-muted-light">CORRECT</small>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="text-danger mb-0"><strong>{{$results->where('result','incorrect')->count()}}</strong></h4>
                            <small class="text-muted-light">WRONG</small>
                        </div>
                    </div> --}}
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="text-primary mb-0"><strong>{{$questions->count()}}</strong></h4>
                            <small class="text-muted-light">LEFT</small>
                        </div>
                    </div>
                </div>
                <form action="{{route('myquiz.store',$first->id)}}" method="post">
                <div class="card">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <div class="media-left">
                                <h4 class="mb-0"><strong>{{$number}}</strong></h4>
                            </div>
                            <div class="media-body">
                                <h4 class="card-title">
                                    {{$first->question}}
                                </h4>
                            </div>
                        </div>
                    </div>
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input id="customCheck01" name="choice" value="first"
                                       type="radio"
                                       class="custom-control-input">
                                <label for="customCheck01"
                                       class="custom-control-label">{{$first->first}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input id="customCheck02" name="choice" value="second"
                                       type="radio"
                                       class="custom-control-input">
                                <label for="customCheck02"
                                       class="custom-control-label">{{$first->second}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input id="customCheck03" name="choice" value="third"
                                       type="radio"
                                       class="custom-control-input">
                                <label for="customCheck03"
                                       class="custom-control-label">{{$first->third}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input id="customCheck04" name="choice" value="fourth"
                                       type="radio"
                                       class="custom-control-input">
                                <label for="customCheck04"
                                       class="custom-control-label">{{$first->fourth}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        
                        <button
                           class="btn btn-success float-right">Submit <i class="material-icons btn__icon--right">send</i></button>
                    </div>
                </div>
                </form>
            </div>

        </div>

        <div class="mdk-drawer js-mdk-drawer"
             data-align="end">
            <div class="mdk-drawer__content ">
                <div class="sidebar sidebar-right sidebar-light bg-white o-hidden"
                     data-perfect-scrollbar>
                    <div class="sidebar-p-y">
                    

                        <div class="sidebar-heading">Pending Questions</div>
                        <ul class="list-group list-group-fit">
                            @forelse ($questions as $question)
                            <li class="list-group-item {{$first->id==$question->id ? 'active' :'' }}">
                                <a href="#">
                                    <span class="media align-items-center">
                                        <span class="media-left">
                                            <span class="btn btn-white btn-circle">{{$number++}}</span>
                                        </span>
                                        <span class="media-body">
                                            {{$question->question}}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            @empty
                                
                            @endforelse
                            
                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
@endsection