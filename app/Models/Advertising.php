<?php

namespace App\Models;

use App\Http\Traits\ImageOperations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    use HasFactory, ImageOperations;

    protected $fillable = ['user_id','neighborhood_id','views','title','image','lat','lng','description','status'];
}
