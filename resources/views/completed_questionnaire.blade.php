@extends('layouts.app')

@section('title')
    <title>Completed Questionnaire</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Completed Questionnaire Form') }}</div>
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">SN</th>
                            <th scope="col">Form Reference No.</th>
                            <th scope="col">Student No</th>
                            <th scope="col">Student Name and Surname</th>
                            <th scope="col">View</th>
                            <th scope="col">Create Case Form</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($questionnaires as $questionnaire)
                            <th scope="row"></th>
                            <td>{{ $questionnaire["questionnaire_form_reference_no"]}}</td>
                            <td>{{ date('h:i A') }}</td>
                            <td>{{ $ques }}</td>
                            <td>Click</td>
                            <td>View</td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>

                </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/Easyhttp.js') }}"></script>
    <script src="{{ asset('js/check-email.js') }}"></script>
@endsection
