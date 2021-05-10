<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function value()
    {
        if (app()->getLocale() == 'en')
            return $this->en_value;
        else
            return $this->ar_value;
    }
}
