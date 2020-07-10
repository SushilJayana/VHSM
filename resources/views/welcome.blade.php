<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
    html,
    body {
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
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links>a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Schemma
            </div>
            <div>
                <h4>hsm_subjects</h4>
                <p>id,name,slug,created_by,updated by</p>

                <h4>hsm_education_levels</h4>
                <p>id,name (+2 SCIENCE, SCHOOL ONE), slug,created_by,updated by</p>

                <h4>hsm_classrooms</h4>
                <p>id, name, slug ,education_level_id, subject_id, assigned_teacher_id (user_id),created_by,updated_by
                </p>

                <h4>hsm_assigments</h4>
                <p>id, name,  type, size, location,details , classroom_id, due_date, created_by, updated_by</p>

                <h4>hsm_study_materials</h4>
                <p>id, name, type, size, location,details, classroom_id,created_by,updated_by</p>

                <h4>hsm_classroom_students</h4>
                <p>id,classroom_id, user_id</p>
            </div>
           
        </div>
    </div>
</body>

</html>