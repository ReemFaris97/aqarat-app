<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisingRequest;
use App\Models\Advertisement;
use App\Models\City;
use App\Models\Neighborhood;
use App\Models\User;
use App\Notifications\DeletedAdvertisementNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UserAdvertisersController extends Controller
{

    public function index()
    {
        $items = Advertisement::whereAdminReviewed(0)->get();
        return view('admin.users-advertisings.index', compact('items'));
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
        $advertising = Advertisement::findOrFail($id);
        $users = User::get()->mapWithKeys(function ($q) {
            return [$q['id'] => $q['name']];
        });
        $cities = City::get()->mapWithKeys(function ($q) {
            return [$q['id'] => $q['name']];
        });
        $neighborhoods = Neighborhood::get()->mapWithKeys(function ($q) {
            return [$q['id'] => $q['name']];
        });
        return view('admin.users-advertisings.edit', compact('advertising', 'users', 'cities', 'neighborhoods'));
    }


    public function update(AdvertisingRequest $request, $id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $validator = $request->validated();
        DB::beginTransaction();
        if ($request->image) {
            if ($advertisement->image) {
                $image = str_replace(url('/') . '/storage/', '', $advertisement->image);
                deleteImage('uploads', $image);
            }
        }
        $advertisement->update($validator);
        if ($request->has('photos')) {
            $advertisement->addMultipleMediaFromRequest(['photos'])->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('photos');
            });
        }

        DB::commit();
        toastr()->success('تم تعديل الإعلان بنجاح');
        return redirect()->route('admin.users-advertisings.index');
    }


    public function destroy(Request $request, $id)
    {
        $advertisement = Advertisement::findOrFail($id);
        if ($request->reason) {
            Notification::send($advertisement->user, new DeletedAdvertisementNotification([
                'title' => 'حذف اعلان',
                'body' => 'تم حذف الاعلان الخاص بك وذلك بسبب : ' . $request->reason,
            ]));
        }

        $advertisement->delete();
        toastr()->success('تم حذف الإعلان بنجاح');
        return redirect()->back();
    }

    public function approved($id)
    {
        $item = Advertisement::findOrFail($id);
        $item->update(['admin_reviewed' => 1]);
        toastr()->success('تم  اعتماد الاعلان بنجاح');
        return redirect()->back();
    }

    public function deletePhoto($id)
    {
        $photo = Media::findOrFail($id);
        $photo->delete();
        return response()->json([
            'status' => true,
            'id' => $photo->id,
        ]);
    }
}
