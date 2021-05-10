@extends('layouts.base2')

@section('title')
    <title> Edit Course</title>
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
                    <li class="breadcrumb-item active">Course Video</li>
                </ol>
                <h1 class="h2">Add Video</h1>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('video.store',$course_id)}}" method="post" enctype="multipart/form-data">
                           @csrf
                            <div class="form-group row">
                                <label for="avatar"
                                       class="col-sm-3 col-form-label form-label">Preview</label>
                                <div class="col-sm-9">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <div class="custom-file"
                                                 style="width: auto;">
                                                <input type="file"
                                                       id="avatar" name="thumbnail"
                                                       class="custom-file-input">
                                                <label for="avatar"
                                                       class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-3 col-form-label form-label">Title</label>
                                <div class="col-md-6">
                                    <input id="title"
                                           type="text" name="title"
                                           class="form-control"
                                           placeholder="Write an awesome title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label form-label">Upload Video</label>
                                <div class="col-sm-9">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <div class="custom-file"
                                                 style="width: auto;">
                                                <input type="file"
                                                       id="avatar" name="file"
                                                       class="custom-file-input">
                                                <label for="avatar"
                                                       class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Video</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 

@endsection