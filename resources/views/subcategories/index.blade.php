@extends('layouts.base2')

@section('title')
    <title> Subcategories</title>
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
                    <li class="breadcrumb-item active">Subcategories</li>
                </ol>
                <h1 class="h2">Course Subcategories</h1>
                <div class="card">
                    <div class="card-header">
                        
                        <span style="margin-left: 80%;">
                            <a href="{{route('createsubcategory')}}" class="btn btn-primary"> <i class=" fa fa-plus mr-1 fa-1x"> </i>  Add SubCategory</a>
                        </span>
                        @if(session('success'))
                        <div class="alert alert-light alert-dismissible border-1 border-left-3 border-left-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="text-black-70">{{session('success')}}</div>
                    </div>
                @endif  
                    </div>
                    
                    <ul class="list-group list-group-fit mb-0">
                        @foreach ($subcategories as $item)
                        <li class="list-group-item">
                            <div class="media">
                                <div class="media-left">
                                    <div class="text-muted-light">{{$item->id}}</div>
                                </div>
                                <div class="media-body" >{{$item->name}}</div>
                                <div class="media-body" ><a href="{{route('editsubcategory',$item->id)}}" class="btn btn-primary"><i class="fa fa-edit mr-1"></i> Edit</a></div>
                                <div class="media-body" ><a href="{{route('deletesubcategory',$item->id)}}" class="btn btn-danger"><i class="fa fa-trash mr-1"></i> Delete</a></div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    {{$subcategories->links()}}
                </div>
            </div>
        </div>

@endsection