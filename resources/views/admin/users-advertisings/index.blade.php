@extends('admin.layout.app')

@section('title')
    اعلانات المستخدمين
@endsection
@section('header')
    @include('admin.datatable.headers')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="header-title m-t-0 m-b-30 text-danger">الاعلانات التى يتم مراجعتها اولا من الادارة قبل نشرها
                    فى الادارة المختصة بها </h4>

                <table id="datatable-buttons" class="table table-striped table-bordered text-center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>عنوان الإعلان</th>
                        <th>صورة الإعلان</th>
                        {{--                        <th>عدد المشاهدات</th>--}}
                        <th>تاريخ الإضافة</th>
                        <th>اسم المستخدم</th>
                        <th>اسم المدينة</th>
                        <th>اسم الحى</th>
                        {{--                        <th>حالة الإعلان</th>--}}
                        {{--                        <th>تغيير حالة الإعلان</th>--}}
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
                                    <a data-fancybox="gallery" href="{{$item->image}}">
                                        <img src="{{$item->image}}" width="70" height="70"
                                             class="img-thumbnail" alt="adv_img">
                                    </a>
                                @else {{__('No Image')}} @endif
                            </td>
                            {{--                            <td>{{$item->views}}</td>--}}
                            <td>{{$item->created_at->toDateString() ?? $item->updated_at->toDateString()}}</td>
                            <td>{{$item->user->name}}</td>
                            <td>{{$item->neighborhood->city->name}}</td>
                            <td>{{$item->neighborhood->name}}</td>
                            {{--                            <td>{{AccountStatus($item->is_active)}}</td>--}}
                            {{--                            <td>--}}
                            {{--                                @if(auth('admin')->user()->can('advertisings-edit'))--}}
                            {{--                                    @if ($item->is_active == 1)--}}
                            {{--                                        <a class="btn btn-danger"--}}
                            {{--                                           href="{{ route('admin.advertisings.status', $item->id) }}">--}}
                            {{--                                            تعطيل</a>--}}
                            {{--                                    @else--}}
                            {{--                                        <a href="{{ route('admin.advertisings.status', $item->id) }}"--}}
                            {{--                                           class="btn btn-success">--}}
                            {{--                                            تفعيل </a>--}}
                            {{--                                    @endif--}}
                            {{--                                @endif--}}
                            {{--                            </td>--}}
                            <td>
                                @if(count($item->getMedia('photos')) > 0)
                                    @include('admin.users-advertisings.photos_modal')
                                @else
                                    لا يوجد
                                @endif
                            </td>
                            <td>

                                @if(auth('admin')->user()->can('advertisings-edit'))
                                    <a class="btn btn-success"
                                       href="{{ route('admin.advertisings.approved', $item->id) }}">
                                        اعتماد</a>
                                @endif

                                @if(auth('admin')->user()->can('advertisings-edit'))
                                    <a href="{{route('admin.users-advertisings.edit',$item->id)}}" title="تعديل"
                                       class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></a>
                                @endif

                                @if(auth('admin')->user()->can('advertisings-delete'))
{{--                                    <a data-url="{{ route('admin.users-advertisings.destroy', $item) }}"--}}
{{--                                       onclick="delete_form(this)" data-name="{{ $item->title }}" data-toggle="tooltip"--}}
{{--                                       data-original-title="حذف" class="btn btn-danger btn-circle"><i--}}
{{--                                            class="fa fa-trash-o"></i></a>--}}

                                        @include('admin.users-advertisings.delete-modal')
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
