<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AdvertisementType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertisementType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertisementType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertisementType query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertisementType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertisementType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertisementType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertisementType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdvertisementType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
}
