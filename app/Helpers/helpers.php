<?php
/**
 * Get Image
 *
 * @param $filename
 * @return string
 */

function uploadImage($file, $img)
{
    return '/storage/' . \Storage::disk('public')->putFile($file, $img);
}

function getimg($filename)
{
    return asset($filename);
}

function deleteImage($file, $img)
{
    \Storage::disk('public')->delete($file, $img);

    return true;
}

function order_status()
{
    return [
       // 'pending' => 'قيد الانتظار',
        'accepted' => 'تم الموافقة',
        'rejected' => 'تم الرفض',
    ];
}

/**
 * Upload an image
 *
 * @param $value
 * @param string $path
 * @return bool|false|string
 */
function uploader($value, $path = 'uploads')
{
    return '/storage/' . Storage::disk('public')->putFile($path, $value);
}

function AccountStatus($status = null)
{
    $array = [
        '1' => 'مفعل',
        '0' => 'غير مفعل',
    ];

    return $array[$status];
}
function orderType($status = null)
{
    $array = [
        '1' => 'مميز',
        '0' => 'غير مميز',
    ];

    return $array[$status];
}
function valueType($status = null)
{
    $array = [
        'true' => 'توجد',
        'false' => 'لا توجد',
    ];

    return $array[$status];
}

function AttributeType($status = null)
{
    $array = [
        'number' => 'رقم',
        'boolean' => 'نعم / لا',
        'text' => 'نص',
    ];
    if ($status) return $array[$status];
    return $array;
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



