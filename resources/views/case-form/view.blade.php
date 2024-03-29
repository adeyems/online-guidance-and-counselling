@extends('layouts.app')

@section('title')
    <title>Case Forms</title>
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
                    <div class="card-header text-center" style="font-weight: bolder">{{ __('Student Case Forms') }}</div>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Case Form Ref. No</th>
                                <th scope="col">Student No</th>
                                <th scope="col">Student Name and Surname</th>
                                <th scope="col">View</th>
                                <th scope="col">Update Case Form</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($caseForms as $caseForm)
                            <th scope="row">{{ sizeof($caseForms) - $loop->index }}</th>
                            <td>{{ $caseForm["case_reference_no"]}}</td>
                            <td> {{ $caseForm["student"]["student_no"] }} </td>
                            <td>{{ $caseForm["student"]["name"] }} {{ $caseForm["student"]["surname"] }}</td>
                            <td><a href="/caseform/details/{{ $caseForm["id"]}}">View Details</a></td>
                            <td><a href="/caseform/update/{{$caseForm["id"]}}">Update</a></td>
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
