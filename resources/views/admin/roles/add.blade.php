@extends('admin.layout.app')

@section('title')
    إنشاء صلاحية جديد
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">اضافة صلاحية جديدة </h4>
                        {!!Form::open( ['route' => 'admin.roles.store' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true]) !!}
                        @csrf
                        @include('admin.roles.form')
                        {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
