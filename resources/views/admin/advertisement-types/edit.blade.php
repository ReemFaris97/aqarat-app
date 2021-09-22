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

                        {!!Form::model($item , ['route' => ['admin.advertisement-types.update' , $item->id] , 'method' => 'PATCH','class'=>'form-horizontal']) !!}
                        @include('admin.advertisement-types.form')
                        {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('.select2').select2()
        })
    </script>
@endpush
