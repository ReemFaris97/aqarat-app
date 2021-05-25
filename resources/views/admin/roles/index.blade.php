@extends('admin.layout.app')

@section('title')
    الصلاحيات
@endsection
@section('content')

    <div class="card-box">
        <p class="text-muted font-14 mb-3">
            <a href="{{ route('admin.roles.create') }}" class="btn btn-info">اضافة جديد</a>
        </p>

        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1"
                                colspan="1" aria-sort="ascending">ID
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                الاسم
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1">
                                العمليات
                            </th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach ($roles as $item)
                            <tr role="row" class="odd" id="row-{{ $item->id }}">
                                <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>

                                <td>
                                    @if(auth('admin')->user()->can('role-edit'))
                                        <a href="{{ route('admin.roles.edit', $item) }}"
                                           class="btn btn-info">تعديل</a>
                                    @endif

                                    @if(auth('admin')->user()->can('role-delete'))
                                        <a class="btn btn-danger" data-name="{{ $item->name }}"
                                           data-url="{{ route('admin.roles.destroy', $item) }}"
                                           onclick="delete_form(this)">
                                            حذف
                                        </a>
                                    @endif
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
