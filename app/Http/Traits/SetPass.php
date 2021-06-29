<?php

namespace App\Http\Traits;

trait SetPass
{
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
