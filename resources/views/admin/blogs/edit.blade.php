@extends('admin.layout.app')

@section('title')
    تعديل المدونة
    {{ $item->name }}
@stop
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">تعديل المدونة {{ $item->name }} </h4>

                        {!!Form::model($item , ['route' => ['admin.blogs.update' , $item->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true]) !!}
                        @include('admin.blogs.form')
                        {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    <script>
        CKEDITOR.replaceClass = 'ck-editor';
    </script>
@endpush
