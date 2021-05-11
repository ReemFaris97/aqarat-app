<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CommonQuestion extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['question', 'answer'];
    protected $fillable = ['question', 'answer', 'status'];
}
