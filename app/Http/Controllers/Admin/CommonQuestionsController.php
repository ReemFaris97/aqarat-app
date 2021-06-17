<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommonQuestionsRequest;
use App\Models\Comment;
use App\Models\CommonQuestion;
use Illuminate\Http\Request;

class CommonQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=CommonQuestion::all();
        return view('admin.commonQuestions.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.commonQuestions.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommonQuestionsRequest  $request)
    {
        $data=$request->validated();
        CommonQuestion::create($data);
        toastr()->success('تم اضافة سؤال شائع بنجاح');
        return redirect()->route('admin.commonQuestions.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CommonQuestion $blog)
    {
        return view('admin.commonQuestions.edit',['item'=>$blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommonQuestionsRequest $request, CommonQuestion $commonQuestion)
    {
        $commonQuestion->update($request->validated());
        toastr()->success('تم تعديل السؤال بنجاح');
        return redirect()->route('admin.commonQuestions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommonQuestion $commonQuestion)
    {
        $commonQuestion->delete();
        toastr()->success('تم حذف السؤال بنجاح');
        return redirect()->back();
    }
    public function changeStatus(CommonQuestion $commonQuestion)
    {
        $commonQuestion->update(['status'=>!$commonQuestion->status]);
        toastr()->success('تم تغير الحالة بنجاح');
        return redirect()->back()->with('success', ' تم تعديل الحاله بنجاح');
    }
}
