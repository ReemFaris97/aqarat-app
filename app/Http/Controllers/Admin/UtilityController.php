<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use App\Models\Utility;
use Illuminate\Http\Request;

class UtilityController extends Controller
{

    public function index()
    {
        $items = Utility::all();
        return view('admin.utilities.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.utilities.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name.ar' => 'required',
            'name.en' => 'required'
        ]);
        Utility::create($data);
        toastr()->success('تم اضافة الخاصية بنجاح');
        return redirect()->route('admin.utilities.index');
    }



    public function edit(Utility $utility)
    {
        return view('admin.utilities.edit', ['item' => $utility]);
    }


    public function update(Request $request, Utility $utility)
    {
        $data = $request->validate([
            'name.ar' => 'required',
            'name.en' => 'required'
        ]);
        $utility->update($data);
        toastr()->success('تم تعديل الخاصية بنجاح');
        return redirect()->route('admin.utilities.index');
    }


    public function destroy( Utility $utility)
    {
        $utility->delete();
        toastr()->success('تم حذف الخاصية بنجاح');
        return redirect()->back();
    }

}
