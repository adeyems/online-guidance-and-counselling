@extends('layouts.app')

@section('title')
    <title>Questionnaire Form</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Questionnaire Form') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('questionnaire.create') }}">
                            @csrf

                            @isset( $error )
                                <div class="alert alert-success text-center">{{ $error }}</div>
                            @endisset

                            @isset( $status )
                                <div class="alert alert-success text-center">{{ $status }}</div>
                            @endisset

                            <div class="form-group row">
                                <label for="student_no" class="col-md-4 col-form-label text-md-right">{{ __('Student Number') }}</label>

                                <div class="col-md-6">
                                    <input id="class" type="text" class="form-control @error('class') is-invalid @enderror" name="student_no" value="{{ old('student_no') }}" required autocomplete="class" autofocus>

                                    @error('student_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row" id="signup-form">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Problem Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="name" rows="7" class="form-control @error('name') is-invalid @enderror" name="problem_description" value="{{ old('name') }}" required></textarea>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="" type="hidden"  value="1" class="form-control @error('mobile_no') is-invalid @enderror" name="appointment_reference">
                                    @error('mobile_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="enddate" class="col-md-4 col-form-label text-md-right">{{ __('Start Date of Noticed Problem(s) ') }}</label>

                                <div class="col-md-6">
                                    <input id="start_date" type="date" max="{{ date('Y-m-d', strtotime('-1 day')) }}" class="form-control @error('mobile_no') is-invalid @enderror" name="start_date">
                                    @error('mobile_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/Easyhttp.js') }}"></script>
    <script src="{{ asset('js/check-email.js') }}"></script>
@endsection
