<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrderUtility
 *
 * @property int $id
 * @property int $order_id
 * @property int $utility_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\Utility $utility
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtility newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtility newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtility query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtility whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtility whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtility whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtility whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderUtility whereUtilityId($value)
 * @mixin \Eloquent
 */
class OrderUtility extends Model
{
    use HasFactory;
    protected $fillable=['order_id', 'utility_id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function utility()
    {
        return $this->belongsTo(Utility::class);
    }
}
