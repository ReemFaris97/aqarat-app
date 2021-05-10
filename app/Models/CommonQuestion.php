<?php

namespace App\Models;

use App\Http\Traits\TranslationOperations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonQuestion extends Model
{
    use HasFactory,TranslationOperations;

    protected $fillable = ['ar_question','en_question','ar_answer','en_answer','status'];
}
