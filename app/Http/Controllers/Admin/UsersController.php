<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\Models\Advertisement;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=User::all();
        return view('admin.users.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $data=$request->validated();
        User::create($data);
        toastr()->success('تم اضافة المستخدم بنجاح');
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $data=[
            'orders_category'=>$user->orders()->join('categories','categories.id','=','orders.category_id')->selectRaw('count(orders.id) as orders , categories.name as category_name')->groupBy('categories.name')->get()->map(function ($q){
                return ['label'=>$q->category_name,'value'=>$q->orders];
            })->toArray(),

            'orders_in_day'=>Order::where('user_id',$user->id)->selectRaw('count(id) as orders , DATE(created_at) as date_created_at')->groupBy('date_created_at')->get()->toArray(),
            'advertisements_in_day'=>Advertisement::where('user_id',$user->id)->selectRaw('count(id) as advertisements , DATE(created_at) as date_created_at')->groupBy('date_created_at')->get()->toArray(),
        ];
        return  view('admin.users.show',$data,compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, User $user)
    {
        $user->update($request->validated());
        toastr()->success('تم تعديل المستخدم بنجاح');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        toastr()->success('تم حذف المستخدم بنجاح');
        return redirect()->back();
    }

    public function changeStatus($id)
    {
        $item = User::find($id);
        $item->update(['is_active' => !$item->is_active]);
        toastr()->success('تم تغير الحالة بنجاح');
        return redirect()->back()->with('success', ' تم تعديل الحاله بنجاح');
    }
}
