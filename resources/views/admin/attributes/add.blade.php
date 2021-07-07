@extends('admin.layout.app')
@section('title')
    إضافة  خاصية جديدة
@stop
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">اضافة خاصية جديدة </h4>
               
                        {!!Form::open( ['route' => 'admin.attributes.store' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true]) !!}
                        @include('admin.attributes.form')
                        {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->

@endsection
