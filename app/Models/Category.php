<?php

namespace App\Models;

use App\Http\Traits\ImageOperations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, ImageOperations,HasTranslations;

    protected $fillable = ['name', 'image'];
    public $translatable = ['name'];
}
