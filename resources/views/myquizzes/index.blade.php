@extends('layouts.base')

@section('title')
    <title> Quiz Results</title>
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
                    <li class="breadcrumb-item active">Quizzes Result</li>
                </ol>
        
                <div class="card">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <h4 class="card-title">Quizzes</h4>
                                <p class="card-subtitle">Your Performance</p>
                            </div>
                            <div class="media-right">
                                {{-- <a class="btn btn-sm btn-primary"
                                   href="#">Quiz results</a> --}}
                            </div>
                        </div>
                    </div>

                    <ul class="list-group list-group-fit mb-0">
                        @forelse ($myquizzes as $key=>$value)
                        @foreach ($quizzes as $item)
                        @if($value==$item->id)
                                 <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <a class="text-body"
                                               href="{{route('myquiz.show',$item->id)}}"><strong>
                                                  {{$item->title}}
                                                </strong></a><br>
                                            <div class="d-flex align-items-center">
                                                <small class="text-black-50 text-uppercase mr-2">Course</small>
                                                <a href="{{route('viewcourse',$item->id)}}">
                                                     @foreach($courses as $course) 
                                                    @if($course->id==$item->course_id)
                                                        {{$course->title}}
                                                    @endif
                                                    @endforeach 
                                                </a>
                                            </div>
                                        </div>
                                        <div class="media-right text-center d-flex align-items-center">
                                            
                                            @if ($answers->where('quiz_id',$item->id)->where('result','correct')->count()/$answers->where('quiz_id',$item->id)->count()*100 >70 )
                                            <span class="text-black-50 mr-3">Great</span>
                                                <h4 class="mb-0 text-success">
                                                {{round($answers->where('quiz_id',$item->id)->where('result','correct')->count()/$answers->where('quiz_id',$item->id)->count()*100) }} %        
                                            </h4>
                                            @elseif($answers->where('quiz_id',$item->id)->where('result','correct')->count()/$answers->where('quiz_id',$item->id)->count() * 100 < 70 && $answers->where('quiz_id',$item->id)->where('result','correct')->count()/$answers->where('quiz_id',$item->id)->count()*100 > 50)
                                            <span class="text-black-50 mr-3">Good</span>
                                            <h4 class="mb-0 text-warning">
                                                {{round($answers->where('quiz_id',$item->id)->where('result','correct')->count()/$answers->where('quiz_id',$item->id)->count()*100) }} %        
                                            </h4>
                                            @elseif($answers->where('quiz_id',$item->id)->where('result','correct')->count()/$answers->where('quiz_id',$item->id)->count() * 100 >= 50 && $answers->where('quiz_id',$item->id)->where('result','correct')->count()/$answers->where('quiz_id',$item->id)->count()*100 >= 30)
                                            <span class="text-black-50 mr-3">Fair</span>
                                            <h4 class="mb-0 text-primary">
                                                {{round($answers->where('quiz_id',$item->id)->where('result','correct')->count()/$answers->where('quiz_id',$item->id)->count()*100) }} %        
                                            </h4>
                                            @elseif($answers->where('quiz_id',$item->id)->where('result','correct')->count()/$answers->where('quiz_id',$item->id)->count() * 100 < 30 )
                                            <span class="text-black-50 mr-3">Fail</span>
                                                <h4 class="mb-0 text-danger">
                                                    {{round($answers->where('quiz_id',$item->id)->where('result','correct')->count()/$answers->where('quiz_id',$item->id)->count()*100) }} %        
                                                </h4>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                  @endif   
                            @endforeach
                        @empty
                         <p class="m-3">You have not attempted any quizzes</p>   
                        @endforelse    
                           
                       
                    </ul>
                </div>
            </div>

        </div>

  
@endsection