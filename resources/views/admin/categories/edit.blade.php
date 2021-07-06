@extends('admin.layout.app')

@section('title')
    تعديل التصنيف
    {{ $item->name }}
@stop
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">تعديل التصنيف {{ $item->name }} </h4>
                <div class="row">
                    <div class="col-lg-6">
                        {!!Form::model($item , ['route' => ['admin.categories.update' , $item->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true]) !!}
                        @include('admin.categories.form')
                        {!!Form::close() !!}
                    </div><!-- end col -->

                </div><!-- end row -->
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
