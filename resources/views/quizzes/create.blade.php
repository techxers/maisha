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
                    <li class="breadcrumb-item"><a href="{{route('quizzes')}}">Quiz Manager</a></li>
                    <li class="breadcrumb-item active">Add Quiz</li>
                </ol>
                <h1 class="h2">Add Quiz</h1>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Quiz</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('quiz.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="quiz_title"
                                       class="col-sm-3 col-form-label form-label">Quiz Title:</label>
                                <div class="col-sm-6">
                                    <input id="quiz_title" name="title"
                                           type="text"
                                           class="form-control"
                                           placeholder="Title"
                                           value="{{old('title')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="course_title"
                                       class="col-sm-3 col-form-label form-label">Course:</label>
                                <div class="col-sm-9 col-md-4">
                                    <select id="course_title" name="course_id"
                                            class="custom-select form-control">
                                            @foreach ($courses as $item)
                                                <option value="{{$item->id}}">{{$item->title}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="quiz_image"
                                       class="col-sm-3 col-form-label form-label">Quiz Image:</label>
                                <div class="col-sm-9 col-md-4">
                                  
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
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit"
                                            class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
               
            </div>

        </div>

@endsection