<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Order;
use App\Models\Provider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    /**
     * Show the Admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data=[
            'orders_category'=>\DB::table('orders')->join('categories','categories.id','=','orders.category_id')
                ->selectRaw('count(orders.id) as orders , categories.name as category_name')
                ->groupBy('categories.name')->get()->map(function ($q){
                return ['label'=>object_get(json_decode($q->category_name),'ar','تصنيف'),'value'=>$q->orders];
            })->toArray(),

            'orders_in_day'=>Order::selectRaw('count(id) as orders , DATE(created_at) as date_created_at')->groupBy('date_created_at')->get()->toArray(),
            'advertisements_in_day'=>Advertisement::selectRaw('count(id) as advertisements , DATE(created_at) as date_created_at')->groupBy('date_created_at')->get()->toArray(),
        ];
        return view('admin.layout.home',$data);
    }
}
