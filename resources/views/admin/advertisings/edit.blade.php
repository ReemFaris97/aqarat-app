@extends('admin.layout.app')

@section('title')
    تعديل الإعلان
    {{ $advertising->title }}
@stop
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">تعديل الإعلان {{ $advertising->title }} </h4>
                <a class="input-group-btn" href="{{route('admin.advertisings.index')}}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">رجوع</button>
                </a>
                        {!!Form::model($item , ['route' => ['admin.advertisings.update' , $item->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true]) !!}
                        @include('admin.advertisings.form')
                        {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
