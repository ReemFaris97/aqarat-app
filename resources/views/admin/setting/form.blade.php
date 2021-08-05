@extends('admin.layout.app')

@section('title')
    {{$settings_page}}
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1> التحكم ب{{$settings_page}}</h1>
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">اضافة الأسئلة الشائعة </h4>
                <form method="post" action="{{ route('admin.settings.store') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        @foreach($settings as $setting)

                            @if($setting->type == 'text')
                                <div class="form-group col-md-6">
                                    <label for="" class="col-form-label">{{$setting->title}} </label>
                                    {!! Form::text($setting->name.'[]',$setting->ar_value,['class'=>'form-control'])!!}
                                </div>
                            @elseif($setting->type == 'email')
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="form-label">{{$setting->title}}</label>
                                    <div class="form-line">
                                        {!! Form::text($setting->name.'[]',$setting->ar_value,['class'=>'form-control'])!!}
                                    </div>
                                </div>

                            @elseif($setting->type == 'url')
                                <div class="form-group row mb-4{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{$setting->title}}</label>
                                    <div class="col-sm-12 col-md-7">
                                        {!! Form::url($setting->name.'[]',$setting->ar_value,['class'=>'form-control'])!!}
                                    </div>
                                </div>
                            @elseif($setting->type == 'image')
                                <div class="form-group row mb-4{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="form-label">{{$setting->title}}</label>
                                    <div class="form-line">
                                        {!! Form::file($setting->name,['class'=>'form-control'])!!}
                                    </div>
                                </div>
                            @elseif($setting->type == 'number')
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="form-label">{{$setting->title}}</label>
                                    <div class="form-line">
                                        {!! Form::text($setting->name.'[]',$setting->ar_value,['class'=>'form-control'])!!}
                                    </div>
                                </div>

                            @elseif($setting->type == 'social')
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="form-label">{{$setting->title}}</label>
                                    <div class="form-line">
                                        {!! Form::text($setting->name.'[]',$setting->ar_value,['class'=>'form-control'])!!}
                                    </div>
                                </div>

                            @elseif($setting->type == 'radio' && $setting->slug == 'payment_methods')
                                <div class="form-group row mb-4{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{$setting->title}} </label>
                                    {!! Form::radio($setting->name.'[]',0,$setting->ar_value==0?true:false,['class'=>'form-control','id'=>$setting->id.'-0'])!!}
                                    <label for="{{$setting->id.'-0'}}"
                                           class="col-form-label text-md-right col-12 col-md-3 col-lg-3">غير
                                        مفعل</label>
                                    {!! Form::radio($setting->name.'[]',1,$setting->ar_value==1?true:false,['class'=>'form-control','id'=>$setting->id.'-1'])!!}
                                    <label for="{{$setting->id.'-1'}}"
                                           class="col-form-label text-md-right col-12 col-md-3 col-lg-3">مفعل</label>
                                    <div class="form-line"></div>
                                </div>

                            @elseif($setting->type == 'radio')
                                <div class="form-group row mb-4{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="form-label">{{$setting->title}} </label>
                                    {!! Form::radio($setting->name.'[]',0,$setting->ar_value==0?true:false,['class'=>'form-control','id'=>'static'])!!}
                                    <label for="static"
                                           class="col-form-label text-md-right col-12 col-md-3 col-lg-3">ثابت</label>
                                    {!! Form::radio($setting->name.'[]',1,$setting->ar_value==1?true:false,['class'=>'form-control','id'=>'dynamic'])!!}
                                    <label for="dynamic"
                                           class="col-form-label text-md-right col-12 col-md-3 col-lg-3">متحرك</label>
                                    <div class="form-line"></div>
                                </div>




                            @elseif($setting->type == 'radio_2')
                                <div class="form-group row mb-4{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{$setting->title}} </label>
                                    {!! Form::radio($setting->name.'[]',0,$setting->ar_value==0?true:false,['class'=>'form-control','id'=>'static'])!!}
                                    <label for="static"
                                           class="col-form-label text-md-right col-12 col-md-3 col-lg-3">نعم</label>
                                    {!! Form::radio($setting->name.'[]',1,$setting->ar_value==1?true:false,['class'=>'form-control','id'=>'dynamic'])!!}
                                    <label for="dynamic"
                                           class="col-form-label text-md-right col-12 col-md-3 col-lg-3">لا</label>
                                    <div class="form-line"></div>
                                </div>
                            @else
                                <div class="form-group row mb-4{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{$setting->title}}
                                        (ar)</label>
                                    <div class="col-sm-12 col-md-7">
                                        {!! Form::textarea($setting->name.'[]',$setting->ar_value,['class'=>'form-control editor'])!!}
                                    </div>
                                </div>

                                <div class="form-group row mb-4{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{$setting->title}}
                                        (en)</label>
                                    <div class="col-sm-12 col-md-7">
                                        {!! Form::textarea($setting->name.'[]',$setting->en_value,['class'=>'form-control editor'])!!}
                                    </div>
                                </div>

                            @endif

                        @endforeach

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button type="submit" class="btn btn-primary">حفظ</button>
                                <a href="{{ url()->previous() }}" class="btn btn-outline-dark">إلغاء</a>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div><!-- end col -->
    </div>
@endsection
