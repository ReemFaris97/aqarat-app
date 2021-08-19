@extends('admin.layout.app')

@section('title')
    جميع طلبات الاعلانات المميزة
@endsection
@section('header')
    @include('admin.datatable.headers')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="header-title m-t-0 m-b-30">كل  طلبات الاعلانات المميزة</h4>

                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>رقم الطلب</th>
                        <th>اسم الطلب</th>
                        <th>المدة</th>
                        <th>السعر</th>
                        <th>الحالة</th>
                        <th>تعديل الحالة</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($requests as $key=>$request)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$request->order->id}}</td>
                            <td>{{$request->order->name}}</td>
                            <td>{{(int)$request->quantity}} شهرًا</td>
                            <td>{{$request->price}}</td>
                            <td>{{__($request->status)}}</td>
                            <td>
                                <form
                                    action="{{ route('admin.orders-requests.update', $request->id) }}"
                                    style="display: inline;"
                                    method="post">@csrf
                                    {{method_field('put')}}
                                    {!! Form::select('status',order_status(),$request->status,['class' =>'form-control ', 'placeholder'=>  'تغيير الحالة  ']) !!}
{{--                                    <input type="hidden" name="request_id" value="{{$request->id}}">--}}
                                    <button type="submit"
                                            class="btn-icon waves-effect btn btn-sm btn-success">حفظ</button>
                                </form>
                            </td>

                            <td>

                                    <a data-url="{{ route('admin.orders-requests.destroy', $request) }}"
                                       onclick="delete_form(this)" data-name="{{ $request->name }}" data-toggle="tooltip"
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
