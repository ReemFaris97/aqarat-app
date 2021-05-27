<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CitiesRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = City::all();
        return view('admin.cities.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cities.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CitiesRequest $request)
    {
        $data = $request->validated();
        City::create($data);
        toastr()->success('تم اضافة المدينة بنجاح');
        return redirect()->route('admin.cities.index');
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
    public function edit(City $city)
    {
        return view('admin.cities.edit', ['item' => $city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CitiesRequest $request, City $city)
    {
        $city->update($request->validated());
        toastr()->success('تم تعديل المدينة بنجاح');
        return redirect()->route('admin.cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        toastr()->success('تم حذف المدينة بنجاح');
        return redirect()->back();
    }

    public function changeStatus($id)
    {
        $item = City::find($id);
        $status = $item->status == 1 ? 0 : 1;
        $item->status = $status;
        $item->save();
        toastr()->success('تم تغير الحالة بنجاح');
        return redirect()->back()->with('success', ' تم تعديل الحاله بنجاح');
    }
}
