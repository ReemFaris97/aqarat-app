@extends('admin.layout.app')

@section('title')
    تعديل الطلبات
    {{ $item->title }}
@stop
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">تعديل الطلبات {{ $item->title }} </h4>
                <a class="input-group-btn" href="{{route('admin.requests.index')}}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">رجوع</button>
                </a>
                <div class="row">
                    <div class="col-lg-6">
                        {!!Form::model($item , ['route' => ['admin.requests.update' , $item->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true]) !!}
                        @include('admin.requests.form')
                        {!!Form::close() !!}
                    </div><!-- end col -->

                </div><!-- end row -->
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
