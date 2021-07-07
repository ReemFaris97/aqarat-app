@extends('admin.layout.app')

@section('title')
    جميع التصنيفات
@endsection
@section('header')
    @include('admin.datatable.headers')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="header-title m-t-0 m-b-30">كل التصنيفات</h4>

                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم التصنيف</th>
                        <th>صورة التصنيف</th>
                        <th>خصائص التصنيف</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($items as $key=>$item)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <img src="{{$item->image}}" style="width: 50px; height: 50px">
                            </td>
                            <td>
                                @if(count($item->attributes) > 0)
                                    @foreach($item->attributes as $attr)
                                        <li>
                                            {{$attr->name}}
                                        </li>
                                    @endforeach
                                @endif
                            </td>

                            <td>
                                @if(auth('admin')->user()->can('categories-edit'))
                                    <a href="{{route('admin.categories.edit',$item->id)}}"
                                       class="btn btn-info btn-circle"><i style="padding-top:5px;padding-left: 6px;"
                                                                          class="fa fa-pencil"></i></a>
                                @endif
                                @if(auth('admin')->user()->can('categories-delete'))

                                    <a data-url="{{ route('admin.categories.destroy', $item) }}"
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
