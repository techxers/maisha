@extends('layouts.base2')

@section('title')
    <title> View Question</title>
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
                    <li class="breadcrumb-item"><a href="{{route('forums')}}">Forum</a></li>
                    <li class="breadcrumb-item active">View </li>
                </ol>

                <div class="row">
                    <div class="col-md-8">

                        <h1 class="h2 mb-2">{{$forum->title}}</h1>
                        <p class="text-muted d-flex align-items-center mb-4">
                            <a href="{{route('forums')}}"
                               class="mr-3">Back</a>
                      

                        </p>

                        <div class="card card-body">
                            <div class="d-flex">
                                <a href="#"
                                   class="avatar avatar-online mr-3">
                                    {{-- <img src="assets/images/256_rsz_nicolas-horn-689011-unsplash.jpg"
                                         alt="people"
                                         class="avatar-img rounded-circle"> --}}
                                </a>
                                <div class="flex">
                                    <p class="d-flex align-items-center mb-2">
                                        <a href="student-profile.html"
                                           class="text-body mr-2"><strong>{{$user->name}}</strong></a>
                                        <small class="text-muted">{{$forum->created_at->diffForHumans()}}</small>
                                    </p>
                                    <p>{{$forum->description}}</p>
                                    
            
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            {{-- <a href="instructor-profile.html"
                               class="avatar mr-3">
                                <img src="assets/images/people/50/guy-6.jpg"
                                     alt="people"
                                     class="avatar-img rounded-circle">
                            </a> --}}
                            <div class="flex">
                                <form action="{{route('reply.store',$forum->id)}}" method="post">
                                @csrf
                                
                                    <div class="form-group">
                                    <label for="comment"
                                           class="form-label">Your reply</label>
                                           @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                                @endif
                                @if($errors->count()>0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $item)
                                        <li>{{$item}}</li>
                                    @endforeach
                                </div>
                                @endif
                                    <textarea class="form-control"
                                              name="reply"
                                              id="comment"
                                              rows="3"
                                              placeholder="Type here to reply to {{$user->name}} ..."></textarea>
                                </div>
                                <button class="btn btn-success" type="submit">Reply</button>
                            </form>
                            </div>
                        </div>
                        
                        <div class="pt-3">
                            <h4> {{$replies->count().' Replies'}}</h4>
                            {{-- <div class="d-flex mb-3">
                                <a href="student-profile.html"
                                   class="avatar avatar-xs mr-3">
                                    <img src="assets/images/256_rsz_karl-s-973833-unsplash.jpg"
                                         alt="people"
                                         class="avatar-img rounded-circle">
                                </a> --}}
                                {{-- <div class="flex">
                                    <a href="student-profile.html"
                                       class="text-body"><strong>Joseph S. Ferland</strong></a>
                                    <span class="text-black-70">How can I load Charts on a page?</span><br>
                                    <span class="text-black-50">on <a href="student-take-course.html"
                                           class="text-black-50"
                                           style="text-decoration: underline;">Data Visualization With Chart.js</a></span><br>
                                    <div class="d-flex align-items-center">
                                        <small class="text-black-50 mr-2">27 min ago</small>
                                        <a href="#"
                                           class="text-black-50"><small>Liked</small></a>
                                    </div>
                                </div>
                            </div> --}}
                            @forelse ($replies as $item)
                            @foreach ($users as $instructor)
                            @if ($item->user_id==$instructor->id)
                            <div class="d-flex ml-sm-32pt mt-3 border rounded p-3 bg-light mb-3">
                                {{-- <a href="#"
                                   class="avatar avatar-xs mr-3">
                                    <img src="assets/images/people/110/guy-6.jpg"
                                         alt="Guy"
                                         class="avatar-img rounded-circle">
                                </a> --}}
                                <div class="flex">
                                    <div class="d-flex align-items-center">
                                        <a href="student-profile.html"
                                           class="text-body"><strong>{{$instructor->id==Auth::user()->id?'You':$instructor->name}}</strong></a>
                                        <small class="ml-auto text-muted">{{$item->created_at->diffForHumans()}}</small>
                                    </div>
                                    <p class="mt-1 mb-0 text-black-70">{{$item->reply}}</p>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            @empty
                                <p class="m-3 text-black-70">No replies for this question</p>
                            @endforelse
                           
                        </div>
                    </div>
                    <div class="col-md-4">

                        <h4>About Replies</h4>
                        <p class="text-black-70">{{$user->name.' will be notified once you reply'}}.</p>

                        <div class="mb-4">
                            @forelse ($instructors as $item)
                            <div class="d-flex align-items-center mb-2">
                                <a href="student-profile.html"
                                   class="avatar avatar-sm mr-3">
                                    {{-- <img src="assets/images/people/50/guy-1.jpg"
                                         alt=""
                                         class="avatar-img rounded-circle"> --}}
                                </a>
                                <a href="student-profile.html"
                                   class="flex mr-2 text-body"><strong>No of Replies:</strong></a>
                                <span class="text-black-70 mr-2">{{$replies->count()}} Replies</span>
                                <i class="text-muted material-icons font-size-16pt">opacity</i>
                            </div>
                            @empty
                                <p class="mt-1 mb-0 text-black-70">No replies to this question</p>
                            @endforelse

                        </div>

                    </div>
                </div>
            </div>

        </div>
@endsection