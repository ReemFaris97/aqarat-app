<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\CommonQuestion;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        return \responder::success(QuestionResource::collection(CommonQuestion::active()->get()));
    }

}
