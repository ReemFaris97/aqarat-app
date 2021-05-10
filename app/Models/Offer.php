<?php

namespace App\Models;

use App\Http\Traits\ImageOperations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory,ImageOperations;

    protected $fillable=['user_id','neighborhood_id','views','title','image','estate_type','contract_type','advertiser_type','price','lat','lng','number_of_rooms'	,'number_of_halls'	,'number_of_boards','number_of_vents','number_of_toilets','number_of_kitchens','facilities','description','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
