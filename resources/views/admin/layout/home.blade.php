@extends('admin.layout.app')

@section('title')
    الصفحه الرئيسه
@stop

@section('content')
    <!-- Widgets -->
    <div class="row clearfix">

        <a href="{{route('admin.admins.index')}}" style="color:#eee">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                <div class="info-box bg-lime hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">people_alt</i>
                    </div>

                    <div class="content">
                        <div class="text">
                            عدد أعضاء إدارة النظام
                        </div>
                        <div class="number count">{{App\Models\Admin::count()}}</div>
                    </div>

                </div>
            </div>
        </a>


{{--        <a href="{{route('admin.users.index')}}" style="color:#eee">--}}
{{--            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">--}}
{{--                <div class="info-box bg-lime hover-expand-effect">--}}
{{--                    <div class="icon">--}}
{{--                        <i class="material-icons">people_alt</i>--}}
{{--                    </div>--}}

{{--                    <div class="content">--}}
{{--                        <div class="text">--}}
{{--                            عدد المستخدمين--}}
{{--                        </div>--}}
{{--                        <div class="number count">{{App\Models\User::count()}}</div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </a>--}}

      @stop
