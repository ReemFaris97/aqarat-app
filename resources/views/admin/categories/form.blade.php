@include('admin.common.errors')
<div class="form-group">
    <label class="col-md-2 control-label">الاسم باللغة العربية</label>
    <div class="col-md-10">
        {!! Form::text("name[ar]",(isset($item) ? $item: new \App\Models\Category())->getTranslation('name',
        'ar'),['class'=>'form-control','placeholder'=>'  الاسم باللغة العربية  '])!!}
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">الإسم باللغة الإنجليزية</label>
    <div class="col-md-10">
        {!! Form::text("name[en]",(isset($item) ? $item: new \App\Models\City())->getTranslation('name',
     'en'),['class'=>'form-control','placeholder'=>'  الاسم باللغة الإنجليزية  '])!!}
    </div>
</div>

@if (isset($item->image))
    <div class="form-group">
        <label class="col-md-2 control-label">الصورة الحالية   :</label>
        <div class="col-md-10">
            <img class="img-preview" src="{{$item->image}}" style="width: 50px; height: 50px">
        </div>
    </div>
@endif

<div class="form-group">
    <label class="col-md-2 control-label">الصورة </label>
    <div class="col-md-10">
        {!! Form::file("image",null,['class'=>'form-control'])!!}
    </div>
</div>

<span class="input-group-btn">
    <button type="submit" class="btn waves-effect waves-light btn-primary">حفظ</button>
</span>
