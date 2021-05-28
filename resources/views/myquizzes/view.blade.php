@extends('layouts.base')

@section('title')
    <title> View Quiz</title>
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
                    <li class="breadcrumb-item"><a href="{{route('quizresults')}}">Quiz Results</a></li>
                    <li class="breadcrumb-item active">View Quiz Results</li>
                </ol>
                <div class="media mb-headings align-items-center">
                    <div class="media-left">
                        <img src="{{asset('Images/'.$quiz->thumbnail)}}"
                             alt=""
                             width="80"
                             class="rounded">
                    </div>
                    <div class="media-body">
                        <h1 class="h2">{{$quiz->title}}</h1>
                        <p class="text-muted">submited on {{$results->last()->created_at}}</p>
                    </div>
                </div>
                <div class="card">
                    
                    <div class="card-header">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        <h4 class="card-title">Result</h4>
                    </div>
                    <div class="card-body media align-items-center">
                        <div class="media-body ">
                            @if ($results->where('result','correct')->count()/$results->count()*100>=70)
                            <h4 class="mb-0 text-success">{{round($results->where('result','correct')->count()/$results->count()*100)}}%</h4>
                            <span class="text-muted-light">Great</span>
                            @elseif($results->where('result','correct')->count()/$results->count()*100<70 && $results->where('result','correct')->count()/$results->count()*100>=50)
                                <h4 class="mb-0 text-warning">{{round($results->where('result','correct')->count()/$results->count()*100)}}%</h4>
                                <span class="text-muted-light">Good</span>
                            @elseif($results->where('result','correct')->count()/$results->count()*100<50 && $results->where('result','correct')->count()/$results->count()*100>=30)
                                <h4 class="mb-0 text-primary">{{round($results->where('result','correct')->count()/$results->count()*100)}}%</h4>
                                <span class="text-muted-light">Fair</span>
                            @elseif($results->where('result','correct')->count()/$results->count()*100<30)
                                <h4 class="mb-0 text-danger">{{round($results->where('result','correct')->count()/$results->count()*100)}}%</h4>
                                <span class="text-muted-light">Fail</span>
                            @endif
                            
                        </div>
                        <div class="media-right">
                            <a href="{{route('myquiz.restart',$quiz->id)}}"
                               class="btn btn-primary">Restart <i class="material-icons btn__icon--right">refresh</i></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Questions</h4>
                    </div>
                    <ul class="list-group list-group-fit mb-0">
                    @foreach ($results as $item)
                        @foreach ($questions as $que)
                    
                        @if ($item->question_id==$que->id)
                        <li class="list-group-item">
                            <div class="media">
                                <div class="media-left">
                                    <div class="text-muted-light">{{$que->id-$questions->first()->id + 1}}</div>
                                </div>
                                <div class="media-body">{{$que->question}}</div>
                                @if ($item->result=='correct')
                                    <div class="media-right"><span class="badge badge-success ">Correct</span></div>
                                @else 
                                    <div class="media-right"><span class="badge badge-danger ">Wrong</span></div>
                                @endif
                            </div>
                        </li>
                        @endif
                      
                            
                        
                        @endforeach
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>

@endsection