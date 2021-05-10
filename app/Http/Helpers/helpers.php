<?php

/**
 * Setting Name
 *
 * @param $name
 * @return mixed
 */

/**
 * Upload Path
 *
 * @return string
 */
function uploadpath()
{
    return 'photos';
}

/**
 * Get Image
 *
 * @param $filename
 * @return string
 */
function getimg($filename)
{
    if (!empty($filename)) {
        $base_url = url('/');

        return $base_url . '/storage/' . $filename;
    } else {
        return '';
    }
}

/**
 * Upload an image
 *
 * @param $img
 */
function uploader($value)
{
    $path = \Storage::disk('public')->putFile(uploadpath(), $value);

    return $path;
}

function getLang($collection, $target)
{
    if (app()->getLocale() == 'en') {
        return $collection['en_' . $target];
    } else {
        return $collection['ar_' . $target];
    }
}

function getsetting($name)
{
    $setting = App\Setting::where('name', $name)->first();
    if (!$setting) {
        return "";
    }

    return strip_tags($setting->value());
}


function Maincategory()
{
    $countries = App\MainCategory::active()->get()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['ar_name']];
    });

    return $countries;
}

function countries()
{
    $countries = App\Country::get();

    return $countries;
}

function delivery()
{
    $items = App\User::where('role', 'delivery')->get()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['name']];
    });
//    dd($items);

    return $items;
}

function country()
{
    $countries = App\Country::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['ar_name']];
    });

    return $countries;
}

function notification()
{
    $notification = auth()->user()->unreadNotifications()->where('type', 'App\Notifications\OrderNotification')->get();
    return $notification;
}

function city()
{
    $cities = App\City::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['ar_name']];
    });

    return $cities;
}

function area()
{
    $cities = App\Area::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['ar_name']];
    });

    return $cities;
}

function sizes()
{
    $sizes = App\Size::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['name']];
    });

    return $sizes;
}

function products()
{
    $sizes = App\Product::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['name']];
    });

    return $sizes;
}

function deleteImg($img_name)
{
    \Storage::disk('public')->delete(uploadpath(), $img_name);

    return true;
}

function AccountStatus($status = null)
{
    $array = [
        '1' => 'مفعل',
        '0' => 'غير مفعل',
    ];

    return $array[$status];
}

function Status($status = null)
{
    $array = [
        'active' => 'مفعل',
        'not_active' => 'غير مفعل',
    ];

    return $array[$status];
}

function CartStatus($status = null)
{
    $array = [
        'pending' => 'فى الإنتظار',
        'accepted' => 'تجهيز',
        'cancelled' => 'ملغية',
        'shipped' => 'تم الشحن',
        'cancellation_request' => 'طلب إلغاء الطلب',
        'contacted' => 'تم التوصيل'
    ];
    if ($status) return $array[$status];
    return $array;
}

function Baridahavailable($status = null)
{
    $array = [
        'true' => 'نعم',
        'false' => 'لا',
    ];
    if ($status) return $array[$status];
    return $array;
}

function sliderType($status = null)
{
    $array = [
        'site' => 'موقع',
        'mobile' => 'موبايل',
    ];

    if ($status)
        return $array[$status];
    else {
        return $array;
    }
}

function multimediaType($status = null)
{
    $array = [
        'image' => 'صورة',
        'video' => 'فيديو',
    ];

    if ($status)
        return $array[$status];
    else {
        return $array;
    }
}

function PaymentMethod($status = null)
{
    $array = [
        'electronic' => 'دفع إلكترونى',
        'on_delivery' => 'عند الإستلام',
        'wallet' => 'باستخدام نقاط المحفظة',
        'network' => 'شبكة'
    ];

    if ($status) return $array[$status];
    return $array;
}


function popup($name)
{
    $ms = 5000;
    $types = ['success', 'warning', 'info', 'error', 'basic'];
    $crud = ['add', 'update', 'delete'];

    if (in_array($name, $crud)) {
        if ($name == 'add') {
            return alert()->success('تم الاضافه بنجاح')->autoclose($ms);
        } elseif ($name == 'update') {
            return alert()->success('تم التعديل بنجاح')->autoclose($ms);
        } elseif ($name == 'delete') {
            return alert()->success('تم الحذف بنجاح')->autoclose($ms);
        }
    }

    if (in_array(array_keys($name)[0], $types)) {
        $alert = array_keys($name)[0];

        return alert()->$alert(array_values($name)[0])->autoclose($ms);
    }

    if (array_keys($name)[0] == 'rules') {

        $validator = \Illuminate\Support\Facades\Validator::make(request()->all(), array_values($name)[0]);

        if ($validator->fails()) {
            alert()->error($validator->errors()->first())->autoclose($ms);

            return true;
        }

        return false;
    }
}

function checkimag($filename)
{
    if ($filename != null) {
        return file_exists(public_path('storage/') . $filename);
    } else {
        return false;
    }
}

function fcm_server_key()
{
    return 'AAAAFUb9X0w:APA91bFf9tsuniprJiMw1MpkNVwgCD4q5zP2LM2aR9XqzK7Hg0xPEsiXakT_IdtjbU4LcaFwNVfyppEjXq9hffz00K2vXbYWth0ZoX9EL8o_zWPeDG9yWQAGTLt5xiLbvDXrZCMCvZQY';
}

function SendMessage($mobile, $message)
{
    $client = new \GuzzleHttp\Client();
    $request = $client->get("https://www.hisms.ws/api.php?send_sms&username=966555014809&password=Aa@123123&numbers=$mobile&sender=ALRAYANWATR&message=$message");
    $response = $request->getBody();
    $response = (explode("<br />", $response));
//    dd($response);
    return substr($response[0], -1) == "0" ? true : false;
}


function sendFCMTopic($data, $target)
{
    //FCM API end-point
    $url = 'https://fcm.googleapis.com/fcm/send';
    //api_key available in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
    $server_key = fcm_server_key();

    $fields = array();
    $fields['data'] = $data;
    if (is_array($target)) {
        $fields['registration_ids'] = $target;
    } else {
        $fields['to'] = $target;
    }
    $fcmMsg = array(
        'body' => $data['body'],
        'title' => $data['title'],
        'sound' => "default",
        'color' => "#203E78"
    );
    $fields['notification'] = $fcmMsg;

    //header with content_type api key
    $headers = array(
        'Content-Type:application/json',
        'Authorization:key=' . $server_key
    );
    //CURL request to route notification to FCM connection server (provided by Google)
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('Oops! FCM Send Error: ' . curl_error($ch));
    }
    curl_close($ch);
    return $result;
}


function users(){
   return \App\User::where('role','user')->get()->mapWithKeys(function ($q){
        return [$q['id']=>$q['phone']];
    });
}
function sessionQty($id)
{
    if (Session::has('cart')) {
        $session = collect(Session::get('cart'));
        $item = $session->where('id', $id)->first();
        if ($item) return $item['item_quantity'];
    }
    return 0;
}

class responder
{
    public static function success($data)
    {
        return response()->json(['status' => true, 'data' => $data]);
    }

    public static function error($data)
    {
        return response()->json(['status' => false, 'msg' => $data]);
    }
}

