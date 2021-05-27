@include('admin.common.errors')
<div class="form-group">
    <label class="col-md-2 control-label">العنوان</label>
    <div class="col-md-10">
        {!! Form::text("title",null,['class'=>'form-control','placeholder'=>'  العنوان  '])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">عدد المشاهدات</label>
    <div class="col-md-10">
        {!! Form::number("views",null,['class'=>'form-control','placeholder'=>'  عدد المشاهدات  ','readonly'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">الوصف</label>
    <div class="col-md-10">
        {!! Form::textarea("description",null,['class'=>'form-control','placeholder'=>'  الوصف  '])!!}
    </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label">اسم المستخدم</label>
    <div class="col-md-10">
        {!! Form::select("user_id",users(),null,['class'=>'form-control','placeholder'=>'اختر اسم المستخدم','required',"data-parsley-required-message"=>"هذا الحقل مطلوب"])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">اسم المدينة</label>
    <div class="col-md-10">
        {!! Form::select("city_id",city(),null,['class'=>'form-control','placeholder'=>'اختر اسم المدينة','required',"data-parsley-required-message"=>"هذا الحقل مطلوب"])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">اسم الحى</label>
    <div class="col-md-10">
        {!! Form::select("neighborhood_id",neighborhood(),null,['class'=>'form-control','placeholder'=>'اختر اسم الحى','required',"data-parsley-required-message"=>"هذا الحقل مطلوب"])!!}
    </div>
</div>
@if (isset($item->image))
    <div class="form-group">
        <label class="col-md-2 control-label">الصورة الحالية للإعلان :</label>
        <div class="col-md-10">
            <img class="img-preview" src="{{$item->image}}" style="width: 50px; height: 50px">
        </div>
    </div>
@endif

<div class="form-group">
    <label class="col-md-2 control-label">صورة الإعلان </label>
    <div class="col-md-10">
        {!! Form::file("image",null,['class'=>'form-control'])!!}
    </div>
</div>

<span class="input-group-btn">
    <button type="submit" class="btn waves-effect waves-light btn-primary">حفظ</button>
</span>
