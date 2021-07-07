<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class   OrderAttribute extends Model
{
    use HasFactory;
    protected $fillable=['order_id', 'attribute_id', 'value'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
