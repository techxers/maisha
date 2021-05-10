@extends('layouts.base2')

@section('title')
    <title>Edit Subcategory</title>
@endsection

@section('content')
<div class="mdk-header-layout__content">

    <div data-push
         data-responsive-width="992px"
         class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Subcategories</li>
                </ol>
                <h1 class="h2">Edit Subcategory</h1>
                    <div class="card">
                        <div class="card-body">
                            @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </div>
                            @endif
                            <form action="{{route('updatesubcategory',$subcategory->id)}}" method="post" >
                                @csrf
                                <div class="form-group row">
                                    <label for="avatar"
                                        class="col-sm-3 col-form-label form-label">Name
                                    </label>
                                    <div class="col-sm-6" style="margin-left: -5.5%">
                                        <input id="title" name="name" type="text"  class="form-control" placeholder="Category name" value="{{$category->name}}">
                                    </div>
                                    <br>
                                    
                                </div>
                                <div class="form-group row" style="align-content: center;margin-left:20%;"> 
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update Subcategory</button>
                                    </div>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>

@endsection