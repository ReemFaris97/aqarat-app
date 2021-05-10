<?php

namespace App\Models;

use App\Http\Traits\TranslationOperations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    use HasFactory,TranslationOperations;

    protected $fillable = ['city_id','ar_name','en_name','status'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
