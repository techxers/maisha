@extends('layouts.base2')

@section('title')
    <title> Edit Profile</title>
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
                    <li class="breadcrumb-item active">Edit Account</li>
                </ol>
                <h1 class="h2">Edit Account</h1>

                <div class="card">
                    <ul class="nav nav-tabs nav-tabs-card">
                        <li class="nav-item">
                            <a class="nav-link active"
                               href="#first"
                               data-toggle="tab">Account</a>
                        </li>
                    </ul>
                    <div class="tab-content card-body">
                        <div class="tab-pane active"
                             id="first">
                            <form method="POST" enctype="multipart/form-data" action="{{route('profile.update',Auth::user()->id)}}"
                                  class="form-horizontal">
                                  @csrf
                                  @if (session('success'))
                                    <div class="alert alert-success">
                                        {{session('success')}}
                                    </div>
                                  @endif
                                  @if ($errors->any())
                                      <div class="alert alert-danger">
                                          @foreach ($errors->all() as $item)
                                              <li>{{$item}}</li><br>
                                          @endforeach
                                      </div>
                                  @endif
                                  
                                <div class="form-group row">
                                    <label for="avatar"
                                           class="col-sm-3 col-form-label form-label">Profile Photo</label>
                                    <div class="col-sm-9">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                                                <div class="icon-block rounded">
                                                    <i class="material-icons text-muted-light md-36">photo</i>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <div class="custom-file"
                                                     style="width: auto;">
                                                    <input type="file" name="photo"
                                                           id="avatar"
                                                           class="custom-file-input">
                                                    <label for="avatar"
                                                           class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name"
                                           class="col-sm-3 col-form-label form-label">Full Name</label>
                                    <div class="col-sm-8 ">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <input id="name" name="name"
                                                       type="text"
                                                       class="form-control"
                                                       placeholder="Name"
                                                       value="{{Auth::user()->name}}">
                                            </div>
                
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email"
                                           class="col-sm-3 col-form-label form-label">Email</label>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="material-icons md-18 text-muted">mail</i>
                                                </div>
                                            </div>
                                            <input type="text" name="email"
                                                   id="email"
                                                   class="form-control"
                                                   placeholder="Email Address"
                                                   value="{{Auth::user()->email}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="website"
                                           class="col-sm-3 col-form-label form-label">Phone</label>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="material-icons md-18 text-muted">phone</i>
                                                </div>
                                            </div>
                                            <input type="text" name="phone"
                                                   id="website"
                                                   class="form-control"
                                                   placeholder="Your Phone Number"
                                                   value="{{Auth::user()->phone}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password"
                                           class="col-sm-3 col-form-label form-label">Change Password</label>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="material-icons md-18 text-muted">lock</i>
                                                </div>
                                            </div>
                                            <input type="password" name="password"
                                                   id="password"
                                                   class="form-control"
                                                   placeholder="Enter new password" readonly onfocus="this.removeAttribute('readonly');">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-8 offset-sm-3">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                                                <button type="submit"
                                                   class="btn btn-success">Save Changes</button>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

@endsection