@extends('admin.layout.app')
@section('title')
    إضافة  نوع اعلان جديد
@stop
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">اضافة نوع اعلان جديد </h4>

                {!!Form::open( ['route' => 'admin.advertisement-types.store' ,'class'=>'form phone_validate', 'method' => 'Post','class'=>'form-horizontal']) !!}
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
