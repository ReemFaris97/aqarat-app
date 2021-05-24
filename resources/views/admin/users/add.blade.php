@extends('admin.layout.app')
@section('title')
    إضافة  مستخدم
@stop
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">اضافة مستخدم </h4>
                <div class="row">
                    <div class="col-lg-6">
                        {!!Form::open( ['route' => 'admin.users.store' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true]) !!}
                        @include('admin.users.form')
                        {!!Form::close() !!}
                    </div><!-- end col -->

                </div><!-- end row -->
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->

@endsection
