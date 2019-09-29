@extends('layouts.app')

@section('title')
    <title>Parent Registration</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Parent Registration') }}</div>
                    @if ($message = Session::get('status'))

                        <div class="alert alert-success alert-block text-center">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong class="text-center">{{ $message }}</strong>

                        </div>
                    @endif
                    @if ($messages = Session::get('error'))

                        @foreach($messages as $message)
                        <div class="alert alert-danger alert-block text-center">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong class="text-center">{{ $message }}</strong>

                        </div>
                        @endforeach
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('createParent') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="student_no" class="col-md-4 col-form-label text-md-right">{{ __('Student Number') }}</label>

                                <div class="col-md-6">
                                    <input id="class" type="text" class="form-control @error('class') is-invalid @enderror" name="student_no" value="{{ old('student_no') }}" required autocomplete="class" autofocus>

                                </div>
                            </div>

                            <div class="form-group row" id="signup-form">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname"  value="{{ old('surname') }}" required autocomplete="surname" autofocus>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile_no" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                                <div class="col-md-6">
                                    <input id="mobile-no" maxlength="13" minlength="13" type="tel" class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" value="{{ old('mobile') ?? '+353'}}" required autocomplete="mobile-no">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Home Address') }}</label>

                                <div class="col-md-6">
                                    <textarea  class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address"> {{ old('address') }} </textarea>
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email (UserName)') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  value="{{ old('email') }}" required autocomplete="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Re-type Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-6">
                                    <button type="submit" class="btn btn-secondary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
