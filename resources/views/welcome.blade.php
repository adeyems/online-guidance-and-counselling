@extends('layouts.app')

@section('title')
    <title>Dashboard</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center"
                style="
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;">
            @if ($message = Session::get('status'))

                <div class="alert alert-success alert-block text-center">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong class="text-center">{{ $message }}</strong>

                </div>
            @endif
            <div class="col-md-12">
                <div class="card">
                    <div class="title text-center m-b-md card-header" style="padding-bottom: 30px"><h5>Login Screen</h5></div>
                    <div class="links title m-b-md offset-2 align-content-center card-body">
                        <a href="{{ route('login.student') }}" style="margin-right: 30px;" class="btn btn-secondary">Student</a>
                        <a href="{{ route('login.parent') }}" class="btn btn-secondary" style="margin-right: 30px;">Parent</a>
                        <a href="{{ url('/login/teacher') }}" class="btn btn-secondary" style="margin-right: 30px;">Teacher</a>
                        <a href="{{ url('/login/counsellor') }}" class="btn btn-secondary">Guidance and Counsellor</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
