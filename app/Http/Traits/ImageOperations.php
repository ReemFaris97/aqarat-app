<?php


namespace App\Http\Traits;

use Illuminate\Http\Request;

trait ImageOperations
{

  public function getImageAttribute($value)
    {
        return getimg($value);
    }


    public function setImageAttribute($value)
    {
        $this->attributes['image'] = uploader($value);
    }
  public function getThubnailAttribute($value)
    {
        return getimg($value);
    }


    public function setThubnailAttribute($value)
    {
        $this->attributes['thubnail'] = uploader($value);
    }


}
