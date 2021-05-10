<?php

namespace App\Models;

use App\Http\Traits\ImageOperations;
use App\Http\Traits\TranslationOperations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory,ImageOperations,TranslationOperations;

    protected $fillable = ['ar_title','en_title','ar_description','en_description','image','status'];
}
