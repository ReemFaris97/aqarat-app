@extends('admin.layout.app')

@section('title')
    تفاصيل العميل  {{$item->name}}
@stop
@section('header')
    @include('admin.datatable.headers')
@stop
@section('content')
    @include('admin.common.alert')
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        تفاصيل العميل {{$item->name}}
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <a href="{{route('admin.users.index')}}">
                            <button class="btn btn-danger">جميع العملاء</button>
                        </a>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">

                            <h4 class="header-title m-t-0 m-b-30">تفاصيل العميل :{{$item->name}}</h4>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-md-6">
                                        <div class="inline">
                                        <h5>اسم العميل : </h5>
                                        <h5 >
                                            {{$item->name}}
                                        </h5>
                                        </div>
                                        <div class="inline">
                                            <h5>رقم هاتف العميل : </h5>
                                            <h5>
                                                {{$item->phone}}
                                            </h5>
                                        </div>
                                        <div class="inline">
                                            <h5>البريد الألكترونى للعميل</h5>
                                            <h5>
                                                {{$item->email}}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="inline">
                                        <h5>المبلغ الموجود بالمحفظة</h5>
                                        <h5 style="font-weight: 600;">
                                            {{$item->wallet->amount}}
                                        </h5>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--End of row-->
                            <!-- <table class="table table-bordered table-striped table-hover dataTable js-exportable"> -->
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>االعنوان</th>
                                    <th>الدولة</th>
                                    <th>المدينة</th>
                                    <th>المنطقة</th>
                                    <th>خيارات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($item->addresses as $key=>$address)
                                    <tr>
                                        <td>{{$key++}}</td>
                                        <td>{{$address->address}}</td>
                                        <td>{{$address->area->city->country->name}}</td>
                                        <td>{{$address->area->city->name}}</td>
                                        <td>{{$address->area->name}}</td>
                                        <td>
                                          <button type="button" class="fa fa-pencil btn btn-info btn-circle" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}"onclick="Show({{$item->id}})"></button>
                                          <div class="modal fade" id="exampleModalCenter{{$item->id}}" tabindex="-1"
                                           role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLongTitle">تعديل العنوان</h5>
                                                  </div>
                                                  {!!Form::model($address , ['route' => ['admin.user-address.update' , $address->id] , 'method' => 'PATCH','enctype'=>"multipart/form-data",'files' => true]) !!}
                                                      <div class="modal-body">
                                                        <div class="form-group form-float">
                                                            <label class="form-label">العنوان</label>
                                                            <div class="form-line">
                                                              {!! Form::text("address",null,['class'=>'form-control','placeholder'=>'العنوان'])!!}
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-float">
                                                            <label class="form-label">المنطقة</label>
                                                            <div class="form-line">
                                                                {!! Form::select("area_id",area(),null,['class'=>'form-control','placeholder'=>'اختر اسم المنطقة']) !!}
                                                            </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer footer-button">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
                                                          <button class="btn btn-primary waves-effect" type="submit">حفظ</button>
                                                      </div>
                                                  {!!Form::close() !!}
                                              </div>
                                          </div>
                                      </div>

                                            <a href="#" onclick="Delete({{$address->id}})" data-toggle="tooltip"
                                               data-original-title="حذف" class="btn btn-danger btn-circle"><i
                                                        class="fa fa-trash-o"></i></a>
                                            {!!Form::open( ['route' => ['admin.user-address.destroy',$address->id] ,'id'=>'delete-form'.$address->id, 'method' => 'Delete']) !!}
                                            {!!Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <!-- #END# Exportable Table -->



@endsection

@section('footer')
    @include('admin.datatable.scripts')
    <script>
        function Delete(id) {
            var item_id = id;
            swal({
                title: "هل أنت متأكد ",
                text: "هل تريد حذف هذا العنوان",
                icon: "warning",
                buttons: ["الغاء", "موافق"],
                dangerMode: true,

            }).then(function (isConfirm) {
                if (isConfirm) {
                    document.getElementById('delete-form' + item_id).submit();
                } else {
                    swal("تم االإلفاء", "حذف  الأدمن تم الغاؤه", 'info', {buttons: 'موافق'});
                }
            });
        }
    </script>
@endsection
