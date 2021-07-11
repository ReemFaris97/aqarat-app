{{--@include('admin.common.errors')--}}
<div class="row">
<div class="col-xs-12">
<div class="form-group">
    <label class="col-md-2 control-label">العنوان</label>
    <div class="col-md-10">
        {!! Form::text("title",null,['class'=>'form-control','placeholder'=>'  العنوان  '])!!}
        @error('title')
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
        {!! Form::textarea("description",null,['class'=>'form-control','placeholder'=>'  الوصف  '])!!}
        @error('description')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
</div>


<div class="col-xs-12">
<div class="form-group">
    <label class="col-md-2 control-label">اسم المستخدم</label>
    <div class="col-md-10">
        {!! Form::select("user_id",$users,null,['class'=>'form-control','placeholder'=>'اختر اسم المستخدم','required',"data-parsley-required-message"=>"هذا الحقل مطلوب"])!!}
        @error('user_id')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
</div>

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
            <img class="img-preview" src="{{$advertising->image}}" style="width: 50px; height: 50px">
        </div>
    </div>
    </div>
@endif

<div class="col-xs-12">
<div class="form-group">
    <label class="col-md-2 control-label">صورة الإعلان </label>
    <div class="col-md-10">
        {!! Form::file("image",null,['class'=>'form-control'])!!}
        @error('image')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
</div>

<div class="input-group-btn">
    <button type="submit" class="btn waves-effect waves-light btn-primary">حفظ</button>
</div>
</div>
