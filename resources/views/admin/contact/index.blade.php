@extends('admin.layout.app')

@section('title')
   البريد
@endsection
@section('header')
    @include('admin.datatable.headers')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="header-title m-t-0 m-b-30">البريد</h4>

                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الإسم</th>
                        <th>الايميل</th>
                        <th>الهاتف</th>
                        <th>الرسالة</th>
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
                            <td>{{$item->message}}</td>
                            <td>
                                @if(auth('admin')->user()->can('contact-list'))
                                @include('admin.contact.reply-modal')
                                    @endif

                                    @if(auth('admin')->user()->can('contact-delete'))
                                <a data-url="{{ route('admin.contacts.destroy', $item) }}"
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
