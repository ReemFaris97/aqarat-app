<button class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#{{$order->id}}">
    حذف
</button>


<div id="{{$order->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">حذف الطلب</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        {!! Form::model($order,[ 'route' => ['admin.users-orders.destroy',$order->id],'method'=>'delete' ]) !!}
                        <div class="form-group row text-center">
                            <label class="col-md-2 control-label">سبب حذف الطلب</label>
                            <div class="col-md-10">
                                {!! Form::textarea("reason",null,['rows'=>3,'class'=>'form-control','placeholder'=>'سبب الحذف'])!!}
                            </div>
                            <small class="text-dark">حقل اختيارى</small>
                        </div>
                        <div class="row text-center" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-danger waves-effect waves-light"> تأكيد الحذف</button>
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">الغاء
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
            {{--            <div class="modal-footer  ">--}}
            {{--                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">الغاء</button>--}}
            {{--                <button type="submit" class="btn btn-danger waves-effect waves-light"> تأكيد الحذف</button>--}}
            {{--            </div>--}}
        </div>
    </div>
</div><!-- /.modal -->

