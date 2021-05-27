@extends('admin.layout.app')

@section('title')
    جميع الأحياء
@endsection
@section('header')
    @include('admin.datatable.headers')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="header-title m-t-0 m-b-30">كل الأحياء</h4>

                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الحى</th>
                        <th>اسم المدينة</th>
                        <th>حالة العرض</th>
                        <th>تغيير الحالة</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($items as $key=>$item)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->city->name}}</td>
                            <td>{{AccountStatus($item->status)}}</td>
                            <td>
                                @if(auth('admin')->user()->can('neighborhoods-edit'))
                                    @if ($item->status == 1)
                                        <a class="btn btn-danger"
                                           href="{{ route('admin.neighborhoods.status', $item->id) }}">
                                            تعطيل</a>
                                    @else
                                        <a href="{{ route('admin.neighborhoods.status', $item->id) }}"
                                           class="btn btn-success">
                                            تفعيل </a>
                                    @endif
                                @endif

                            </td>
                            <td>
                                @if(auth('admin')->user()->can('neighborhoods-edit'))
                                    <a href="{{route('admin.neighborhoods.edit',$item->id)}}"
                                       class="btn btn-info btn-circle"><i style="padding-top:5px;padding-left: 6px;"
                                                                          class="fa fa-pencil"></i></a>
                                @endif

                                @if(auth('admin')->user()->can('neighborhoods-delete'))

                                    <a data-url="{{ route('admin.neighborhoods.destroy', $item) }}"
                                       onclick="delete_form(this)" data-name="{{ $item->name }}" data-toggle="tooltip"
                                       data-original-title="حذف" class="btn btn-danger btn-circle"><i
                                            style="padding-top: 5px;padding-left: 4px;"
                                            class="fa fa-trash-o"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->

@endsection
@section('footer')
    @include('admin.datatable.scripts')
@endsection
