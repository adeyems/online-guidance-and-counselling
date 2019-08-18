@extends('layouts.app')

@section('title')
    <title>Teacher Home</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Teacher Home</div>

                    <div class="card-body text-center">
                        @if ($message = Session::get('status'))

                            <div class="alert alert-success alert-block text-center">

                                <button type="button" class="close" data-dismiss="alert">×</button>

                                <strong class="text-center">{{ $message }}</strong>

                            </div>
                        @endif
                        <a href="{{ route('questionnaire.view') }}" style="margin-right: 30px;" class="btn btn-secondary">Completed Questionnaire Form</a>
                        <a href="{{ route('caseform.view') }}" class="btn btn-secondary" style="margin-right: 30px;">View/Update Student Case Form</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
