<button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
        data-target="#{{$item->id}}"> عرض الصور
</button>


<div id="{{$item->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">صور اضافية     : {{$item->name}}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                        @foreach($item->getMedia('photos') as $photo)
                        <div class="col-md-4">
                            <a data-fancybox="gallery{{item->id}}" href="{{$photo->getUrl()}}">
                                <img src="{{$photo->getUrl()}}" width="100" height="100"
                                     class="img-thumbnail">
                            </a>
                        </div>
                        @endforeach
                </div>
            </div>
            <div class="modal-footer text-right">
                <button type="button" class="btn btn-block text-danger font-bold waves-effect" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div><!-- /.modal -->
