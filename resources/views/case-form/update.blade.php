@extends('layouts.app')

@section('title')
    <title>Case Form</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Update Student Case Form') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('caseform.updateCase') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $caseForm["id"] }}">
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
                                        <span class="badge badge-primary badge-pill">
                                            {{ $caseForm["case_reference_no"] }}
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Questionnaire Form Reference No
                                        <span class="badge badge-primary badge-pill">
                                            {{ $caseForm["questionnaire_form_ref"]}}
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Appointment Booking Reference No
                                        <span class="badge badge-primary badge-pill">{{ $caseForm["appointment_reference_no"] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Employment No
                                        <span class="badge badge-primary badge-pill">{{ session()->get('user')[0]["employment_no"] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Student No
                                        <span class="badge badge-primary badge-pill">{{ $caseForm["student_no"]}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Student Name and Surname
                                        <span class="badge badge-primary badge-pill">
                                            {{ $caseForm["student"]["name"]}} {{ $caseForm["student"]["surname"]}}
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Case Details
                                        <span class="">
                                            <textarea rows="7" cols="50" name="case_details" required minlength="10">{{ $caseForm['case_details'] }}</textarea>
                                        </span>
                                    </li>
                                </ul>
                            </div><br>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-6">
                                    <button type="submit" class="btn btn-primary">
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