@include('admin.common.errors')
<div class="form-group">
    <label class="col-md-2 control-label">الاسم</label>
    <div class="col-md-10">
        {!! Form::text("name",null,['class'=>'form-control','placeholder'=>'  الاسم  '])!!}
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="example-email">الإيميل</label>
    <div class="col-md-10">
        {!! Form::email("email",null,['class'=>'form-control','placeholder'=>'  الايميل '])!!}
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="example-email">رقم الهاتف</label>
    <div class="col-md-10">
        {!! Form::text("phone",null,['class'=>'form-control','placeholder'=>'رقم الهاتف'])!!}    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">كلمة المرور</label>
    <div class="col-md-10">
        {!! Form::input('password','password',null,['class'=>'form-control','placeholder'=>'كلمة المرور']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">تكرار كلمة المرور</label>
    <div class="col-md-10">
        {!! Form::input('password','password_confirmation',null,['class'=>'form-control','placeholder'=>'تكرار كلمة المرور']) !!}
    </div>
</div>
@if (isset($item->image))
    <div class="form-group">
        <label class="col-md-2 control-label">الصورة الحالية للأدمن :</label>
        <div class="col-md-10">
            <img class="img-preview" src="{{$item->image}}" style="width: 50px; height: 50px">
        </div>
    </div>
@endif

<div class="form-group">
    <label class="col-md-2 control-label">صورة للأدمن </label>
    <div class="col-md-10">
        {!! Form::file("image",null,['class'=>'form-control'])!!}
    </div>
</div>

<div class="form-group ">
    <label class="col-md-2 control-label">الصلاحيات:</label>
    <div class="col-sm-12 col-md-7">
        @if (isset($userRole))
            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
        @else
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
        @endif
    </div>

    @if(isset($item->id))
        {!! Form::input('hidden','id',$item->id,['class'=>'form-control']) !!}
    @endif
</div>


<span class="input-group-btn">
    <button type="submit" class="btn waves-effect waves-light btn-primary">حفظ</button>
</span>
