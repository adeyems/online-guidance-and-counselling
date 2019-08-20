@extends('layouts.app')

@section('title')
    <title>Completed Questionnaire</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($message = Session::get('status'))

                    <div class="alert alert-success alert-block text-center">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong class="text-center">{{ $message }}</strong>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-center">{{ __('Completed Questionnaire Form') }}</div>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">CRN</th>
                                <th scope="col">Student No</th>
                                <th scope="col">Student Name and Surname</th>
                                <th scope="col">View</th>
                                <th scope="col">Create Case Form</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($questionnaires as $questionnaire)
                            <th scope="row">{{ sizeof($questionnaires) - $loop->index }}</th>
                            <td>{{ $questionnaire["questionnaire_form_ref"]}}</td>
                            <td> {{ $questionnaire["student"]["student_no"] }} </td>
                            <td>{{ $questionnaire["student"]["name"] }} {{ $questionnaire["student"]["surname"] }}</td>
                            <td><a href="/questionnaire/details/{{ $questionnaire["id"]}}">View Details</a></td>
                            <td><a href="/caseform/new/{{$questionnaire["id"]}}">Create</a></td>
                        </tr>
                            @endforeach
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
