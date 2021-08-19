@extends('admin.layout.app')

@section('title')
    جميع بيانات الإعلان {{$advertising->name}}
@endsection
@section('header')
    @include('admin.datatable.headers')
@endsection
@section('content')
    <div class="row">
        <div class="col-12 ">
            <table class="table table-bordered table-responsive table-striped text-center">
                <tr>
                    <th class="font-weight-bold"> الاسم</th>
                    <td>  {{$advertising->name}} </td>
                </tr>
                <tr>
                    <th class="font-weight-bold"> عدد المشاهدات</th>
                    <td>  {{(int)$advertising->views_counter}} </td>
                </tr>
                <tr>
                    <th class="font-weight-bold"> الصورة</th>
                    <td>
                        <img src="{{$advertising->image}}" style="width: 70px; height: 70px">
                    </td>
                </tr>
                <tr>
                    <th class="font-weight-bold"> المعلن</th>
                    <td>  <a href="{{route('admin.users.show',$advertising->user->id)}}">{{$advertising->user->name}}</a> </td>
                </tr>

                <tr>
                    <th class="font-weight-bold"> المدينة</th>
                    <td>  {{$advertising->neighborhood->city->name}} </td>
                </tr>
                <tr>
                    <th class="font-weight-bold"> الحى</th>
                    <td>  {{$advertising->neighborhood->name}} </td>
                </tr>
                <tr>
                    <th class="font-weight-bold">العنوان</th>
                    <td>  {{__($advertising->address)}} </td>
                </tr>
                <tr>
                    <th class="font-weight-bold">التفاصيل</th>
                    <td>  {{__($advertising->description)}} </td>
                </tr>
                <tr>
                    <th class="font-weight-bold">تم مراجعة الأدمن</th>
                    <td>  {{__($advertising->is_reviewed)}} </td>
                </tr>

                <tr>
                    <th class="font-weight-bold">التاريخ</th>
                    <td> {{$advertising->created_at->format('Y-m-d')}}</td>
                </tr>


                <tr>
                    <th class="font-weight-bold">مجموعة الصور</th>
                    <td>
                        @if($advertising->getMedia())
                            @foreach($advertising->getMedia() as $image)
                                <a data-fancybox="gallery{{$advertising->id}}" href="{{$image->getFullUrl()}}">
                                    <img src="{{$image->getFullUrl()}}" width="70" height="70"
                                         class="img-thumbnail" alt="adv_img">
                                </a>
                            @endforeach

                        @else {{__('No Image')}} @endif
                    </td>
                </tr>

            </table>
        </div>
    </div>

@endsection
@section('footer')
    @include('admin.datatable.scripts')
@endsection
