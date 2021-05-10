@extends('layouts.base2')

@section('title')
    <title> Users</title>
@endsection

@section('content')
<div class="mdk-header-layout__content">

    <div data-push
         data-responsive-width="992px"
         class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container p-0">
                <div class="row m-0">
                    <div class="col-lg container-fluid page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="student-dashboard.html">Home</a></li>
                            <li class="breadcrumb-item active">Instructor's User Account</li>
                        </ol>

                        <h1 class="h2">User Accounts</h1>
                        <div class="card card-body border-left-3 border-left-primary navbar-shadow mb-4">
                            <form action="{{route('instructors')}}" method="GET" id="search">
                                <div class="d-flex flex-wrap2 align-items-center mb-headings">
                                   
                                    <div class="flex search-form ml-3 search-form--light">
                                        <input type="text"
                                               class="form-control"
                                               placeholder="Search users"
                                               id="searchSample02" name="value" value="{{$search}}">
                                               <button type="submit" style="background-color: transparent;border:none;"><i class="material-icons">search</i></button>
                                      
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row card-group-row mb-40pt">
                            @foreach ($users as $user)
                            <div class="col-lg-4 col-sm-4 card-group-row__col">

                                <div class="card card-group-row__card text-center o-hidden">

                                    <div class="card-body d-flex flex-column">
                                        <div class="flex-grow-1 mb-16pt">
                                            <span class="w-64 h-64 icon-holder icon-holder--outline-secondary rounded-circle d-inline-flex mb-16pt">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <h4 class="mb-8pt">{{$user->name}}</h4>
                                            <p class="text-black-70">{{$user->qualification}}</p>
                                        </div>
                                        <p class="d-flex justify-content-center align-items-center m-0">
                                            <span class="h4 m-0 font-weight-normal"></span>
                                            <span class="h1 m-0 font-weight-normal"></span>
                                            <span class="h4 m-0 font-weight-normal"> {{$user->status}}</span>
                                        </p>
                                     
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{route('show.instructors',$user->id)}}"
                                           class="btn btn-success">View Profile</a>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                          {{$users->links()}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    
@endsection