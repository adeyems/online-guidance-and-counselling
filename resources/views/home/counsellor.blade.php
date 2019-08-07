@extends('layouts.app')

@section('title')
    <title>Counsellor Home</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Guidance Counsellor Home</div>

                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="{{ route('login.student') }}" style="margin-right: 30px;" class="btn btn-primary">Complete Questionnaire Form</a>
                        <a href="{{ route('login.parent') }}" class="btn btn-primary" style="margin-right: 30px;">View/Update Student Case Form</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
