@extends('admin.layout.app')

@section('title')
    أعضاء إدارة النظام
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
                        أعضاء إدارة النظام
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <a href="{{route('admin.admins.create')}}">
                            <button class="btn btn-success">إضافة عضو جديد</button>
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
                          <td>{{AccountStatus($item->is_admin)}}</td>
                          <td>
                            <img src="{{$item->image}}" style="width: 50px; height: 50px">
                          </td>
                          <td>
                              @if($item->email== auth()->user()->email)

                              @else
                                  @if($item->is_admin == 1)
                                      <a href="{{route('admin.admins.changeStatus',$item->id)}}"
                                         class="btn btn-xs btn-danger"><i class="fa fa-times"></i> </a>
                                  @else
                                      <a href="{{route('admin.admins.changeStatus',$item->id)}}"
                                         class="btn btn-xs btn-success"><i class="fa fa-check"></i> </a>
                                  @endif

                              @endif
                          </td>
                          <td>
                              <a href="{{route('admin.admins.edit',$item->id)}}"
                                 class="btn btn-info btn-circle"><i style="padding-top:5px;padding-left: 6px;"
                                                                    class="fa fa-pencil"></i></a>
                              @if($item->email== auth()->user()->email)
                              @else
                                  <a href="#" onclick="Delete({{$item->id}})" data-toggle="tooltip"
                                     data-original-title="حذف" class="btn btn-danger btn-circle"><i
                                              style="padding-top: 5px;padding-left: 4px;"
                                              class="fa fa-trash-o"></i></a>
                              @endif
                              {!!Form::open( ['route' => ['admin.admins.destroy',$item->id] ,'id'=>'delete-form'.$item->id, 'method' => 'Delete']) !!}
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
                text: "هل تريد حذف هذا الأدمن ؟",
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
