@extends('admin.layout.app')

@section('title')
    إنشاء صلاحية جديد
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>إضافة صلاحية جديد</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-primary">الرجوع لكل الصلاحيات</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @include('admin.common.errors')
                    <div class="card">
                        <div class="card-header">
                            <h4>إضافة صلاحية جديد</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.roles.store') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @include('admin.roles.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
