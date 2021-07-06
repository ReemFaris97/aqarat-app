@extends('admin.layout.app')
@section('title')
    إضافة  مدير
@stop
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">اضافة مدير </h4>
                            {!!Form::open( ['route' => 'admin.admins.store' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'class'=>'form-horizontal','id'=>"StoreForm",'files' => true]) !!}
                            @include('admin.admins.form')
                        {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->

@endsection
