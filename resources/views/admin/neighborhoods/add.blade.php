@extends('admin.layout.app')
@section('title')
    إضافة  حى جديدة
@stop
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">اضافة حى جديدة </h4>
                
                        {!!Form::open( ['route' => 'admin.neighborhoods.store' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true]) !!}
                        @include('admin.neighborhoods.form')
                        {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->

@endsection
