<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactEmail;
use App\Models\ContactUs;
use App\Notifications\DeletedOrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function index()
    {
        $items = ContactUs::all();
        return view('admin.contact.index', compact('items'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $title = $request->title;
        $body = $request->body;

        Mail::to($request->email)->send(new ContactEmail($title,$body));
        toastr()->success('تم ارسال الرسالة   بنجاح');
        return redirect()->back();
    }


    public function destroy($id)
    {
        $item = ContactUs::find($id);
        $item->delete();
        toastr()->success('تم حذف الرسالة بنجاح');
        return back();
    }
}
