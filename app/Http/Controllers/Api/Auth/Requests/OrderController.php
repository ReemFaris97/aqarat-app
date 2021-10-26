<?php

namespace App\Http\Controllers\Api\Auth\Requests;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, Order $order)
    {
        $inputs = $request->validate([
            'quantity' => 'required|int|min:1'
        ]);
        $inputs['price'] = object_get(Setting::where('name', 'special_price')->first(), 'ar_value', 0);

        $order->requests()->create($inputs);

        return \responder::success('تم إرسال طلب التمييز للإدارة بنجاح');
    }

}
