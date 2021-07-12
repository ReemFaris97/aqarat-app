<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\View;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'model_id' => 'required|integer',
            'model_type' => 'required|in:Advertisement,Order',
            'device_id' => 'required|string'
        ]);
        $validated['model_type'] = "App\\Models\\{$request['model_type']}";
        View::firstOrCreate($validated);
        return \responder::success(__('success'));
    }
}
