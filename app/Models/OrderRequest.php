<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrderRequest
 *
 * @property int $id
 * @property int $order_id
 * @property string $quantity
 * @property string $price
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder|OrderRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderRequest whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderRequest wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderRequest whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderRequest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderRequest extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'quantity', 'price', 'status'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
