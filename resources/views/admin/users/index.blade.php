@extends('admin.layout.app')

@section('title')
    المستخدمين
@endsection
@section('header')
    @include('admin.datatable.headers')
@endsection
@section('content')
    @include('admin.common.alert')
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        جميع المستخدمين
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <a href="{{route('admin.users.create')}}">
                            <button class="btn btn-success">إضافة مستخدم جديد</button>
                        </a>
                    </ul>
                </div>
                <div class="body">
                    <table class="table js-basic-example display responsive nowrap table-bordered table-striped table-hover dataTable responsive js-exportable  data-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الإسم</th>
                            <th>الايميل</th>
                            <th>الهاتف</th>
                            <th>حالة الحساب</th>
                            <th>صورة العضو</th>
                            <th>قيمة المحفظة</th>
                            <th>تعديل المحفظة</th>
                            <th>تغيير حالة الحساب</th>
                            <th>تفاصيل العميل</th>
                            <!-- <th>دفتر العناوين</th> -->
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
                          <td>{{AccountStatus($item->is_active)}}</td>
                          <td>
                            <img src="{{$item->image}}" style="width: 50px; height: 50px">
                          </td>
                          <td>{{$item->wallet->amount}}</td>
                          <td>
                            <button type="button" class="fa fa-pencil btn btn-info btn-circle" data-toggle="modal" data-target="#exampleModalCenter_wallet{{$item->id}}"onclick="Show({{$item->id}})"></button>
                            <div class="modal fade" id="exampleModalCenter_wallet{{$item->id}}" tabindex="-1"
                             role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">القيمة</h5>
                                    </div>
                                    {!!Form::model($item , ['route' => ['admin.UserWallet' , $item->id] , 'method' => 'Post','enctype'=>"multipart/form-data",'files' => true]) !!}
                                        <div class="modal-body">
                                          <div class="form-group form-float">
                                              <label class="form-label">قيمة المبلغ في المحفظة</label>
                                              <div class="form-line">
                                                {!! Form::text("amount",null,['class'=>'form-control','placeholder'=>'  القيمة  '])!!}
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
                          </td>
                          <td>

                              @if($item->is_active == 1)
                                  <a href="{{route('admin.Deactivate',$item->id)}}"
                                     class="btn btn-xs btn-danger"><i class="fa fa-times"></i> </a>
                              @else
                                  <a href="{{route('admin.Activate',$item->id)}}"
                                     class="btn btn-xs btn-success"><i class="fa fa-check"></i> </a>
                              @endif
                          </td>

                          <td>    <a href="{{route('admin.users.show',$item->id)}}"
                                 class="btn btn-info btn-circle"><i class="fa fa-eye"></i></i></a></td>
                          <!-- <td> -->
                            <!-- <a href="#" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}"
                               class="btn btn-info btn-circle"><i class="fa fa-eye"></i></i></a>

                               <div class="modal fade" id="exampleModalCenter{{$item->id}}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">عرض جميع العناوين</h5>
                                </div>
                                <div class="modal-body">

                                      <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                          <thead>
                                          <tr>
                                              <th>#</th>
                                              <th>االعنوان</th>
                                              <th>الدولة</th>
                                              <th>المدينة</th>
                                              <th>المنطقة</th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                            @foreach($item->addresses as $key=>$address)
                                                <tr>
                                                  <td>{{$key++}}</td>
                                                  <td>{{$address->address}}</td>
                                                  <td>{{$address->area->city->country->name ?? ""}}</td>
                                                  <td>{{$address->area->city->name}}</td>
                                                  <td>{{$address->area->name}}</td>
                                              </tr>
                                          @endforeach

                                          </tbody>
                                      </table>
                                </div>

                                <div class="modal-footer footer-button">
                                      <button type="button" class="btn btn-secondary"
                                              data-dismiss="modal">غلق
                                      </button>

                                      <!-- <button class="btn btn-primary waves-effect" type="submit">حفظ -->
                                      <!-- </button> -->
                                <!-- </div>
                          </div>
                      </div>
                    </div>
                          </td> -->
                          <td>
                              <a href="{{route('admin.users.edit',$item->id)}}"
                                 class="btn btn-info btn-circle"><i style="padding-top:5px;padding-left: 6px;"
                                                                    class="fa fa-pencil"></i></a>

                                  <a href="#" onclick="Delete({{$item->id}})" data-toggle="tooltip"
                                     data-original-title="حذف" class="btn btn-danger btn-circle"><i
                                              style="padding-top: 5px;padding-left: 4px;"
                                              class="fa fa-trash-o"></i></a>

                              {!!Form::open( ['route' => ['admin.users.destroy',$item->id] ,'id'=>'delete-form'.$item->id, 'method' => 'Delete']) !!}
                              {!!Form::close() !!}


                          </td>

                      </tr>
                  @endforeach

                  </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->

@endsection


@section('footer')
    @include('admin.datatable.scripts')
    <script>
        function Delete(id) {
            var item_id = id;
            swal({
                title: "هل أنت متأكد ",
                text: "هل تريد حذف هذا المستخدم؟",
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
