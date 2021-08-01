<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderRequest extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'quantity', 'price', 'status'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
