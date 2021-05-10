<?php


namespace App\Http\Traits;

use Illuminate\Http\Request;

trait TranslationOperations
{
  public function getNameAttribute()
  {
    return getLang($this, 'name');
  }
  public function getTextAttribute()
  {
    return getLang($this, 'text');
  }
  public function getTitleAttribute()
  {
    return getLang($this, 'title');
  }

  public function getDescriptionAttribute()
  {
    return getLang($this, 'description');
  }



}
