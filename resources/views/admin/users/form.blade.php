<div class="alert alert-danger print-error-msg" style="display:none">
    <ul></ul>
</div>

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
        <label class="form-label">الصورة الحالية للمستخدم :</label>
        <div class="form-line">
            <img class="img-preview" src="{{$item->image}}" style="width: 50px; height: 50px">
        </div>
    </div>
@endif

<div class="form-group form-float">
    <label class="form-label">صورة المستخدم</label>
    <div class="form-line">
        {!! Form::file("image",null,['class'=>'form-control'])!!}
    </div>
</div>

<!-- <div class="form-group form-float">
    <label class="form-label">المنطقة</label>
    <div class="form-line">
        {!! Form::select("area_id",area(),null,['class'=>'form-control','placeholder'=>'اختر اسم المنطقة']) !!}
    </div>
</div>

<div class="form-group form-float">
    <label class="form-label">العنوان بشكل تفصيلي</label>
    <div class="form-line">
        {!! Form::text("address",null,['class'=>'form-control','placeholder'=>'العنوان '])!!}
    </div>
</div> -->


<div class="form-group">
    {!! Form::radio("is_active",1,null,['class'=>'with-gap','id'=>'radio_3']) !!}
    <label for="radio_3"> تفعيل </label>

    {!! Form::radio("is_active",0,null,['class'=>'with-gap','id'=>'radio_4']) !!}
    <label for="radio_4">عدم تفعيل</label>
</div>

{!! Form::input('hidden','role','user',['class'=>'form-control']) !!}


@if(isset($item->id))
    {!! Form::input('hidden','id',$item->id,['class'=>'form-control']) !!}
@endif

<!-- <button class="btn btn-primary waves-effect"  id="add_new_address" type="button">اضافة عنوان جديد </button>
                  <br><br>
<div class="address_add"></div> -->
<button class="btn btn-primary waves-effect btn-submit" type="submit">حفظ</button>

@push('scripts')
<script>
    $('#country').change(function () {
        var val = $(this).val();
        $.ajax({
            type: "post",
            url: "{{route('cities.ajax')}}",
            data:{'country_id':val,'_token':"{{@csrf_token()}}"},
            success: function (data) {
                $('#city').empty();
                $.each( data.all_cities, function( key, value ) {
                  // alert(value.ar_name);
                  var option = '<option value="' + value.id + '">' + value.ar_name + '</option>';
                    $("#city").append(option);
                });
                $('#city').selectpicker('refresh');
            }
        });
    });
</script>

<!-- <script>
        $('#add_new_address').click(function () {
           $('.address_add').append("<div class=\"form-group form-float\">\n" +
               "    <label class=\"form-label\">العنوان بشكل تفصيلى</label>\n" +
               "    <div class=\"form-line\">\n" +
               "        <input   type=\"text\" name=\"address[]\"  class=\"form-control\" placeholder=\"اسم الدفعة\">\n" +
               "    </div>\n" +
               "</div>\n" +
               "\n" +
               "<div class=\"form-group form-float\">\n" +
               "    <label class=\"form-label\">الدولة</label>\n" +
               "    <div class=\"form-line\">\n" +
               "    <select class=\"form-group\" name=\"customer_alert[]\">\n" +
               "        <option value=\"\" selected> اختر الدولة</option>\n" +
               "        <option value=\"email\">بالبريد الإلكترونى</option>\n" +
               "    </select>\n" +
               "\n" +
               "    </div>\n" +
               "</div>"
               "\n" +
               "<div class=\"form-group form-float\">\n" +
               "    <label class=\"form-label\">اسم المدينة</label>\n" +
               "    <div class=\"form-line\">\n" +
               "    <select class=\"form-group\" name=\"customer_alert[]\">\n" +
               "        <option value=\"\" selected> اختر الدولة</option>\n" +
               "        <option value=\"email\">بالبريد الإلكترونى</option>\n" +
               "    </select>\n" +
               "\n" +
               "    </div>\n" +
               "</div>"
               "\n" +
               "<div class=\"form-group form-float\">\n" +
               "    <label class=\"form-label\">اسم المنطقة</label>\n" +
               "    <div class=\"form-line\">\n" +
               "    <select class=\"form-group\" name=\"customer_alert[]\">\n" +
               "        <option value=\"\" selected> اختر الدولة</option>\n" +
               "        <option value=\"email\">بالبريد الإلكترونى</option>\n" +
               "    </select>\n" +
               "\n" +
               "    </div>\n" +
               "</div>"
             );
        });
    </script> -->

@endpush
