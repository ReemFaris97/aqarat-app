@extends('admin.layout.app')

@section('title')
    تعديل المستخدم
    {{ $item->name }}
@stop
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">تعديل المستخدم {{ $item->name }} </h4>
                
                        {!!Form::model($item , ['route' => ['admin.users.update' , $item->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true]) !!}
                        @include('admin.users.form')
                        {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
