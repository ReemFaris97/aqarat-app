@extends('admin.layout.app')

@section('title')
    جميع الإعلانات
@endsection
@section('header')
    @include('admin.datatable.headers')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="header-title m-t-0 m-b-30">كل الإعلانات</h4>

                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>عنوان الإعلان</th>
                        <th>صورة الإعلان</th>
                        <th>عدد المشاهدات</th>
                        <th>تاريخ الإضافة</th>
                        <th>اسم المستخدم</th>
                        <th>اسم المدينة</th>
                        <th>اسم الحى</th>
                        <th>حالة الإعلان</th>
                        <th>تغيير حالة الإعلان</th>
                        <th>صور اضافية</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($items as $key=>$item)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                @if($item->image)
                                    <a data-fancybox="gallery{{$item->id}}" href="{{$item->image}}">
                                        <img src="{{$item->image}}" width="70" height="70"
                                             class="img-thumbnail" alt="adv_img">
                                    </a>
                                @else {{__('No Image')}} @endif
                            </td>
                            <td>{{$item->views_counter}}</td>
                            <td>{{$item->created_at ?? $item->updated_at}}</td>
                            <td><a href="{{route('admin.users.show',$item->user->id)}}">{{$item->user->name}}</a></td>
                            <td>{{$item->neighborhood->city->name}}</td>
                            <td>{{$item->neighborhood->name}}</td>
                            <td>{{AccountStatus($item->is_active)}}</td>
                            <td>
                                @if(auth('admin')->user()->can('advertisings-edit'))
                                    @if ($item->is_active == 1)
                                        <a class="btn btn-danger"
                                           href="{{ route('admin.advertisers.status', $item->id) }}">
                                            تعطيل</a>
                                    @else
                                        <a href="{{ route('admin.advertisers.status', $item->id) }}"
                                           class="btn btn-success">
                                            تفعيل </a>
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if(count($item->getMedia('photos')) > 0)
                                    @include('admin.advertisings.photos_modal')
                                @else
                                    لا يوجد
                                @endif
                            </td>
                            <td>
{{--                                @if(auth('admin')->user()->can('advertisings-edit'))--}}
{{--                                    <a href="{{route('admin.advertisings.edit',$item->id)}}"--}}
{{--                                       class="btn btn-info btn-circle"><i style="padding-top:5px;padding-left: 6px;"--}}
{{--                                                                          class="fa fa-pencil"></i></a>--}}
{{--                                @endif--}}

                                @if(auth('admin')->user()->can('advertising-delete'))
                                    <a data-url="{{ route('admin.advertising.destroy', $item) }}"
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
