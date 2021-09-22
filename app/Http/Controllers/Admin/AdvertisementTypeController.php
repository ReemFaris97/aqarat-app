<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdvertisementType;
use Illuminate\Http\Request;

class AdvertisementTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.advertisement-types.index')->with('items',AdvertisementType::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.advertisement-types.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs=$request->validate(['name'=>'required']);
        AdvertisementType::create($inputs);
        toastr()->success('تم الاضافة بنجاح !');
        return  back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(AdvertisementType $advertisement_type)
    {
        return view('admin.advertisement-types.edit')->with('item',$advertisement_type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdvertisementType $advertisement_type)
    {
        $inputs=$request->validate(['name'=>'required']);
        $advertisement_type->update($inputs);
        toastSuccess('تم التعديل بنجاح !');
        return redirect()->route('admin.advertisement-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdvertisementType $advertisement_type)
    {
        $advertisement_type->delete();
        toastSuccess('تم الحذف بنجاح !');
        return back();
    }
}
