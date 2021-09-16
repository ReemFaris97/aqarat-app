<?php

namespace App\Http\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdvertisementType;
use Illuminate\Http\Request;

class AdvertisementTypeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        return \responder::success(AdvertisementType::all()->transform(function ($q) {
            return [
                'id' => $this->id,
                'name' => $this->name,
            ];
        }));
    }
}
