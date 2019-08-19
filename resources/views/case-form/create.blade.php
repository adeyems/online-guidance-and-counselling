@extends('layouts.app')

@section('title')
    <title>Questionnaire Form</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center" style="font-weight: bolder">{{ __('Create New Student Case Form') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('caseform.create') }}">
                            @csrf
                            <input type="hidden" name="case_reference_no" value="{{ $ref }}">
                            <input type="hidden" name="appointment_bookings_reference_no" value="{{$questionnaire["appointment_reference_no"]}}">
                            <input type="hidden" name="questionnaire_reference_no" value="{{$questionnaire["questionnaire_form_ref"]}}">
                            <input type="hidden" name="student_no" value="{{$questionnaire["student_no"]}}">
                            <input type="hidden" name="employment_no" value="{{session()->get('user')[0]["employment_no"]}}">
                            @isset( $error )
                                <div class="alert alert-success text-center">{{ $error }}</div>
                            @endisset

                            @isset( $status )
                                <div class="alert alert-success text-center">{{ $status }}</div>
                            @endisset
                            <div class="card">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Student Case Form Reference No
                                        <span class="">
                                            {{ $ref }}
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Questionnaire Form Reference No
                                        <span class="">
                                            {{ $questionnaire["questionnaire_form_ref"]}}
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Appointment Booking Reference No
                                        <span class="">{{ $questionnaire["appointment_reference_no"] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Employment No
                                        <span class="">{{ session()->get('user')[0]["employment_no"] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Student No
                                        <span class="">{{ $questionnaire["student_no"]}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Student Name and Surname
                                        <span class="">
                                            {{ $questionnaire["student"]["name"]}} {{ $questionnaire["student"]["surname"]}}
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Case Details
                                        <span class="">
                                            <textarea rows="7" cols="50" name="case_details" required minlength="10"></textarea>
                                        </span>
                                    </li>
                                </ul>
                            </div><br>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-6">
                                    <button type="submit" class="btn btn-secondary">
                                        {{ __('Confirm') }}
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
