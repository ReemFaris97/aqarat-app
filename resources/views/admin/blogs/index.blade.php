@extends('admin.layout.app')

@section('title')
    جميع المدونات
@endsection
@section('header')
    @include('admin.datatable.headers')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="header-title m-t-0 m-b-30">كل المدونات</h4>

                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>العنوان</th>
                        <th>المحتوى</th>
                        <th>الصورة</th>
                        <th>حالة المدونة</th>
                        <th>تغيير حالة المدونة</th>
                        <th>التعليقات</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($items as $key=>$item)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->description}}</td>
                            <td>
                                <img src="{{$item->image}}" style="width: 50px; height: 50px">
                            </td>
                            <td>{{AccountStatus($item->status)}}</td>
                            <td>
                                @if(auth('admin')->user()->can('blogs-edit'))
                                    @if ($item->status == 1)
                                        <a class="btn btn-danger"
                                           href="{{ route('admin.blogs.status', $item->id) }}">
                                            تعطيل</a>
                                    @else
                                        <a href="{{ route('admin.blogs.status', $item->id) }}"
                                           class="btn btn-success">
                                            تفعيل </a>
                                    @endif
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-danger"
                                   href="{{ route('admin.blogs.show', $item->id) }}">
                                    عرض تعليقات</a>
                            </td>

                            <td>
                                @if(auth('admin')->user()->can('blogs-edit'))

                                    <a href="{{route('admin.blogs.edit',$item->id)}}"
                                       class="btn btn-info btn-circle"><i style="padding-top:5px;padding-left: 6px;"
                                                                          class="fa fa-pencil"></i></a>
                                @endif
                                @if(auth('admin')->user()->can('blogs-delete'))
                                    <a data-url="{{ route('admin.blogs.destroy', $item) }}"
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
