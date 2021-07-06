@extends('admin.layout.app')
@section('title')
    إضافة  الأسئلة الشائعة
@stop
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">اضافة الأسئلة الشائعة </h4>
                <a class="input-group-btn" href="{{route('admin.commonQuestions.index')}}">
    <button type="submit" class="btn waves-effect waves-light btn-primary">رجوع</button>
</a>
                <div class="row">
                    <div class="col-12">
                        {!!Form::open( ['route' => 'admin.commonQuestions.store' ,'class'=>'form phone_validate', 'method' => 'Post', 'enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true]) !!}
                        @include('admin.commonQuestions.form')
                        {!!Form::close() !!}
                    </div><!-- end col -->

                </div><!-- end row -->
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->

@endsection
