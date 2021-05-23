@extends('admin.layout.app')

@section('title')
    تعديل المدير
    {{ $item->name }}
@stop
@section('content')

    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>تعديل المدير {{ $item->name }}</h2>
                    <ul class="header-dropdown m-r--5">
                        <a href="{{route('admin.admins.index')}}">
                            <button class="btn btn-danger1">كل المديرين</button>
                        </a>
                    </ul>
                </div>
                <div class="body">
                    {!!Form::model($item , ['route' => ['admin.admins.update' , $item->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'id'=>'FormUpdate','files' => true]) !!}
                        @include('admin.admins.form')
                    {!!Form::close() !!}
                </div>
            </div>
        </div>
    </div>


    <!-- #END# Basic Validation -->
@endsection
