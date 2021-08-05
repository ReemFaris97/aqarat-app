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
                        <th>طلبات المستخدم</th>
                        <th>اعلانات المستخدم</th>
                        <th>كومنتات المستخدم</th>
                    </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>
                                @foreach($user->orders as $order)

                               <li><a href="{{route('admin.orders.show',$order->id)}}">{{$order->name}}</a></li>
                                @endforeach
                            </td>
                            <td>
                                @foreach($user->advertisements as $adv)
                                    <li><a href="{{route('admin.advertising.show',$adv->id)}}">{{$adv->name}}</a></li>
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
    </div>
    <!-- end row -->

@endsection
@section('footer')
    @include('admin.datatable.scripts')
@endsection
