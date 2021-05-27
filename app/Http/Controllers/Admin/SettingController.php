<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('hi');
        $settings = Setting::all()->pluck('page')->unique();
        return view('admin.setting.index', compact('settings'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        foreach ($data as $key => $value) {
            if ($key == '_token' || !$value) continue;
            {
                Setting::where(['name' => $key])->update(['ar_value' => $value[0], 'en_value' => (isset($value[1])) ? $value[1] : $value[0]]);
            }
        }
        toastr()->success('تم تعديل الإعدادات  بنجاح');
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
        $settings = Setting::wherePage($id)->get();
        $settings_page = $id;
        return view('admin.setting.form', compact('settings_page', 'settings'));
    }
}
