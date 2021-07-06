@include('admin.common.errors')
<div class="row">
    <div class="col-xs-12">
<div class="form-group">
    <label class="col-md-2 control-label">الاسم باللغة العربية</label>
    <div class="col-md-10">
        {!! Form::text("name[ar]",(isset($item) ? $item: new \App\Models\City())->getTranslation('name',
        'ar'),['class'=>'form-control','placeholder'=>'  الاسم باللغة العربية  '])!!}
    </div>
</div>
</div>
    <div class="col-xs-12">
<div class="form-group">
    <label class="col-md-2 control-label">الإسم باللغة الإنجليزية</label>
    <div class="col-md-10">
        {!! Form::text("name[en]",(isset($item) ? $item: new \App\Models\City())->getTranslation('name',
     'en'),['class'=>'form-control','placeholder'=>'  الاسم باللغة الإنجليزية  '])!!}
    </div>
</div>
</div>

<div class="col-xs-12">
<div class="form-group">
    <label class="col-md-2 control-label">اسم المدينة</label>
    <div class="col-md-10">
        {!! Form::select("city_id",city(),null,['class'=>'form-control','placeholder'=>'اختر اسم المدينة','required',"data-parsley-required-message"=>"هذا الحقل مطلوب"])!!}
    </div>
</div>
</div>

<div class="col-xs-12">
<div class="input-group-btn">
    <button type="submit" class="btn waves-effect waves-light btn-primary">حفظ</button>
</div>
</div>
</div>
