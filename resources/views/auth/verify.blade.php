@extends('layouts.main')

@section('content')
    <div id="contact" class="contact-us section">
        <div class="container">
          <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 wow fadeInRight" style="margin-left: 50%" data-wow-duration="0.5s" data-wow-delay="0.25s">
                <div class="card">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>
    
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
    
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
@endsection