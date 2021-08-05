{{--@include('admin.common.errors')--}}
<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">الاسم باللغة العربية</label>
            <div class="col-md-10">
                {!! Form::text("name[ar]",(isset($item) ? $item: new \App\Models\Attribute())->getTranslation('name',
                'ar'),['class'=>'form-control ','placeholder'=>'  الاسم باللغة العربية  '])!!}
                @error('name.ar')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>

        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">الإسم باللغة الإنجليزية</label>
            <div class="col-md-10">
                {!! Form::text("name[en]",(isset($item) ? $item: new \App\Models\Attribute())->getTranslation('name',
             'en'),['class'=>'form-control','placeholder'=>'  الاسم باللغة الإنجليزية  '])!!}
                @error('name.en')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    @if (isset($user->image))
        <div class="col-xs-12">
            <div class="form-group">
                <label class="col-md-2 control-label">الصورة الحالية للمرفق :</label>
                <div class="col-md-10">
                    <img class="img-preview" src="{{$user->image}}" style="width: 50px; height: 50px">
                </div>
            </div>
        </div>
    @endif

    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">صورة للمرفق </label>
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
