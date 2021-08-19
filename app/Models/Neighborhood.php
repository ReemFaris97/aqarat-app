<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Neighborhood
 *
 * @property int $id
 * @property array $name
 * @property int $city_id
 * @property int $status
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\City $city
 * @property-read array $translations
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood query()
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Neighborhood whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Neighborhood extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['city_id', 'name', 'status'];
    public $translatable = ['name'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function scopeActive($q)
    {
        return $q->where('status', 1);
    }
}
