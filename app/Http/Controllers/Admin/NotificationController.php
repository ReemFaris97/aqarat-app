<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\FireBase;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.notifications.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notifications.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'users' => 'nullable|array',
            'title' => 'required|string',
            'title_ar' => 'required|string',
            'body' => 'required|string',
            'body_ar' => 'required|string',
            'url' => 'nullable|url'
        ]);
        $users = User::when(\request('users'), function ($q) {
            $q->whereIn('id', \request('users'));
        })->get();
        \Notification::send($users, new GeneralNotification($inputs));
        if (\request('users')) {
            FireBase::BulkNotification($users, $inputs['title'], $inputs['body'], \Arr::except($inputs, 'users'));
        } else {
            FireBase::sendFCMTopic('/topics/general-users', $request['title'], $request['body'], $inputs);
        }
        toastr()->success('تم ارسال الاشعارات بنجاح');
        return back();
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

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
