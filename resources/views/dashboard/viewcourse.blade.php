@extends('layouts.base')

@section('title')
    <title> View Course</title>
@endsection

@section('content')
<div class="mdk-header-layout__content">
    <div data-push
         data-responsive-width="992px"
         class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="h2">{{$course->title}}</h1>
                        <div class="card">
                            <div class="embed-responsive embed-responsive-16by9">
                                <video id="movie" class="embed-responsive-item"
                                        src="{{asset('uploads/'.$course->path)}}"
                                        allowfullscreen="" controls controlsList="nodownload"></video>
                            </div>
                            {{-- <script>

                                document.getElementById("movie").addEventListener("ended", function(){alert("all done")}, true);
                    
                                </script> --}}
                            <div class="card-body">
                                <h2>{{$course->category}}</h2>
                                {{$course->description}}
                            </div>
                        </div>
                    </div>
              
                </div>
            </div>

        </div>
   

@endsection