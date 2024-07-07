@extends('layouts.auth')
@section('page-title')
    {{ __('Login') }}
@endsection

@section('language-bar')

@endsection

@push('custom-scripts')
    @if (env('RECAPTCHA_MODULE') == 'yes')
        {!! NoCaptcha::renderJs() !!}
    @endif
    <script src="{{ asset('custom/libs/jquery/dist/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#loginForm").submit(function(e) {
                $("#saveBtn").attr("disabled", true);
                return true;
            });
        });
    </script>
@endpush
@php
    $logo = asset(Storage::url('uploads/logo/'));
    $company_logo = Utility::getValByName('company_logo');
@endphp
@section('content')
    <!-- [ auth-signup ] start -->
    <div class="card">
        <div class="row align-items-center" style="margin: 100px auto;border-radius: 25px;background: #0082d0;color: #ffffff">
            <div class="col-xl-12">
                <div class="card-body">
                    <div class="" >
                        <h2 class="mb-3 f-w-600" style="color: #b9e5ff">{{ __('Login') }}</h2>
                    </div>
                    {{ Form::open(['route' => 'login', 'method' => 'post', 'id' => 'loginForm', 'class' => 'login-form']) }}
                    <div class="">
                        <div class="form-group mb-3">
                            <label class="form-label">{{ __('Emails') }}</label>
                            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Enter Your Email')]) }}
                            @error('email')
                                <span class="error invalid-email text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">{{ __('Password') }}</label>
                            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => __('Enter Your Password'), 'id' => 'input-password']) }}



                            @error('password')
                                <span class="error invalid-password text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        @if (Route::has('password.request'))
                            <div class="form-group mb-4">
                                <a href="{{ route('password.request') }}"
                                    class="small text-light   text-underline--dashed  border-primary">
                                    {{ __('Forgot Your Password?') }}</a>
                            </div>
                        @endif

                        @if (env('RECAPTCHA_MODULE') == 'yes')
                            <div class="form-group col-lg-12 col-md-12 mt-3">
                                {!! NoCaptcha::display() !!}
                                @error('g-recaptcha-response')
                                    <span class="small text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        @endif
                        <div class="d-grid" style="background: white;color: #0082d0;">
                            {{ Form::submit(__('Login'), ['class' => 'btn btn-primary btn-block mt-2', 'id' => 'saveBtn']) }}
                        </div>
                        {{ Form::close() }}
                    </div>

                </div>
            </div>
            
        </div>
    </div>
    <!-- [ auth-signup ] end -->
@endsection
