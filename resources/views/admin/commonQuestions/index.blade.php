@extends('admin.layout.app')

@section('title')
  جميع الأسئلة الشائعة
@endsection
@section('header')
    @include('admin.datatable.headers')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="header-title m-t-0 m-b-30">كل الأسئلة الشائعة</h4>

                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>السؤال</th>
                        <th>الإجابة</th>
                        <th>حالة السؤال</th>
                        <th>تغيير حالة السؤال</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($items as $key=>$item)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$item->question}}</td>
                            <td>{{$item->answer}}</td>
                            <td>{{AccountStatus($item->status)}}</td>
                            <td>
                                @if ($item->status == 1)
                                    <a class="btn btn-danger"
                                       href="{{ route('admin.commonQuestions.status', $item->id) }}">
                                        تعطيل</a>
                                @else
                                    <a href="{{ route('admin.commonQuestions.status', $item->id) }}"
                                       class="btn btn-success">
                                        تفعيل </a>
                                @endif
                            </td>
                            <td>

                                <a href="{{route('admin.commonQuestions.edit',$item->id)}}"
                                   class="btn btn-info btn-circle"><i style="padding-top:5px;padding-left: 6px;"
                                                                      class="fa fa-pencil"></i></a>
                                <a data-url="{{ route('admin.commonQuestions.destroy', $item) }}"
                                   onclick="delete_form(this)" data-name="{{ $item->question }}" data-toggle="tooltip"
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
