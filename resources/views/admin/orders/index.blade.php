@extends('admin.layout.app')

@section('title')
    جميع الطلبات
@endsection
@section('header')
    @include('admin.datatable.headers')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="header-title m-t-0 m-b-30">كل الطلبات</h4>

                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>الصورة</th>
                        <th>المستخدم</th>
                        <th>التصنيف</th>
                        <th>السعر</th>
                        <th>التفاصيل</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($orders as $key=>$order)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$order->name}}</td>
                            <td>
                                <img src="{{$order->image}}" style="width: 50px; height: 50px">
                            </td>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->category->name}}</td>
                            <td>{{$order->price}}</td>
                            <td>@include('admin.orders.order_details')</td>
                            <td>
                                @if(auth('admin')->user()->can('categories-delete'))

                                    <a data-url="{{ route('admin.orders.destroy', $order) }}"
                                       onclick="delete_form(this)" data-name="{{ $order->name }}" data-toggle="tooltip"
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
