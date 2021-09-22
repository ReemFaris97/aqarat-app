<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Order;
use App\Notifications\DeletedAdvertisementNotification;
use App\Notifications\DeletedOrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class UserOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::whereAdminReviewed(0)->latest()->with(['attributes','utilities','neighborhood','neighborhoods','category','user','media'])->get();
        return view('admin.users-orders.index',compact('orders'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param
     */
    public function destroy(Request $request,$id)
    {
        $order = Order::findOrFail($id);
        if ($request->reason) {
            Notification::send($order->user, new DeletedOrderNotification([
                'title' => 'حذف طلب',
                'body' => 'تم حذف الطلب الخاص بك وذلك بسبب : ' . $request->reason,
            ]));
        }
        $order->delete();
        toastr()->success('تم حذف الطلب بنجاح');
        return redirect()->back();
    }

    public function approved($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['admin_reviewed' => 1]);
        toastr()->success('تم  اعتماد الطلب بنجاح');
        return redirect()->back();
    }

}
