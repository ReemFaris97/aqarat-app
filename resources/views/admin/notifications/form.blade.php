{{--@include('admin.common.errors')--}}
<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">المستخدمون</label>
            <div class="col-md-10">
                {!! Form::select("users[]",\App\Models\User::pluck('name','id'),null,['class'=>'form-control select2','multiple'])!!}
                @error('user_id')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label" for="example-email">العنوان بالانجليزي</label>
            <div class="col-md-10">
                {!! Form::text("title",null,['class'=>'form-control','placeholder'=>'  العنوان بالانجليزي '])!!}
                @error('title')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label" for="example-email">العنوان بالعربي</label>
            <div class="col-md-10">
                {!! Form::text("title_ar",null,['class'=>'form-control','placeholder'=>'  العنوان بالعربي '])!!}
                @error('title_ar')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label" for="example-email"> النص بالانجليزي</label>
            <div class="col-md-10">
                {!! Form::text("body",null,['class'=>'form-control','placeholder'=>'النص بالانجليزي'])!!}
                @error('body')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label" for="example-email">النص بالعربي</label>
            <div class="col-md-10">
                {!! Form::text("body_ar",null,['class'=>'form-control','placeholder'=>'النص بالعربي'])!!}
                @error('body_ar')
                <div class="invalid-feedback" style="color: #ef1010">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label">الرابط</label>
            <div class="col-md-10">
                {!! Form::url('url',null,['class'=>'form-control','placeholder'=>'الرابط']) !!}
                @error('url')
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
        $(document).ready(function (){
           $('.select2').select2();
        });
    </script>
@endpush
