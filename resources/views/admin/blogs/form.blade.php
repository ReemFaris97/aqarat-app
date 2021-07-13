{{--@include('admin.common.errors')--}}
<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">العنوان باللغة العربية</label>
            <div class="col-md-10">
                {!! Form::text("title[ar]",(isset($item) ? $item: new \App\Models\Blog())->getTranslation('title',
        'ar'),['class'=>'form-control','placeholder'=>'  العنوان باللغة العربية  '])!!}
                @error('title.ar')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">العنوان باللغة الإنجليزية</label>
            <div class="col-md-10">
                {!! Form::text("title[en]",(isset($item) ? $item: new \App\Models\Blog())->getTranslation('title',
        'en'),['class'=>'form-control','placeholder'=>'  العنوان باللغة الإنجليزية  '])!!}
                @error('title.en')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">المحتوى باللغة العربية</label>
            <div class="col-md-10">
                {!! Form::textarea("description[ar]",(isset($item) ? $item: new \App\Models\Blog())->getTranslation('description',
          'ar'),['class'=>'form-control ck-editor','placeholder'=>'  المحتوى باللغة العربية  '])!!}
                @error('description.ar')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">المحتوى باللغة الإنجليزية</label>
            <div class="col-md-10">
                {!! Form::textarea("description[en]",(isset($item) ? $item: new \App\Models\Blog())->getTranslation('description',
          'en'),['class'=>'form-control ck-editor','placeholder'=>'  المحتوى باللغة الإنجليزية  '])!!}
                @error('description.en')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>


    @if (isset($item->image))
        <div class="col-xs-12">
            <div class="form-group">
                <label class="col-md-2 control-label">الصورة الحالية للمدونة :</label>
                <div class="col-md-10">
                    <img class="img-preview" src="{{$item->image}}" style="width: 50px; height: 50px">
                </div>
            </div>
        </div>
    @endif

    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">صورة للمدونة </label>
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

    <div class="col-xs-12">
        <div class="input-group-btn">
            <button type="submit" class="btn waves-effect waves-light btn-primary">حفظ</button>
        </div>
    </div>
</div>
