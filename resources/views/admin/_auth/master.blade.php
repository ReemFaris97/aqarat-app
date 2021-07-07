<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>تسجيل الدخول -تطبيق عقارات </title>
    @include('admin.layout.styles')
</head>

<body>

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class="text-center">
    <img src="{{asset('_admin/assets/images/logo.png')}}" class="logo_im">
        <h5 class="text-muted m-t-0 font-600">تسجيل الدخول للوحة تحكم </h5>
    </div>
    <div class="m-t-40 card-box">
        <div class="text-center">
            <h4 class="text-uppercase font-bold m-b-0">تسجيل دخول</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal m-t-20" role="form" method="POST" action="{{ route('admin.login') }}">
                @if (count($errors) > 0)
                    <div class="alert alert-info">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @csrf
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="email" required="" placeholder="Email" name="email">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" required="" name="password" placeholder="Password">
                    </div>
                </div>

                <div class="form-group text-center m-t-30">
                    <div class="col-xs-12">
                        <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">
                            تسجيل الدخول
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>
    <!-- end card-box-->


</div>
<!-- end wrapper page -->


@include('admin.layout.scripts')
@stack('scripts')
</body>

</html>
