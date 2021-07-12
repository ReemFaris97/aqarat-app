<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\View
 *
 * @property int $id
 * @property string $model_type
 * @property int $model_id
 * @property string $device_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|View newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|View newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|View query()
 * @method static \Illuminate\Database\Eloquent\Builder|View whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class View extends Model
{
    use HasFactory;
    protected $fillable=['model_type','model_id','device_id'];
}
