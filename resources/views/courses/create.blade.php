@extends('layouts.base2')

@section('title')
    <title> Add Course</title>
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
                <h1 class="h2">Add Course</h1>
                    <div class="card">
                        <div class="card-body">
                            @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </div>
                            @endif
                            <form action="{{route('addcourse')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="avatar"
                                        class="col-sm-3 col-form-label form-label">Title
                                    </label>
                                    <div class="col-sm-6">
                                        <input id="title" name="title" type="text"  class="form-control" placeholder="Course Title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="title"
                                        class="col-md-3 col-form-label form-label">Description</label>
                                    <div class="col-md-6">
                                        <input id="title" type="text" name="description" class="form-control" placeholder="Write a description">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="course"
                                        class="col-md-3 col-form-label form-label">Category</label>
                                    <div class="col-md-4">
                                        <select id="course" name="category" class="custom-control custom-select form-control">
                                            @foreach ($categories as $item)
                                                <option value="{{$item->name}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="avatar"
                                        class="col-sm-3 col-form-label form-label">Video Thumbnail</label>
                                    <div class="col-sm-9">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <div class="custom-file"
                                                    style="width: auto;margin-left:-7px;">
                                                    <input type="file" name="thumbnail"
                                                        id="avatar"
                                                        class="custom-file-input">
                                                    <label for="avatar"
                                                        class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="avatar"
                                        class="col-sm-3 col-form-label form-label">Upload a video</label>
                                    <div class="col-sm-9">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <div class="custom-file"
                                                    style="width: auto;margin-left:-7px;">
                                                    <input type="file" name="file"
                                                        id="avatar"
                                                        class="custom-file-input">
                                                    <label for="avatar"
                                                        class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Add Course</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>

@endsection