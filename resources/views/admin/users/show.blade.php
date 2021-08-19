@extends('admin.layout.app')

@section('title')
    جميع بيانات المستخدم {{$user->name}}
@endsection
@section('header')
    @include('admin.datatable.headers')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="header-title m-t-0 m-b-30">  جميع بيانات المستخدم {{$user->name}}</h4>

                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>اسم المستخدم</th>
                        <th>العروض والطلبات</th>
                        <th>اعلانات المستخدم</th>
                        <th>التعليقات المستخدم</th>
                    </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>
                                @foreach($user->orders as $order)

                               <li>
                                   <a href="{{route('admin.orders.show',$order->id)}}">{{$order->name}} </a>
                                   <span> {{orderType($order->is_special)}}</span>
                               </li>
                                @endforeach
                            </td>
                            <td>
                                @foreach($user->advertisements as $adv)
                                    <li><a href="{{route('admin.advertising.show',$adv->id)}}">{{$adv->name}}  </a>
                                        <span> {{orderType($order->is_special)}}</span>
                                    </li>
                                @endforeach
                            </td>
                            <td>
                                @foreach($user->comments as $comment)
                               <li>{{$comment->text}}</li>
                                @endforeach
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div><!-- end col -->
        <div class="col-lg-4 col-md-12">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">تصنيفات العروض</h4>

                <div id="orders-chart"></div>

            </div>
        </div><!-- end col -->
        <div class="col-lg-4 col-md-12">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">احصائية العروض والطلبات</h4>

                <div id="orders-in-days"></div>

            </div>
        </div><!-- end col -->
        <div class="col-lg-4 col-md-12">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">احصائية الاعلانات</h4>

                <div id="advertisements-in-days"></div>

            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->

@endsection
@section('footer')
    @include('admin.datatable.scripts')
@endsection
@push('scripts')
    <script>
        console.log( @json($orders_in_day))
        Morris.Donut({
            element: 'orders-chart',
            data: @json($orders_category),
            resize: true
        });
        Morris.Line({
            element: 'orders-in-days',
            data:@json($orders_in_day),
            xkey: 'date_created_at',
            ykeys: ['orders'],
            labels: ['العدد'],
            parseTime: false,
            resize: true

        });
        Morris.Line({
            element: 'advertisements-in-days',
            data:@json($advertisements_in_day),
            xkey: 'date_created_at',
            ykeys: ['advertisements'],
            labels: ['العدد'],
            parseTime: false,
            resize: true

        });
    </script>
@endpush
