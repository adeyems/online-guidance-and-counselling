@extends('layouts.app')

@section('title')
    <title>Student Registration</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Student Registration') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('createStudent') }}">
                            @csrf

                            @if ($message = Session::get('status'))

                                <div class="alert alert-success alert-block text-center">

                                    <button type="button" class="close" data-dismiss="alert">×</button>

                                    <strong class="text-center">{{ $message }}</strong>

                                </div>
                            @endif
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
                            <div class="form-group row" id="signup-form">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Student Number') }}</label>

                                <div class="col-md-6">
                                    <input id="student-no" type="text" class="form-control @error('name') is-invalid @enderror" name="student_no" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="student-no-msg">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" id="signup-form">
                                <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Student Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Student Surname') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date-of-birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                                <div class="col-md-6">
                                    <input id="date-of-birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth" autofocus>

                                    @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="class" class="col-md-4 col-form-label text-md-right">{{ __('Class') }}</label>
                                <div class="col-md-6">
                                    <select id="class" class="form-control @error('class_teacher_name') is-invalid @enderror" name="class"  required>
                                        <option value="">Select Class</option>
                                        <option value="Grade 8 Class 2">Grade 8 Class 2</option>
                                        <option value="Grade 9 Class 1">Grade 9 Class 1</option>
                                        <option value="Grade 9 Class 2">Grade 9 Class 2</option>
                                    </select>
                                </div>
                                <div class="col-md-6">

                                    @error('class')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="email-msg">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile_no" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="tel" class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" placeholder="+353" value="+353" required autocomplete="mobile-no">

                                    @error('mobile_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="phone-msg">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Home Address') }}</label>

                                <div class="col-md-6">
                                    <textarea  class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address"> {{ old('address') }}</textarea>

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="class_teacher_name" class="col-md-4 col-form-label text-md-right">{{ __('Class Teacher Name') }}</label>

                                <div class="col-md-6">
                                    <select id="class-teacher-name" class="form-control @error('class_teacher_name') is-invalid @enderror" name="class_teacher_name" required >
                                        <option value="">Select Class Teacher Name</option>
                                        @foreach ($teachersNames as $teacherName)
                                            <option value="{{ $teacherName->name }} {{ $teacherName->surname }}">{{ $teacherName->name }} {{ $teacherName->surname }}</option>
                                        @endforeach
                                    </select>

                                    @error('class_teacher_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
    <script src="{{ asset('js/Easyhttp.js') }}"></script>
    <script src="{{ asset('js/check-email.js') }}"></script>
@endsection
