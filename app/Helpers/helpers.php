<?php
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
        return $base_url . $filename;

    } else {
        return '';
    }
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



