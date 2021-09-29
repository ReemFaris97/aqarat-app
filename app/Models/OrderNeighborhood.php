<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\OrderNeighborhood
 *
 * @property int $id
 * @property int $order_id
 * @property int $neighborhood_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OrderNeighborhood newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderNeighborhood newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderNeighborhood query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderNeighborhood whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderNeighborhood whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderNeighborhood whereNeighborhoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderNeighborhood whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderNeighborhood whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderNeighborhood extends Pivot
{
    //
}
