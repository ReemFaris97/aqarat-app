<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminsRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Admin::all();
        return view('admin.admins.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.admins.add',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminsRequest $request)
    {
        $data=$request->validated();
        $admin=Admin::create($data);
        $admin->assignRole($request->input('roles'));
        toastr()->success('تم اضافة المدير بنجاح');
        return redirect()->route('admin.admins.index');
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
    public function edit(Admin $admin)
    {
        $roles = Role::pluck('name','id')->all();
        $userRole = $admin->roles()->first()->id;
        return view('admin.admins.edit',['item'=>$admin,'userRole'=>$userRole,'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminsRequest $request, Admin $admin)
    {
        $validator = $request->validated();
        if ($request->image) {
            if ($admin->image) {
                $image = str_replace(url('/') . '/storage/', '', $admin->image);
                deleteImage('uploads', $image);
            }
        }

        $admin->update($validator);
        \DB::table('model_has_roles')->where('model_id',$admin)->delete();
        $admin->assignRole($request->input('roles'));
        toastr()->success('تم تعديل المدير بنجاح');
        return redirect()->route('admin.admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        toastr()->success('تم حذف المدير بنجاح');
        return redirect()->back();
    }

    public function changeStatus($id)
    {
        $item = Admin::find($id);
        $status = $item->status == 1 ? 0 : 1;
        $item->status = $status;
        $item->save();
        toastr()->success('تم تغير الحالة بنجاح');
        return redirect()->back()->with('success', ' تم تعديل الحاله بنجاح');
    }
}
