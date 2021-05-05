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
                <h1 class="h2">Pending </h1>
               <div class="alert alert-danger">
                   Your application to be an instructor is still waiting for approval. You will be able to access your dashboard once your application is reviewed.
               </div>
            </div>

        </div>



@endsection