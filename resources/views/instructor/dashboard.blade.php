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
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <div class="flex">
                                    <h4 class="card-title">New Users</h4>
                                    <p class="card-subtitle">Last 7 Days</p>
                                </div>
                                <a href="instructor-earnings.html"
                                   class="btn btn-sm btn-primary"><i class="material-icons">trending_up</i></a>
                            </div>
                            <div class="card-body">
                                <div id="legend"
                                     class="chart-legend mt-0 mb-24pt justify-content-start"></div>
                                <div class="chart"
                                     style="height: 200px;">
                                    <canvas id="earningsChart"
                                            class="chart-canvas js-update-chart-bar"
                                            data-chart-legend="#legend"
                                            data-chart-line-background-color="primary"
                                            data-chart-prefix="$"
                                            data-chart-suffix="k"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <div class="flex">
                                    <h4 class="card-title">Courses</h4>
                                    <p class="card-subtitle">Latest Added Courses</p>
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
                                            <th>Date Added</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach ($courses->take(5) as $item)
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
                                                    <small class="text-muted text-uppercase js-lists-values-date">{{$item->created_at}}</small>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <div class="flex">
                                    <h4 class="card-title">Most Viewed Courses</h4>
                                </div>
                                <a class="btn btn-sm btn-primary"
                                   href="instructor-earnings.html">No of Views</a>
                            </div>
                            <ul class="list-group list-group-fit mb-0">
                                @foreach ($courses->take(5) as $item)
                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <a href="{{route('editcourse',$item->id)}}"
                                                class="text-body"><strong>{{$item->title}}</strong></a>
                                            </div>
                                            <div class="media-right">
                                                <div class="text-center">
                                                    <span class="badge badge-pill badge-primary">15</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>



@endsection