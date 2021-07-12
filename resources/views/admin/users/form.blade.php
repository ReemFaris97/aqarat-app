{{--@include('admin.common.errors')--}}
<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">الاسم</label>
            <div class="col-md-10">
                {!! Form::text("name",null,['class'=>'form-control','placeholder'=>'  الاسم  '])!!}
                @error('name')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label" for="example-email">الإيميل</label>
            <div class="col-md-10">
                {!! Form::email("email",null,['class'=>'form-control','placeholder'=>'  الايميل '])!!}
                @error('email')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label" for="example-email">رقم الهاتف</label>
            <div class="col-md-10">
                {!! Form::text("phone",null,['class'=>'form-control','placeholder'=>'رقم الهاتف'])!!}
                @error('phone')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">كلمة المرور</label>
            <div class="col-md-10">
                {!! Form::input('password','password',null,['class'=>'form-control','placeholder'=>'كلمة المرور']) !!}
                @error('password')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">تكرار كلمة المرور</label>
            <div class="col-md-10">
                {!! Form::input('password','password_confirmation',null,['class'=>'form-control','placeholder'=>'تكرار كلمة المرور']) !!}
            </div>
        </div>
    </div>
    @if (isset($user->image))
        <div class="col-xs-12">
            <div class="form-group">
                <label class="col-md-2 control-label">الصورة الحالية للمستخدم :</label>
                <div class="col-md-10">
                    <img class="img-preview" src="{{$user->image}}" style="width: 50px; height: 50px">
                </div>
            </div>
        </div>
    @endif

    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">صورة للمستخدم </label>
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
