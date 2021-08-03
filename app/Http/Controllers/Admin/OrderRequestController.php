<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Order;
use App\Models\OrderRequest;
use App\Notifications\DeletedAdvertisementNotification;
use App\Notifications\DeletedOrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class OrderRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = OrderRequest::with('order')->get();
        return view('admin.orders-requests.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $orderRequest = OrderRequest::findOrFail($id);
        $orderRequest->update(['status' => $request->status]);
        if ($request->status == 'accepted') {
            $orderRequest->order->update([
                'is_special' => 1,
                'special_until' => now()->addMonths($orderRequest->quantity)
            ]);
        }
        toastr()->success('تم  التحديث   بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param
     */
    public function destroy(Request $request, $id)
    {
        //
    }


}
