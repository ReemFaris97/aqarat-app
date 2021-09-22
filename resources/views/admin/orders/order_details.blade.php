<button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
        data-target="#item{{$order->id}}">التفاصيل
</button>
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="item{{$order->id}}"
     tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="myLargeModalLabel">
                    تفاصيل {{$order->name}}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 ">
                        <table class="table table-bordered table-responsive table-striped text-center">
                            <tr>
                                <th class="font-weight-bold"> الاسم</th>
                                <td>  {{$order->name}} </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold"> نوع الطلب</th>
                                <td>  {{orderType($order->is_special)}} </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold"> عدد المشاهدات</th>
                                <td>  {{(int)$order->views_count}} </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold"> الصورة</th>
                                <td>
                                    <a data-fancybox="gallery1{{$order->id}}" href="{{$order->image}}">
                                        <img src="{{$order->image}}" width="70" height="70"
                                             class="img-thumbnail" alt="adv_img">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold"> المعلن</th>
                                <td>  <a href="{{route('admin.users.show',$order->user->id)}}">{{$order->user->name}}</a> </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">صفة المعلن</th>
                                <td>  {{__($order->advertiser)}} </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold"> التصنيف</th>
                                <td>  {{$order->category->name}} </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold"> المدينة</th>
                                <td>  {{$order->neighborhood->city->name}} </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold"> الحى</th>
                                <td>  {{$order->neighborhood->name}}
                                {{$order->neighborhoods->implode('|')}}
                                </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">العقد</th>
                                <td>  {{__($order->contract)}} </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">النوع</th>
                                <td>  {{__($order->type)}} </td>
                            </tr>

                            <tr>
                                <th class="font-weight-bold">العنوان</th>
                                <td>  {{__($order->address)}} </td>
                            </tr>

                            <tr>
                                <th class="font-weight-bold">السعر</th>
                                <td>  {{__($order->price)}} </td>
                            </tr>

                            <tr>
                                <th class="font-weight-bold">التفاصيل</th>
                                <td>
                                    <p style="white-space: pre-line;overflow-wrap: anywhere;text-overflow: ellipsis;">{{$order->description}}</p>
                                </td>
                            </tr>

                            <tr>
                                <th class="font-weight-bold">التاريخ</th>
                                <td> {{$order->created_at->format('Y-m-d')}}</td>
                            </tr>

                            <tr>
                                <th class="font-weight-bold">الخصائص</th>
                                <td>

                                    @foreach($order->attributes as $attr)
                                        {{$attr->name}} :
                                        @if($attr->type == "boolean")
                                            {{__($attr->pivot->value,[],'ar')}}
                                        @else
                                            {{$attr->pivot->value}}
                                        @endif
                                    @endforeach
                                </td>
                            </tr>

                            <tr>
                                <th class="font-weight-bold">الخدمات</th>
                                <td>
                                    @foreach($order->utilities as $utility)
                                        <li>
                                            {{$utility->name}}
                                        </li>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">مجموعة الصور</th>
                                <td>
                                    @if($order->getMedia())
                                        @foreach($order->getMedia() as $image)
                                            <a data-fancybox="gallery{{$order->id}}" href="{{$image->getFullUrl()}}">
                                                <img src="{{$image->getFullUrl()}}" width="70" height="70"
                                                     class="img-thumbnail" alt="adv_img">
                                            </a>
                                        @endforeach

                                    @else {{__('No Image')}} @endif
                                </td>
                            </tr>
                            @if($order->special_until)
                                <tr>
                                    <th class="font-weight-bold">طلب مميز</th>
                                    <td>
                                        @if($order->special_until->greaterThanOrEqualTo(now()))
                                            <p>مميز حتى تاريخ : {{$order->special_until->format('Y-m-d')}}</p>
                                        @else
                                            غير مميز
                                        @endif
                                    </td>
                                </tr>
                            @endif

                        </table>                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
