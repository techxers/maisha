@extends('layouts.base')

@section('title')
    <title> Ask Question</title>
@endsection

@section('content')
<div class="mdk-header-layout__content">

    <div data-push
         data-responsive-width="992px"
         class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container page__container">
                <div class="row m-0">
                    <div class="col-lg container page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('forums')}}">Forum</a></li>
                            <li class="breadcrumb-item active">Ask Question</li>
                        </ol>
                        <h1 class="h2">Ask Question</h1>

                        <form action="{{route('forum.store')}}" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group m-0"
                                         role="group"
                                         aria-labelledby="label-question">
                                        <div class="form-row align-items-center">
                                            <label id="label-question"
                                                   for="question"
                                                   class="col-md-3 col-form-label form-label">Question title</label>
                                            <div class="col-md-9">
                                                <input id="question" name="title"
                                                       type="text" 
                                                       placeholder="Your question ..."
                                                       
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="form-group m-0"
                                     role="group"
                                     aria-labelledby="label-topic">
                                    <div class="form-row align-items-center">
                                        <label id="label-topic"
                                               for="topic"
                                               class="col-md-3 col-form-label form-label">Course</label>
                                        <div class="col-md-6">
                                            <select id="topic" name="course_id"
                                                    class="form-control" >
                                                <option value="0">General</option>
                                                @foreach ($courses as $item)
                                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="list-group list-group-fit">
                                    <div class="list-group-item">
                                        <div role="group"
                                             aria-labelledby="label-question"
                                             class="m-0 form-group">
                                            <div class="form-row">
                                                <label id="label-question"
                                                       for="question"
                                                       class="col-md-3 col-form-label form-label">Question details</label>
                                                <div class="col-md-9">
                                                    <textarea id="question" name="description"
                                                              placeholder="Describe your question in detail ..."
                                                              rows="4"
                                                              class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                  
                                    <div class="list-group-item">
                                        <button type="submit"
                                                class="btn btn-success">Post Question</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div id="page-nav"
                         class="col-lg-auto page-nav">
                        <div data-perfect-scrollbar
                             data-perfect-scrollbar-wheel-propagation="true">
                            <div class="page-section pt-lg-32pt">
                                <div class="nav page-nav__menu">
                                    <a href="javascript:void(0)"
                                       class="nav-link active">Before you post</a>
                                </div>
                                <div class="page-nav__content">
                                    <p class="text-black-70">Make sure you select the specific course your course is related to.</p>
                                    <p class="text-black-70">If your question is not related to any course then select general.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection