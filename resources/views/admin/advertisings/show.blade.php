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
                    <th class="font-weight-bold"> الصورة</th>
                    <td>
                        <img src="{{$advertising->image}}" style="width: 50px; height: 50px">
                    </td>
                </tr>
                <tr>
                    <th class="font-weight-bold"> العميل</th>
                    <td>  {{$advertising->user->name}} </td>
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
                    <th class="font-weight-bold">الوصف</th>
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

            </table>
        </div>
    </div>

@endsection
@section('footer')
    @include('admin.datatable.scripts')
@endsection
