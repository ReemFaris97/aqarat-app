<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|phone:eg,sa',
            'email' => 'required',
            'message' => 'required',
        ]);
        ContactUs::create($request->all());
        return \responder::success(__('Message Sent Successfully'));
    }

}
