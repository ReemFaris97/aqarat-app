<div class="form-group form-float">
    <label class="form-label">اسم الدور</label>
    <div class="form-line">
        {!! Form::text("name",null,['class'=>'form-control','placeholder'=>' اسم الدور'])!!}
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">

    <div class="form-group">

        <strong>Permission:</strong>

        <br/>
        <div class="contentRadiobtns">
            @foreach($permission as $value)
                @isset($rolePermissions)
                    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                        {{ $value->title }}</label>
                @else
                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                        {{ $value->title }}</label>
                @endisset



            @endforeach
        </div>
    </div>

</div>
@if(isset($item->id))
    {!! Form::input('hidden','id',$item->id,['class'=>'form-control']) !!}
@endif
<div class="col-xs-12 aligne-center contentbtn">
    <button class="btn btn-primary waves-effect" type="submit">حفظ</button>
</div>
