@extends('admin.layout.app')

@section('title')
    الإعدادات
@endsection



@section('content')

    <div class="card-box">
        <h4 class="mt-0 header-title">عرض الإعدادات العامة</h4>


        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12 col-md-6">

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                colspan="1" aria-sort="ascending">ID
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                اسم الصفحة
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                العمليات
                            </th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach ($settings as $key=>$item)
                            <tr role="row" class="odd" id="row-{{$key}}">
                                <td tabindex="0" class="sorting_1">{{++$key}}</td>
                                <td>{{ $item}}</td>
                                <td>
{{--                                    @if(auth('admin')->user()->can('setting-list'))--}}
                                        <a href="{{ route('admin.settings.show', $item) }}" class="btn btn-info">عرض
                                            التفاصيل</a>
{{--                                    @endif--}}
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>


                </div>
            </div>

        </div>
    </div>


@endsection

@section('footer')
    @include('admin.datatable.scripts')
@endsection
