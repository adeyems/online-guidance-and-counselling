<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                display: flex;
                justify-content: center;
                padding-top: 100px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 35px;
            }

            .links > a {
                color: #636b6f;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                padding-right: 25px;
            }
            a:hover{
                color: #5b5b5b;
                font-size: 15px;
            }

            .m-b-md {
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('images/queen _ede .jpg') }}" style="max-width: 200px; max-height: 150px" alt="Queen Ede Secondary School">
        </div>
        <div class="col-md-8 title m-b-md">
            Secured Guidance, Counselling and Monitoring Web Application
        </div>
    </div>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title" style="padding-bottom: 50px">Login Screen</div>
                <div class="links title m-b-md">
                    <a href="{{ route('login.student') }}" class="btn btn-primary">Student</a>
                    <a href="{{ route('login.parent') }}" class="btn-primary">Parent</a>
                    <a href="{{ url('/login/teacher') }}" class="btn-primary">Teacher</a>
                    <a href="{{ url('/login/counsellor') }}" class="btn-primary">Guidance and Counsellor</a>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
