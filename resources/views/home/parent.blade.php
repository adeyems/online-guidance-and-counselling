@extends('layouts.app')

@section('title')
    <title>Parent Home</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Parent Home</div>

                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="{{ route('appointment.book') }}" style="margin-right: 30px;" class="btn btn-primary">Book Appointment</a>
                        <a href="{{ route('login.parent') }}" class="btn btn-primary" style="margin-right: 30px;">Fill Questionnaire Form</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
