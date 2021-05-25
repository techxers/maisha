@extends('layouts.base2')
@section('title')
    <title>Edit Question</title>
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
                    <li class="breadcrumb-item active">Edit Question</li>
                </ol>
                <h1 class="h2">Edit Question</h1>
                <div class="card">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        
                            <li>{{$error}}</li>
                        
                        @endforeach
                    </div>
                @endif
                    <div class="tab-content card-body">
                        <div class="tab-pane active"
                             id="first">
                            <form action="{{route('question.update',$question->id)}}" method="POST"
                                  class="form-horizontal">
                                  @csrf
                                <div class="form-group row">
                                    <label for="name_on_invoice"
                                           class="col-sm-3 col-form-label form-label">Question</label>
                                    <div class="col-sm-6 col-md-6">
                                        <input id="name_on_invoice" name="question" value="{{$question->question}}"
                                               type="text"
                                               class="form-control" placeholder="Type the question here....">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="billing_address"
                                           class="col-sm-3 col-form-label form-label"> Choices</label>
                                    <div class="col-sm-6 col-md-8 mb-3" > 
                                        <input id="billing_address" name="first" value="{{$question->first}}"
                                               type="text" placeholder="first choice"
                                               class="form-control" >
                                    </div>
                                    <br>
                                    <label for="billing_address"
                                           class="col-sm-3 col-form-label form-label"></label>
                                    <div class="col-sm-6 col-md-8 mb-3" >
                                        <input id="billing_address" name="second" value="{{$question->second}}"
                                               type="text" placeholder="second choice"
                                               class="form-control"
                                               >
                                    </div><br>
                                    <label for="billing_address"
                                           class="col-sm-3 col-form-label form-label"></label>
                                    <div class="col-sm-6 col-md-8 mb-3" >
                                        <input id="billing_address" name="third" value="{{$question->third}}"
                                               type="text" placeholder="third choice"
                                               class="form-control"
                                               >
                                    </div><br>
                                    <label for="billing_address"
                                           class="col-sm-3 col-form-label form-label"></label>
                                    <div class="col-sm-6 col-md-8 mb-3" >
                                        <input id="billing_address" name="fourth" value="{{$question->fourth}}"
                                               type="text" placeholder="fourth choice"
                                               class="form-control"
                                               >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="billing_country"
                                           class="col-sm-3 col-form-label form-label">Correct Choice</label>
                                    <div class="col-sm-6 col-md-4">
                                        <select id="billing_country"
                                                class="custom-control custom-select form-control" name="answer">
                                            <option value="first"
                                                    {{$question->answer=='first'? 'selected':''}}>First Choice</option>
                                            <option value="second" {{$question->answer=='second'? 'selected':''}}>Second Choice</option>
                                            <option value="third" {{$question->answer=='third'? 'selected':''}}>Third Choice</option>
                                            <option value="fourth" {{$question->answer=='fourth'? 'selected':''}}>Fourth Choice</option>
                                        </select>
                                    </div>
                                </div>
                                @can('quiz', $question->quiz_id)
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-4 offset-sm-3">
                                            <button type="submit"
                                            class="btn btn-success"> Update Question</button>
                                        </div>
                                    </div>
                                @endcan
                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
@endsection