@include('admin.common.errors')
<div class="form-group">
    <label class="col-md-2 control-label">السؤال باللغة العربية</label>
    <div class="col-md-10">
        {!! Form::text("question[ar]",(isset($item) ? $item: new \App\Models\CommonQuestion())->getTranslation('question',
'ar'),['class'=>'form-control','placeholder'=>'  السؤال باللغة العربية  '])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">السؤال باللغة الإنجليزية</label>
    <div class="col-md-10">
        {!! Form::text("title[en]",(isset($item) ? $item: new \App\Models\CommonQuestion())->getTranslation('question',
'en'),['class'=>'form-control','placeholder'=>'  السؤال باللغة الإنجليزية  '])!!}
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">الإجابة باللغة العربية</label>
    <div class="col-md-10">
        {!! Form::textarea("answer[ar]",(isset($item) ? $item: new \App\Models\CommonQuestion())->getTranslation('answer',
  'ar'),['class'=>'form-control','placeholder'=>'  الإجابة باللغة العربية  '])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">الإجابة باللغة الإنجليزية</label>
    <div class="col-md-10">
        {!! Form::textarea("answer[en]",(isset($item) ? $item: new \App\Models\CommonQuestion())->getTranslation('answer',
  'en'),['class'=>'form-control','placeholder'=>'  الإجابة باللغة الإنجليزية  '])!!}
    </div>
</div>


<span class="input-group-btn">
    <button type="submit" class="btn waves-effect waves-light btn-primary">حفظ</button>
</span>
