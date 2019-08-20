@extends('layouts.app')

@section('title')
    <title>Case Form Details</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center" style="font-weight: bolder">Student Case Form Details</div>
                    <div class="card-body text-center">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            CRN
                            <span class="">
                                {{ $caseForm["case_reference_no"]}}
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Student No
                            <span class="">{{ $caseForm["student_no"]}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            BRN
                            <span class="">{{ $caseForm["appointment_bookings_reference_no"] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Employment No
                            <span class="">{{ $caseForm["employment_no"] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            QRN
                            <span class="">{{ $caseForm["questionnaire_ref"] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Case Details
                            <span class="text-center"><p>{{ $caseForm["case_details"] }}</p></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Date of Submission
                            <span class="">
                                {{ explode(" ", $caseForm["created_at"])[0] }}
                                </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            TIme of Submission
                            <span class="">
                                 {{ explode(" ", $caseForm["created_at"])[1] }}
                                </span>
                        </li>

                    </ul>
                    </div>
                </div><br><br>
                <div class="col-md-3 offset-md-6 align-content-center">
                    <a class="btn btn-secondary btn-lg" href="{{ route('caseform.view') }}">Close</a>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/Easyhttp.js') }}"></script>
    <script src="{{ asset('js/check-email.js') }}"></script>
@endsection
