<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Attribute;
use App\Models\Category;
use Illuminate\Http\Request;
use function React\Promise\all;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Category::all();
        return view('admin.categories.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributes = Attribute::get()->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        });
        return view('admin.categories.add', compact('attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $category = Category::create($data);
        $category->attributes()->attach($data['attributes']);
        toastr()->success('تم اضافة التصنيف بنجاح');
        return redirect()->route('admin.categories.index');
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
    public function edit(Category $category)
    {
        $attributes = Attribute::get()->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        });
        return view('admin.categories.edit', ['item' => $category,'attributes'=>$attributes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        $category->attributes()->sync($request['attributes']);
        toastr()->success('تم تعديل التصنيف بنجاح');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        toastr()->success('تم حذف التصنيف بنجاح');
        return redirect()->back();
    }

}
