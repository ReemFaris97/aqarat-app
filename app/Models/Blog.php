<?php

namespace App\Models;

use App\Http\Traits\ImageOperations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasFactory, ImageOperations, HasTranslations;

    public $translatable = ['title', 'description'];
    protected $fillable = ['title', 'description', 'image', 'status'];
}
