<div class="alert alert-danger print-error-msg" style="display:none">
    <ul></ul>
</div>

<div class="form-group form-float">
    <label class="form-label">الإسم</label>
    <div class="form-line">
        {!! Form::text("name",null,['class'=>'form-control','placeholder'=>'  الاسم  '])!!}
    </div>
</div>

<div class="form-group form-float">
    <label class="form-label">الإيميل</label>
    {!! Form::email("email",null,['class'=>'form-control','placeholder'=>'  الايميل '])!!}
    <div class="form-line">
    </div>
</div>

<div class="form-group form-float">
    <label class="form-label">رقم الهاتف</label>
    {!! Form::number("phone",null,['class'=>'form-control','placeholder'=>'رقم الهاتف'])!!}
    <div class="form-line">
    </div>
</div>


<div class="form-group form-float">
    <label class="form-label">كلمة المرور</label>
    {!! Form::input('password','password',null,['class'=>'form-control','placeholder'=>'كلمة المرور']) !!}
    <div class="form-line">
    </div>
</div>

<div class="form-group form-float">
    <label class="form-label">تكرار كلمة المرور</label>
    {!! Form::input('password','password_confirmation',null,['class'=>'form-control','placeholder'=>'تكرار كلمة المرور']) !!}

    <div class="form-line">
    </div>
</div>
@if (isset($item->image))
    <div class="form-group form-float">
        <label class="form-label">الصورة الحالية للأدمن :</label>
        <div class="form-line">
            <img class="img-preview" src="{{$item->image}}" style="width: 50px; height: 50px">
        </div>
    </div>
@endif

<div class="form-group form-float">
    <label class="form-label">صورة للأدمن </label>
    <div class="form-line">
        {!! Form::file("image",null,['class'=>'form-control'])!!}
    </div>
</div>


<div class="form-group">
    {!! Form::radio("is_admin",1,null,['class'=>'with-gap','id'=>'radio_3']) !!}
    <label for="radio_3"> تفعيل </label>

    {!! Form::radio("is_admin",0,null,['class'=>'with-gap','id'=>'radio_4']) !!}
    <label for="radio_4">عدم تفعيل</label>
</div>

{!! Form::input('hidden','role','admin',['class'=>'form-control']) !!}

@if(isset($item->id))
    {!! Form::input('hidden','id',$item->id,['class'=>'form-control']) !!}
@endif
<button class="btn btn-primary waves-effect btn-submit" type="submit">حفظ</button>
