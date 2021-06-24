<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Media\DestroyRequest;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaController extends Controller
{
    public function destroy(DestroyRequest $request,Media $media)
    {
        $media->delete();
        return \responder::success(__('deleted successfully'));
    }
}
