<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Utility
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Utility newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Utility newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Utility query()
 * @method static \Illuminate\Database\Eloquent\Builder|Utility whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utility whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utility whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utility whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Utility extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['name'];
    public $translatable = ['name'];
}
