@extends('layouts.app')

@section('title')
    <title>Questionnaire Details</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Student Questionnaire Form Details</div>
                    <div class="card-body text-center">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Questionnaire Form Reference No
                            <span class="badge badge-primary badge-pill">
                              QUE/0{{ $questionnaire["questionnaire_form_reference_no"]}}
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Student No
                            <span class="badge badge-primary badge-pill">{{ $questionnaire["student_no"]}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Booking Reference No
                            <span class="badge badge-primary badge-pill">BOO/0{{ $questionnaire["appointment_reference_no"] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Problem Description
                            <span class="text-center"><p>{{ $questionnaire["problem_description"] }}</p></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Start Date of Notice Problem
                            <span class="badge badge-primary badge-pill">
                                {{ $questionnaire["start_date_of_noticed_problems"] }}
                                </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Submission Date
                            <span class="badge badge-primary badge-pill">{{ explode(" ", $questionnaire["created_at"])[0] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Submission Time
                            <span class="badge badge-primary badge-pill">{{ explode(" ", $questionnaire["created_at"])[1] }}</span>
                        </li>
                    </ul>
                    </div>
                </div><br><br>
                <div class="col-md-3 offset-md-6 align-content-center">
                    <a class="btn btn-primary btn-lg" href="{{ route('questionnaire.view') }}">Close</a>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/Easyhttp.js') }}"></script>
    <script src="{{ asset('js/check-email.js') }}"></script>
@endsection
