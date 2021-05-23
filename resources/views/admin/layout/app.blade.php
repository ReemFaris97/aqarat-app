<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>لوحة التحكم - @yield('title')</title>
    @yield('header')
    @include('admin.layout.styles')

</head>

<body class="theme-red">
<!-- Page Loader -->
<!-- <div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>

                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
             <i class="fas fa-futbol"></i>
        </div>
        <p>رجاءً انتظر...</p>
    </div>
</div> -->

<section class="loader">
				<div class="row">
					<div class="container">
						<div class="loader-wrap">
							<img src="http://127.0.0.1:8000/website/img/logo.png">
						</div>
					</div>
				</div>
			</section>
<!-- #END# Page Loader -->

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<!-- Top Bar -->
<nav class="navbar">
     <div class="logo-dashboard text-center">

        </div>
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="/">
                <img src="{{asset('admin/images/logo-nav.png')}}">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
            </ul>
        </div>


    </div>
</nav>
<!-- #Top Bar -->

<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
             <div class="image">
            <img src="{{url('admin/images/user.png')}}" width="48" height="48" alt="User" />
{{--                 <h8 style="color: red">{{auth()->user()->name}}</h8>--}}
        </div>
            <div class="info-container">
                <div class="name ar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
                <div class="email ar"></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-left">
                        <form id="logout-form" action="{{ route('admin.login') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <li><a class="ar" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" href="{{url('/logout')}}"><i
                                        class="material-icons">input</i>تسجيل الخروج</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">القائمة الرئيسية</li>
                @include('admin.layout.nav')
            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>

<section class="content">
    <div class="container-fluid">
        @yield('content')

    </div>
</section>


@include('admin.layout.scripts')

@yield('footer')
@stack('scripts')

</body>
</html>
