@include('admin.common.errors')
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-2 control-label">العنوان باللغة العربية</label>
            <div class="col-md-10">
                {!! Form::text("title[ar]",(isset($item) ? $item: new \App\Models\Blog())->getTranslation('title',
        'ar'),['class'=>'form-control','placeholder'=>'  العنوان باللغة العربية  '])!!}
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-2 control-label">العنوان باللغة الإنجليزية</label>
            <div class="col-md-10">
                {!! Form::text("title[en]",(isset($item) ? $item: new \App\Models\Blog())->getTranslation('title',
        'en'),['class'=>'form-control','placeholder'=>'  العنوان باللغة الإنجليزية  '])!!}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-2 control-label">المحتوى باللغة العربية</label>
            <div class="col-md-10">
                {!! Form::textarea("description[ar]",(isset($item) ? $item: new \App\Models\Blog())->getTranslation('description',
          'ar'),['class'=>'form-control','placeholder'=>'  المحتوى باللغة العربية  ','rows'=>3])!!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-2 control-label">المحتوى باللغة الإنجليزية</label>
            <div class="col-md-10">
                {!! Form::textarea("description[en]",(isset($item) ? $item: new \App\Models\Blog())->getTranslation('description',
          'en'),['class'=>'form-control','placeholder'=>'  المحتوى باللغة الإنجليزية  ','rows'=>3])!!}
            </div>
        </div>
    </div>
</div>



@if (isset($item->image))
    <div class="form-group">
        <label class="col-md-2 control-label">الصورة الحالية للمدونة :</label>
        <div class="col-md-10">
            <img class="img-preview" src="{{$item->image}}" style="width: 50px; height: 50px">
        </div>
    </div>
@endif

<div class="form-group">
    <label class="col-md-2 control-label">صورة للمدونة </label>
    <div class="col-md-10">
        {!! Form::file("image",null,['class'=>'form-control'])!!}
    </div>
</div>

<span class="input-group-btn">
    <button type="submit" class="btn waves-effect waves-light btn-primary">حفظ</button>
</span>
