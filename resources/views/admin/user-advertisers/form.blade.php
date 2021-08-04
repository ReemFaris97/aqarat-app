{{--@include('admin.common.errors')--}}
<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">العنوان</label>
            <div class="col-md-10">
                {!! Form::text("name",null,['class'=>'form-control','placeholder'=>'  العنوان  '])!!}
                @error('name')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">عدد المشاهدات</label>
            <div class="col-md-10">
                {!! Form::number("views",null,['class'=>'form-control','placeholder'=>'  عدد المشاهدات  ','readonly'])!!}
                @error('views')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">الوصف</label>
            <div class="col-md-10">
                {!! Form::textarea("description",null,['rows'=>3,'class'=>'form-control','placeholder'=>'  الوصف  '])!!}
                @error('description')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>


    {{--    <div class="col-xs-12">--}}
    {{--        <div class="form-group">--}}
    {{--            <label class="col-md-2 control-label">اسم المستخدم</label>--}}
    {{--            <div class="col-md-10">--}}
    {{--                {!! Form::select("user_id",$users,null,['class'=>'form-control','placeholder'=>'اختر اسم المستخدم','required',"data-parsley-required-message"=>"هذا الحقل مطلوب"])!!}--}}
    {{--                @error('user_id')--}}
    {{--                <div class="invalid-feedback" style="color: #ef1010">--}}
    {{--                    {{ $message }}--}}
    {{--                </div>--}}
    {{--                @enderror--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    {{--<div class="form-group">--}}
    {{--    <label class="col-md-2 control-label">اسم المدينة</label>--}}
    {{--    <div class="col-md-10">--}}
    {{--        {!! Form::select("city_id",$cities,null,['class'=>'form-control','placeholder'=>'اختر اسم المدينة','required',"data-parsley-required-message"=>"هذا الحقل مطلوب"])!!}--}}
    {{--    </div>--}}
    {{--</div>--}}

    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">اسم الحى</label>
            <div class="col-md-10">
                {!! Form::select("neighborhood_id",$neighborhoods,null,['class'=>'form-control','placeholder'=>'اختر اسم الحى','required',"data-parsley-required-message"=>"هذا الحقل مطلوب"])!!}
                @error('neighborhood_id')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        @if (isset($advertising->image))
            <div class="form-group">
                <label class="col-md-2 control-label">الصورة الحالية للإعلان :</label>
                <div class="col-md-10">
                    <a data-fancybox="gallery" href="{{$advertising->image}}">
                        <img src="{{$advertising->image}}" width="70" height="70"
                             class="img-thumbnail" alt="adv_img">
                    </a>
                </div>
            </div>
        @endif
    </div>


    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">صورة الإعلان </label>
            <div class="col-md-10">
                {!! Form::file("image",['class'=>'form-control'])!!}
                @error('image')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="form-group row">
            <label class="col-sm-2 control-label">صور اضافية </label>
            <div class="col-sm-4">
                {!! Form::file('photos[]',['class' =>'form-control '.($errors->has('photos') ? ' is-invalid' : null),'multiple'=>true ]) !!}
                @error('photos')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group row">
            <p class="msg alert alert-success  text-center" style="display: none;margin-bottom: 10px;">
                تم حذف الصورة بنجاح
            </p>
            @isset($advertising)

                @if(count($advertising->getMedia('photos')) > 0)
                    @foreach($advertising->getMedia('photos') as $photo)
                        <div class="row photo{{$photo->id}}">
                            <div class="col-md-6 text-right">
                                <a data-fancybox="gallery" href="{{$photo->getUrl()}}">
                                    <img src="{{$photo->getUrl()}}" width="100" height="100"
                                         class="img-thumbnail">
                                </a>
                            </div>
                            <div class="col-md-6 text-left">
                                <a class="btn btn-icon btn-danger del_photo btn-sm"
                                   data-id="{{$photo->id}}">
                                    <i class="fa fa-trash text-white"></i></a>
                            </div>
                        </div>
                    @endforeach
                @else لا يوجد صور @endif
            @endisset
        </div>
    </div>
    <div class="input-group-btn">
        <button type="submit" class="btn waves-effect waves-light btn-primary">حفظ</button>
    </div>
</div>
