{{--@include('admin.common.errors')--}}
<div class="row row_bx">
    <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
        <div class="form-group">
            <label class="col-md-3 control-label">الاسم</label>
            <div class="col-xs-12 col-md-9">
                {!! Form::text("name",null,['class'=>'form-control','placeholder'=>'  الاسم  '])!!}
                @error('name')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
        <div class="form-group">
            <label class="col-md-3 control-label" for="example-email">الإيميل</label>
            <div class="col-xs-12 col-md-9">
                {!! Form::email("email",null,['class'=>'form-control','placeholder'=>'  الايميل '])!!}
                @error('email')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
        <div class="form-group">
            <label class="col-md-3 control-label" for="example-email">رقم الهاتف</label>
            <div class="col-xs-12 col-md-9">
                {!! Form::number("phone",null,['class'=>'form-control','placeholder'=>'رقم الهاتف'])!!}
                @error('phone')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
        <div class="form-group">
            <label class="col-md-3 control-label">كلمة المرور</label>
            <div class="col-xs-12 col-md-9">
                {!! Form::input('password','password',null,['class'=>'form-control','placeholder'=>'كلمة المرور']) !!}
                @error('password')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
        <div class="form-group">
            <label class="col-md-3 control-label">تكرار كلمة المرور</label>
            <div class="col-xs-12 col-md-9">
                {!! Form::input('password','password_confirmation',null,['class'=>'form-control','placeholder'=>'تكرار كلمة المرور']) !!}
            </div>
        </div>
    </div>
    @if (isset($item->image))
        <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="col-md-3 control-label">الصورة الحالية للأدمن :</label>
                <div class="col-xs-12 col-md-9">
                    <img class="img-preview" src="{{$item->image}}" style="width: 50px; height: 50px">
                </div>
            </div>
        </div>
    @endif

    <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
        <div class="form-group">
            <label class="col-md-3 control-label">صورة للأدمن </label>
            <div class="col-xs-12 col-md-9">
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
        <div class="form-group">
            <label class="col-md-3 control-label">الصلاحيات:</label>
            <div class="col-xs-12 col-md-9">
                @if (isset($userRole))
                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                @else
                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                @endif
                    @error('roles')
                    <div class="invalid-feedback" style="color: #ef1010">
                        {{ $message }}
                    </div>
                    @enderror
            </div>

            @if(isset($item->id))
                {!! Form::input('hidden','id',$item->id,['class'=>'form-control']) !!}
            @endif
        </div>
    </div>
    <div class="col-xs-12">
        <div class="input-group-btn">
            <button type="submit" class="btn waves-effect waves-light btn-primary">حفظ</button>
        </div>
    </div>
</div>


