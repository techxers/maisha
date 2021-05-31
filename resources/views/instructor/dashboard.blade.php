@extends('layouts.base2')

@section('title')
    <title> Dashboard</title>
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
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <h1 class="h2">Dashboard</h1>
                <div class="row">
                    <div class="col-lg-6">
                        @if(Auth::user()->role_id==2)
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <div class="flex">
                                    <h4 class="card-title">Course Views</h4>
                                    <p class="card-subtitle">Views for my courses</p>
                                </div>
                            </div>
                            <div data-toggle="lists"
                                 data-lists-values='[
                                    "js-lists-values-course", 
                                    "js-lists-values-document",
                                    "js-lists-values-amount",
                                    "js-lists-values-date"
                                    ]'
                                 data-lists-sort-by="js-lists-values-date"
                                 data-lists-sort-desc="true"
                                 class="table-responsive">
                                <table class="table table-nowrap m-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th style="margin-right: -10px;">Courses</th>
                                            <th style="margin-right: -10px;">Views</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @forelse ($ins_courses as $item)
                                            <tr>
                                                <td>
                                                    <div class="media align-items-center">
                                                        <a href="{{route('editcourse',$item->id)}}"
                                                        class="avatar avatar-4by3 avatar-sm mr-3">
                                                            <img src="{{asset('Images/'.$item->thumbnail)}}"
                                                                alt="course"
                                                                class="avatar-img rounded">
                                                        </a>
                                                        <div class="media-body">
                                                            <a class="text-body js-lists-values-course"
                                                            href="{{route('editcourse',$item->id)}}"><strong>{{$item->title}}</strong></a><br>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="text-center">
                                                    <small class="text-black text-uppercase js-lists-values-date">{{$myviews->where('course_id',$item->id)->count()}}</small>
                                                </td>
                                            </tr>
                                            @empty
                                                <td>No courses to show</td>
                                            @endforelse
                                    </tbody>
                                </table>
                                {{$ins_courses->links()}}
                            </div>
                        </div>
                       
                        @else
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <div class="flex">
                                    <h4 class="card-title">Courses</h4>
                                    <p class="card-subtitle">Top 5 Courses</p>
                                </div>
                            </div>
                            <div data-toggle="lists"
                                 data-lists-values='[
                                    "js-lists-values-course", 
                                    "js-lists-values-document",
                                    "js-lists-values-amount",
                                    "js-lists-values-date"
                                    ]'
                                 data-lists-sort-by="js-lists-values-date"
                                 data-lists-sort-desc="true"
                                 class="table-responsive">
                                <table class="table table-nowrap m-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th style="margin-right: -10px;">Course</th>
                                            <th>Number of Views</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach ($ins_courses->take(5) as $item)
                                            <tr>
                                                <td>
                                                    <div class="media align-items-center">
                                                        <a href="{{route('editcourse',$item->id)}}"
                                                        class="avatar avatar-4by3 avatar-sm mr-3">
                                                            <img src="{{asset('Images/'.$item->thumbnail)}}"
                                                                alt="course"
                                                                class="avatar-img rounded">
                                                        </a>
                                                        <div class="media-body">
                                                            <a class="text-body js-lists-values-course"
                                                            href="{{route('editcourse',$item->id)}}"><strong>{{$item->title}}</strong></a><br>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <small class="text-uppercase js-lists-values-date mr-5">{{$item->views->count()}}</small>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                        
                        @endif
                    </div>
                    @if (Auth::user()->role_id==2)
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <div class="flex">
                                    <h4 class="card-title">My Quizzes</h4>
                                </div>
                                <a class="btn btn-sm btn-primary"
                                   >Attempts</a>
                            </div>
                            <ul class="list-group list-group-fit mb-0">
                                @forelse ($attempts as $item=>$attempt)
                                @foreach ($quizzes as $quiz)
                                @if($quiz->id==$attempt)
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <a href="{{route('quiz.edit',$quiz->id)}}"
                                            class="text-body"><strong>{{$quiz->title}}</strong></a>
                                        </div>
                                        <div class="media-right">
                                            <div class="text-center">
                                                <span class="badge badge-pill badge-primary">{{$allquizzes->where('quiz_id',$attempt)->count()}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endif
                                @endforeach
                                 
                                @empty
                                <li class="list-group-item">No quizzes to show</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    @else
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <div class="flex">
                                    <h4 class="card-title">Forum</h4>
                                    <p class="card-subtitle">Latest Questions</p>
                                </div>
                            </div>
                            <div class="card-body">
                                @forelse ($forums->take(4) as $item)
                                <div class="media">
                                    <div class="media-left">
                                        <a href="{{route('profile.show',$item->user->id)}}"
                                           class="avatar avatar-sm">
                                            <img src="{{$item->user->photo!=null ? asset('Images/'.$item->user->photo) :  asset('Images/default.png')}}"
                                                 alt="Guy"
                                                 class="avatar-img rounded-circle">
                                        </a>
                                    </div>
                                    <div class="media-body d-flex flex-column">
                                        <div class="d-flex align-items-center">
                                            <a href="{{route('profile.show',$item->user->id)}}"
                                               class="text-body"><strong>{{$item->user->name}}</strong></a>
                                            <small class="ml-auto text-muted">{{$item->created_at->diffForHumans()}}</small><br>
                                        </div>
                                        <span class="text-muted">on <a href="{{route('forum.show',$item->id)}}"
                                               class="text-black-50"
                                               style="text-decoration: underline;">{{$item->title}}</a></span>
                                        <p class="mt-1 mb-0 text-black-70">{{$item->description}}</p>
                                    </div>
                                </div>
                                @empty
                                    
                                @endforelse
                               
                            </div>
                        </div>
                    </div>
                    @endif
                    
                </div>
            </div>

        </div>



@endsection