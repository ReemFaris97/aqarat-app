@extends('admin.layout.app')

@section('title','تعديل الصلاحية '.$role->name)

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>تعديل الصلاحية {{$role->name}} </h1>
            <div class="section-header-breadcrumb">
                <a href="{{route('admin.roles.index')}}"
                   class="btn btn-outline-primary">العودة لكل الصلاحيات</a>
            </div>
        </div>
        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    @include('admin.dashboard.common._alert_message')
                    @include('admin.dashboard.common._alert_validation_errors')
                    <div class="card">
                        <div class="card-header">
                            <h4>تعديل الصلاحيات</h4>
                        </div>
                        <div class="card-body">
                            {!!Form::model($role , ['route' => ['admin.roles.update' , $role->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true]) !!}

                            @include('admin.dashboard.roles.form')
                            {!!Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
