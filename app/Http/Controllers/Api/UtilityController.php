<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UtilityResource;
use App\Models\Utility;
use Illuminate\Http\Request;

class UtilityController extends Controller
{
    public function __invoke()
    {
        return \responder::success(UtilityResource::collection(Utility::all()));
    }
}
