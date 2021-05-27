@extends('admin.layout.app')

@section('title')
    جميع الإعلانات
@endsection
@section('header')
    @include('admin.datatable.headers')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="header-title m-t-0 m-b-30">كل الإعلانات</h4>

                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>عنوان الإعلان</th>
                        <th>صورة الإعلان</th>
                        <th>عدد المشاهدات</th>
                        <th>تاريخ الإضافة</th>
                        <th>اسم المستخدم</th>
                        <th>اسم المدينة</th>
                        <th>اسم الحى</th>
                        <th>حالة الإعلان</th>
                        <th>تغيير حالة الإعلان</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($items as $key=>$item)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$item->title}}</td>
                            <td>
                                <img src="{{$item->image}}" style="width: 50px; height: 50px">
                            </td>
                            <td>{{$item->views}}</td>
                            <td>{{$item->created_at ?? $item->updated_at}}</td>
                            <td>{{$item->user->name}}</td>
                            <td>{{$item->neighborhood->city->name}}</td>
                            <td>{{$item->neighborhood->name}}</td>
                            <td>{{AccountStatus($item->status)}}</td>
                            <td>
                                @if(auth('admin')->user()->can('advertisings-edit'))
                                    @if ($item->status == 1)
                                        <a class="btn btn-danger"
                                           href="{{ route('admin.advertisings.status', $item->id) }}">
                                            تعطيل</a>
                                    @else
                                        <a href="{{ route('admin.advertisings.status', $item->id) }}"
                                           class="btn btn-success">
                                            تفعيل </a>
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if(auth('admin')->user()->can('advertisings-edit'))
                                    <a href="{{route('admin.advertisings.edit',$item->id)}}"
                                       class="btn btn-info btn-circle"><i style="padding-top:5px;padding-left: 6px;"
                                                                          class="fa fa-pencil"></i></a>
                                @endif

                                @if(auth('admin')->user()->can('advertisings-delete'))
                                    <a data-url="{{ route('admin.advertisings.destroy', $item) }}"
                                       onclick="delete_form(this)" data-name="{{ $item->title }}" data-toggle="tooltip"
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
