{{--@include('admin.common.errors')--}}
<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">السؤال باللغة العربية</label>
            <div class="col-md-10">
                {!! Form::text("question[ar]",(isset($item) ? $item: new \App\Models\CommonQuestion())->getTranslation('question',
        'ar'),['class'=>'form-control','placeholder'=>'  السؤال باللغة العربية  '])!!}
                @error('question.ar')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">السؤال باللغة الإنجليزية</label>
            <div class="col-md-10">
                {!! Form::text("question[en]",(isset($item) ? $item: new \App\Models\CommonQuestion())->getTranslation('question',
        'en'),['class'=>'form-control','placeholder'=>'  السؤال باللغة الإنجليزية  '])!!}
                @error('question.en')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">الإجابة باللغة العربية</label>
            <div class="col-md-10">
                {!! Form::textarea("answer[ar]",(isset($item) ? $item: new \App\Models\CommonQuestion())->getTranslation('answer',
          'ar'),['class'=>'form-control editor','placeholder'=>'  الإجابة باللغة العربية  '])!!}
                @error('answer.ar')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">الإجابة باللغة الإنجليزية</label>
            <div class="col-md-10">
                {!! Form::textarea("answer[en]",(isset($item) ? $item: new \App\Models\CommonQuestion())->getTranslation('answer',
          'en'),['class'=>'form-control editor','placeholder'=>'  الإجابة باللغة الإنجليزية  '])!!}
                @error('answer.en')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-xs-12">

        <div class="input-group-btn">
            <button type="submit" class="btn waves-effect waves-light btn-primary">حفظ</button>
        </div>
    </div>
</div>
@push('scripts')
<script>

    $(document).ready(function () {

        CKEDITOR.replaceClass = 'editor';

        $('.words').select2({
            // alert("hi");
            tags: true,
            // tokenSeparators: [',', ' ']
        });
    });
</script>
@endpush
