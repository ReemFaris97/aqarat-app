@extends('admin.layout.app')

@section('title')
    الصفحه الرئيسه
@stop

@section('content')
    <div class="row">

        <div class="col-lg-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">عدد أعضاء الإدارة</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                               data-bgColor="#AAE2C6" value="{{App\Models\Admin::count()}}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{App\Models\Admin::count()}} </h2>
                        <p class="text-muted">عضو إدارة</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-lg-3 col-md-6">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">عدد المستخدمين</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                               data-bgColor="#F9B9B9" value="{{App\Models\User::count()}}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{App\Models\User::count()}} </h2>
                        <p class="text-muted">مستخدم</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-lg-3 col-md-6">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">عدد المدن</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                               data-bgColor="#B8E6F4" value=" {{App\Models\City::count()}}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0">  {{App\Models\User::count()}} </h2>
                        <p class="text-muted">مدينة</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->


        <div class="col-lg-3 col-md-6">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">عدد الأحياء</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                               data-bgColor="#D0E8F9" value=" {{App\Models\Neighborhood::count()}}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0">  {{App\Models\Neighborhood::count()}} </h2>
                        <p class="text-muted">حى</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->


        <div class="col-lg-3 col-md-6">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">عدد الإعلانات</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                               data-bgColor="#B8E6F4" value=" {{App\Models\Advertisement::count()}}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0">  {{App\Models\Advertisement::count()}} </h2>
                        <p class="text-muted">إعلان</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-lg-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">عدد المدونات</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                               data-bgColor="#AAE2C6" value="{{App\Models\Blog::count()}}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0"> {{App\Models\Blog::count()}} </h2>
                        <p class="text-muted">مدونة</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-lg-3 col-md-6">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">عدد الأسئلة الشائعة</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1">
                        <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                               data-bgColor="#ebd7b4" value=" {{App\Models\CommonQuestion::count()}}"
                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                               data-thickness=".15"/>
                    </div>

                    <div class="widget-detail-1">
                        <h2 class="p-t-10 m-b-0">  {{App\Models\CommonQuestion::count()}} </h2>
                        <p class="text-muted">سؤال</p>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>

@stop
