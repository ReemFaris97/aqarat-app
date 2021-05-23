@extends('admin.layout.app')

@section('title')
    إضافة  مستخدم
@stop
@section('content')

    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>إضافة مستخدم</h2>
                    <ul class="header-dropdown m-r--5">
                        <a href="{{route('admin.users.index')}}">
                            <button class="btn btn-danger1">كل المستخدمين</button>
                        </a>
                    </ul>
                </div>
                <div class="body">
                    {!!Form::open( ['route' => 'admin.users.store' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'files' => true]) !!}
                    @include('admin.users.form')
                    {!!Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
