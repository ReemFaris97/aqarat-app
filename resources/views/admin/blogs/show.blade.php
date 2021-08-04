@extends('admin.layout.app')

@section('title')
    جميع تعليقات المدونة {{$blog->title}}
@endsection
@section('header')
    @include('admin.datatable.headers')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="header-title m-t-0 m-b-30">  جميع تعليقات المدونة {{$blog->title}}</h4>

                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم المستخدم</th>
                        <th>صورة المستخدم</th>
                        <th>التعليق</th>
                        <th>التاريخ</th>
                        <th>اخفاء</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($items as $key=>$item)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$item->user->name}}</td>
                            <td>
                                <img src="{{$item->user->image}}" style="width: 50px; height: 50px">
                            </td>
                            <td>{{$item->text}}</td>

                            <td>{{$item->created_at}}</td>
                            <td>
                                @if(auth('admin')->user()->can('blogs-edit'))
                                    @if ($item->is_visible == 1)
                                        <a href="{{ route('admin.comments.status', $item->id) }}"
                                           class="btn btn-success">
                                            اظهار </a>
                                    @else
                                        <a class="btn btn-danger"
                                           href="{{ route('admin.comments.status', $item->id) }}">
                                            اخفاء</a>

                                    @endif
                                @endif
                            </td>
                            <td>
                                @if(auth('admin')->user()->can('blogs-delete'))
                                    <a data-url="{{ route('admin.comments.destroy', $item) }}"
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
