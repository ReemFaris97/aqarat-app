@extends('admin.layout.app')

@section('title')
    أعضاء إدارة النظام
@endsection
@section('header')
    @include('admin.datatable.headers')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="header-title m-t-0 m-b-30">كل المديرين</h4>

                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الإسم</th>
                        <th>الايميل</th>
                        <th>الهاتف</th>
                        <th>حالة الحساب</th>
                        <th>صورة العضو</th>
                        <th>تغيير حالة الحساب</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($items as $key=>$item)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                            <td>
                                <img src="{{$item->image}}" style="width: 50px; height: 50px">
                            </td>
                            <td>{{AccountStatus($item->status)}}</td>
                            <td>
                                @if ($item->status == 1)
                                    <a class="btn btn-danger"
                                       href="{{ route('admin.admins.status', $item->id) }}">
                                        تعطيل</a>
                                @else
                                    <a href="{{ route('admin.admins.status', $item->id) }}"
                                       class="btn btn-success">
                                        تفعيل </a>
                                @endif
                            </td>
                            <td>

                                <a href="{{route('admin.admins.edit',$item->id)}}"
                                         class="btn btn-info btn-circle"><i style="padding-top:5px;padding-left: 6px;"
                                                                            class="fa fa-pencil"></i></a>

                                <a data-url="{{ route('admin.admins.destroy', $item) }}"
                                   onclick="delete_form(this)" data-name="{{ $item->name }}" data-toggle="tooltip"
                                   data-original-title="حذف" class="btn btn-danger btn-circle"><i
                                        style="padding-top: 5px;padding-left: 4px;"
                                        class="fa fa-trash-o"></i></a>
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
