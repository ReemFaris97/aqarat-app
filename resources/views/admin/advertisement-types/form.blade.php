{{--@include('admin.common.errors')--}}
<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">اسم نوع الاعلان</label>
            <div class="col-md-10">
                {!! Form::text("name",null,['class'=>'form-control','placeholder'=>'  الاسم    '])!!}
                @error('name')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

</div>

<div class="col-xs-12">
    <div class="input-group-btn">
        <button type="submit" class="btn waves-effect waves-light btn-primary">حفظ</button>
    </div>
</div>
