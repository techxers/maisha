@extends('layouts.base2')

@section('title')
    <title> View Quiz</title>
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
                    <li class="breadcrumb-item"><a href="{{route('quizzes')}}">Quiz Manager</a></li>
                    <li class="breadcrumb-item active">View Quiz</li>
                </ol>
                <h1 class="h2">{{$quiz->title}}</h1>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Quiz details</h4>
                    </div>
                    <div class="card-body">
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
                        <form action="{{route('quiz.update',$quiz->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="quiz_title"
                                       class="col-sm-3 col-form-label form-label">Quiz Title:</label>
                                <div class="col-sm-6">
                                    <input id="quiz_title"
                                           type="text" name="title"
                                           class="form-control" 
                                           placeholder="Title"
                                           value="{{$quiz->title}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="course_title"
                                       class="col-sm-3 col-form-label form-label">Course:</label>
                                <div class="col-sm-9 col-md-4">
                                   
                                    <select id="course_title" class="custom-select form-control" name="course_id">
                                        @foreach ($courses as $item)
                                            <option value="{{$item->id}}" {{$quiz->course_id==$item->id ? 'selected': ''}}>{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                
                               
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="quiz_image"
                                       class="col-sm-3 col-form-label form-label">Quiz Image:</label>
                                <div class="col-sm-9 col-md-4">
                                    <p><img src="{{asset('Images/'.$quiz->thumbnail)}}"
                                             alt=""
                                             width="150"
                                             class="rounded"></p>
                                    
                                    <div class="custom-file">
                                        <input type="file" name="thumbnail"
                                               id="quiz_image"
                                               class="custom-file-input">
                                        <label for="quiz_image"
                                               class="custom-file-label">Choose file</label>
                                    </div>
                                   
                                </div>
                            </div>
                            
                            <div class="form-group row mb-0">
                                
                                @cannot('admin')
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit"
                                                class="btn btn-success">Save</button>
                                    </div>
                                @endcannot
                                @can('admin')
                                @if ($quiz->status=='approved')
                                    <div class="col-sm-9 offset-sm-3">
                                        <a href="{{route('quiz.disapprove',$quiz->id)}}" type="submit" class="btn btn-danger">Disapprove</a>
                                    </div>  
                                @else
                                    <div class="col-sm-9 offset-sm-3">
                                         <a href="{{route('quiz.approve',$quiz->id)}}" type="submit" class="btn btn-success">Approve</a>
                                    </div>  
                                
                                @endif
                                
                                @endcan
        
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Questions</h4>
                    </div>
                    <div class="card-header">
                        @cannot('admin')
                            <a href="{{route('question.create',$quiz->id)}}"
                                class="btn btn-outline-secondary">Add Question <i class="material-icons">add</i>
                            </a>
                        @endcannot
                    </div>
                    <div class="nestable"
                         id="nestable">
                        <ul class="list-group list-group-fit nestable-list-plain mb-0">
                            @forelse ($questions as $item)
                            <li class="list-group-item nestable-item">
                                <div class="media align-items-center">
                                    <div class="media-left">
                                        <a href="{{route('question.edit',$item->id)}}"
                                           class="btn btn-default nestable-handle"><i class="material-icons">menu</i></a>
                                    </div>
                                    <div class="media-body">
                                        {{$item->question}}
                                    </div>
                                    <div class="media-right text-right">
                                        <div style="width:100px">
                                            <a href="{{route('question.edit',$item->id)}}"
                                               
                                               class="btn btn-primary btn-sm"><i class="material-icons">edit</i></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @empty
                                <p>No questions created on this quiz</p>
                            @endforelse
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection