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
                <a class="input-group-btn" href="{{route('admin.user-advertisers.index')}}">
                    <button type="button" class="btn waves-effect waves-light btn-primary">رجوع</button>
                </a>
                {{--                @dd($errors->all())--}}
                {!!Form::model($advertising , ['route' => ['admin.user-advertisers.update' , $advertising->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'class'=>'form-horizontal','files' => true]) !!}
                @include('admin.user-advertisers.form')
                {!!Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('scripts')
    <script>
        $(document).on('click', '.del_photo', function (e) {
            let confirmResult = confirm('هل أنت متأكد من حذف هذة الصورة  ؟');
            if (confirmResult) {
                var id = $(this).data('id');
                $.ajax({
                    type: 'delete',
                    url: "/delete/photo/" + id,
                    data: {
                        '_token': '{{csrf_token()}}',
                        'id': id,
                    },
                    success: function (data) {
                        $('.msg').css('display', 'block');
                        $('.photo' + data.id).remove();
                    }
                });
            } else {
                e.preventDefault();
            }
        });
    </script>
@endpush
