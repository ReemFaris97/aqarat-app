<?php

namespace App\Models;

use App\Http\Traits\ImageOperations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory, ImageOperations;
    protected $fillable = ['user_id', 'neighborhood_id', 'views', 'title', 'image', 'lat', 'lng', 'description', 'status', 'estate_type', 'contract_type','price','number_of_rooms', 'number_of_halls', 'number_of_boards', 'number_of_vents', 'number_of_toilets', 'number_of_kitchens', 'facilities'];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function neighborhood()
    {
        return $this->belongsTo(Neighborhood::class)->withDefault();
    }
}
