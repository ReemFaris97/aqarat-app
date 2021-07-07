<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CategoryAttribute
 *
 * @property int $id
 * @property int $attribute_id
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryAttribute whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryAttribute whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryAttribute whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CategoryAttribute extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','attribute_id'];
}
