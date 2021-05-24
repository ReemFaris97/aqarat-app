@extends('admin.layout.app')
@section('title')
    إضافة  مدونة جديدة
@stop
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">اضافة مدونة جديدة </h4>
                <div class="row">
                    <div class="col-lg-6">
                        {!!Form::open( ['route' => 'admin.blogs.store' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true]) !!}
                        @include('admin.blogs.form')
                        {!!Form::close() !!}
                    </div><!-- end col -->

                </div><!-- end row -->
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->

@endsection
