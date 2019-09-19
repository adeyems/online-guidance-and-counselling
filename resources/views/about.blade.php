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
                    <div class="title text-center m-b-md card-header" style="padding-bottom: 30px; font-weight: bolder"><h5>About Us</h5></div>
                    <div class="card-body">
                        <p style="text-transform: none; text-align: justify; text-justify: inter-word" class="text-secondary text-justify">
                            Queen Ede Secondary School endeavours to provide support all our students in their journey.
                            Guidance and Counselling is provided via integration with teaching and through a structured approach.
                            The role involves counselling, providing information, educational guidance, career guidance, individual appointments and providing for the personal,
                            educational and social development of all our students.
                            Students therefore may wish to see the guidance counsellor for educational guidance, career guidance or for personal counselling.<br>

                        <br>Students may from time to time need care, support and guidance to help them cope with particular situations or difficulties they may be encountering.
                            The guidance counsellor works in conjunction with the class teachers as well as liaising with management to provide the range of supports which a student may need.<br>

                        <br>The guidance counsellor is a qualified and registered member of the Institute of Guidance Counsellors and adheres to the guidelines on best practice and the code of ethical conduct.
                            The limits on confidentiality are to provide for the safety of the student if necessary.
                        Parents/Guardians are welcome to contact the guidance counsellor with any concerns or queries they may have.
                            The guidance counsellor is available to meet with parents/guardians at all the parent/teacher meetings and various information evenings throughout the school year and maintains a list of registered practitioners and assists with referrals for students requiring additional support.

                        </p>

                        <p class="text-primary" style="text-transform: none">For more enquirers, please contact us at:<br>
                        Queen Ede Secondary School,<br>
                        Plot 104, Patrick Nolan Avenue,<br>
                        Off Benin-Agbor Express Way,<br>
                        Benin City, Edo State.<br>
                        +234806745692.<br>
                            Email: admin@queenedesec.com.ng<br><br>
                    </p>
                        <p class="text-center">Powered by <span>Qudus</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
