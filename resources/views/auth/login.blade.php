@extends('layouts.app')

@section('title')
    <title>Login</title>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                   {{ $user }} Login Screen

                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route($login) }}">
                        @csrf

                        @if ($message = Session::get('status'))

                            <div class="alert alert-success alert-block text-center">

                                <button type="button" class="close" data-dismiss="alert">×</button>

                                <strong class="text-center">{{ $message }}</strong>

                            </div>
                        @endif

                        @if ($message = Session::get('error'))

                            <div class="alert alert-danger alert-block text-center">

                                <button type="button" class="close" data-dismiss="alert">×</button>

                                <strong class="text-center">{{ $message }}</strong>

                            </div>
                        @endif

                        @if($user  == 'Parent')
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="username" value="{{ old('email') }}" required autocomplete="email" autofocus >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @elseif($user  == 'Student')

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Student Number') }}</label>

                            <div class="col-md-6">
                                <input id="" type="text" class="form-control @error('email') is-invalid @enderror" name="student_no" value="{{ old('email') }}" required autocomplete="email" autofocus >

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @else

                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Employment Number') }}</label>

                                <div class="col-md-6">
                                    <input id="" type="text" class="form-control @error('email') is-invalid @enderror" name="employment_no" value="{{ old('email') }}" required autocomplete="email" autofocus >

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        @endif
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" minlength="8" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

{{--
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                              --}}
{{--  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>--}}{{--

                            </div>
                        </div>
--}}

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button><br>

                                Forgot Your Password?
                                <a class="btn btn-link" href="{{ route('reset-email') }}">
                                     {{ __('Click Here') }}
                                </a><br>

                                @if( $user === 'Student' || $user === 'Parent')
                                    First Time User?
                                    <a class="btn btn-link" href="{{ route($register) }}">
                                        {{ __('Click here?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
