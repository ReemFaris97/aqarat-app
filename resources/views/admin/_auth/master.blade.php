<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>تسجيل الدخول -تطبيق عقارات </title>
    <!-- Favicon-->
     <link rel="icon" href="{{asset('_admin/images/logo.png')}}" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Changa" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
{!!Html::style('_admin/plugins/bootstrap/css/bootstrap.css')!!}

<!-- Waves Effect Css -->
{!!Html::style('_admin/plugins/node-waves/waves.css')!!}

<!-- Animation Css -->
{!!Html::style('_admin/plugins/animate-css/animate.css')!!}

<!-- Custom Css -->
    {!!Html::style('_admin/css/style.css')!!}
    {!!Html::style('_admin/css/custome-style.css')!!}

    <style>
        *
        {
            font-family: 'Changa', sans-serif;
        }
    </style>

</head>

<body class="login-page" dir="rtl">
<!--  <div class="water-wrapper water-wrapper-level0">
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
        </div>
        <div class="water-wrapper water-wrapper-level1">
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
        </div>
        <div class="water-wrapper water-wrapper-level2">
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
        </div> -->
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);"> <img class="logo-login" src="{{asset('_admin/images/logo.png')}}"> </a>
    </div>
    <div class="card">
        @yield('content')
    </div>
</div>

@include('admin._auth.scripts')
@stack('scripts')

<script>
        let waverows = document.querySelectorAll('.water-wrapper');


waverows.forEach((waverow) =>{
    let waves = waverow.querySelectorAll('.wave');
    waves.forEach((wave, index) =>{
        wave.setAttribute('style','animation-delay:'+(index*2)/waves.length+'s; left:'+index*20+'vw');
    });
});
    </script>
</body>

</html>
