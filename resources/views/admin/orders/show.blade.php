@extends('admin.layout.app')

@section('title')
    جميع بيانات الطلب {{$order->name}}
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
                <td>  {{$order->name}} </td>
            </tr>
            <tr>
                <th class="font-weight-bold"> الصورة</th>
                <td>
                    <img src="{{$order->image}}" style="width: 50px; height: 50px">
                </td>
            </tr>
            <tr>
                <th class="font-weight-bold"> العميل</th>
                <td>  {{$order->user->name}} </td>
            </tr>
            <tr>
                <th class="font-weight-bold"> التصنيف</th>
                <td>  {{$order->category->name}} </td>
            </tr>
            <tr>
                <th class="font-weight-bold"> الحى</th>
                <td>  {{$order->neighborhood->name}} </td>
            </tr>
            <tr>
                <th class="font-weight-bold">العقد</th>
                <td>  {{__($order->contract)}} </td>
            </tr>
            <tr>
                <th class="font-weight-bold">النوع</th>
                <td>  {{__($order->type)}} </td>
            </tr>
            <tr>
                <th class="font-weight-bold">المعلن</th>
                <td>  {{__($order->advertiser)}} </td>
            </tr>
            <tr>
                <th class="font-weight-bold">العنوان</th>
                <td>  {{__($order->address)}} </td>
            </tr>

            <tr>
                <th class="font-weight-bold">السعر</th>
                <td>  {{__($order->price)}} </td>
            </tr>

            <tr>
                <th class="font-weight-bold">الوصف</th>
                <td>
                    <p style="white-space: pre-line;overflow-wrap: anywhere;text-overflow: ellipsis;">{{$order->description}}</p>
                </td>
            </tr>

            <tr>
                <th class="font-weight-bold">التاريخ</th>
                <td> {{$order->created_at->format('Y-m-d')}}</td>
            </tr>

            <tr>
                <th class="font-weight-bold">الخصائص</th>
                <td>
                    @foreach($order->attributes as $attr)
                        <li>
                            {{$attr->name}}
                        </li>
                    @endforeach
                </td>
            </tr>

            <tr>
                <th class="font-weight-bold">الخدمات</th>
                <td>
                    @foreach($order->utilities as $utility)
                        <li>
                            {{$utility->name}}
                        </li>
                    @endforeach
                </td>
            </tr>
            @if($order->special_until)
                <tr>
                    <th class="font-weight-bold">طلب مميز</th>
                    <td>
                        @if($order->special_until->greaterThanOrEqualTo(now()))
                            <p>مميز حتى تاريخ : {{$order->special_until->format('Y-m-d')}}</p>
                        @else
                            غير مميز
                        @endif
                    </td>
                </tr>
            @endif

        </table>
    </div>
</div>

@endsection
@section('footer')
    @include('admin.datatable.scripts')
@endsection
