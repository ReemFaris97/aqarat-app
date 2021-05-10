<?php

namespace App\Models;

use App\Http\Traits\TranslationOperations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory, TranslationOperations;

    protected $fillable = ['ar_name', 'en_name'];

    public function neighborhood()
    {
        return $this->hasMany(Neighborhood::class);
    }
}
