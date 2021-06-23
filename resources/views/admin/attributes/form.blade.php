@include('admin.common.errors')
<div class="form-group">
    <label class="col-md-2 control-label">الاسم باللغة العربية</label>
    <div class="col-md-10">
        {!! Form::text("name[ar]",(isset($item) ? $item: new \App\Models\Attribute())->getTranslation('name',
        'ar'),['class'=>'form-control','placeholder'=>'  الاسم باللغة العربية  '])!!}
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">الإسم باللغة الإنجليزية</label>
    <div class="col-md-10">
        {!! Form::text("name[en]",(isset($item) ? $item: new \App\Models\Attribute())->getTranslation('name',
     'en'),['class'=>'form-control','placeholder'=>'  الاسم باللغة الإنجليزية  '])!!}
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">نوع الخاصية</label>
    <div class="col-md-10">
        {!! Form::select("type",AttributeType(),null,['class'=>'form-control','placeholder'=>'اختر نوع الخاصية','required',"data-parsley-required-message"=>"هذا الحقل مطلوب"])!!}
    </div>
</div>
<span class="input-group-btn">
    <button type="submit" class="btn waves-effect waves-light btn-primary">حفظ</button>
</span>
