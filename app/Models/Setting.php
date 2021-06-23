<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $ar_value
 * @property string $en_value
 * @property string $page
 * @property string $slug
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereArValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereEnValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting wherePage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Setting extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends=['value'];
    public function value()
    {
        if (app()->getLocale() == 'en')
            return $this->en_value;
        else
            return $this->ar_value;
    }

    public function getValueAttribute()
    {
        return $this->{app()->getLocale().'_value'};
    }
}
