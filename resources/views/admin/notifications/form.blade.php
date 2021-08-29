{{--@include('admin.common.errors')--}}
<div class="row">


    <div class="col-xs-12">
        <div class="form-group">
            <label class="col-md-2 control-label" for="example-email">العنوان </label>
            <div class="col-md-10">
                {!! Form::text("title",null,['class'=>'form-control','placeholder'=>'  العنوان  '])!!}
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
            <label class="col-md-2 control-label" for="example-email">النص </label>
            <div class="col-md-10">
                {!! Form::text("body",null,['class'=>'form-control','placeholder'=>'النص '])!!}
                @error('body')
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
