<button class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#{{$item->id}}">
    ارسال رد
</button>


<div id="{{$item->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">ارسال رد  </h4>
            </div>
            <div class="modal-body">
                {!! Form::model($item,[ 'route' => ['admin.contacts.store'],'method'=>'post' ]) !!}
                <div class="row">
                    <div class="col-12">
                        <input type="hidden" name="email" value="{{$item->email}}">

                        <div class="form-group row text-center">
                            <label class="col-md-2 control-label"> العنوان </label>
                            <div class="col-md-10">
                                {!! Form::text("title",null,['class'=>'form-control','placeholder'=>'العنوان','required'])!!}
                            </div>
                        </div>
                        <div class="form-group row text-center">
                            <label class="col-md-2 control-label"> المحتوى </label>
                            <div class="col-md-10">
                                {!! Form::textarea("body",null,['rows'=>3,'class'=>'form-control','placeholder'=>'المحتوى','required'])!!}
                            </div>
                        </div>
                        <div class="row text-center" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-danger waves-effect waves-light">تأكيد</button>
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">الغاء
                            </button>
                        </div>

                    </div>
                </div>
                {!! Form::close() !!}
            </div>

            {{--            <div class="modal-footer  ">--}}
            {{--                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">الغاء</button>--}}
            {{--                <button type="submit" class="btn btn-danger waves-effect waves-light"> تأكيد الحذف</button>--}}
            {{--            </div>--}}
        </div>
    </div>
</div><!-- /.modal -->

