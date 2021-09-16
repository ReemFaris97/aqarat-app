<?php

namespace App\Models;

use App\Http\Traits\ImageOperations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * App\Models\Advertisement
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property int $views_counter
 * @property int $user_id
 * @property int $neighborhood_id
 * @property float $lat
 * @property float $lng
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Neighborhood $neighborhood
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereNeighborhoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereViewsCounter($value)
 * @mixin \Eloquent
 * @property string $address
 * @property int $is_reviewed
 * @property int $is_active
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisement whereIsReviewed($value)
 */
class Advertisement extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia,ImageOperations;

    protected $fillable=['name', 'image', 'views_counter', 'user_id', 'neighborhood_id', 'lat', 'lng', 'description','address','is_active','is_reviewed','admin_reviewed','advertisement_type_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function neighborhood()
    {
        return $this->belongsTo(Neighborhood::class);
    }

    public function views()
    {
        return $this->morphMany(View::class,'model');
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            if ($model->image) {
                $image = str_replace(url('/') . '/storage/', '', $model->image);
                deleteImage('uploads', $image);
            }

            if ($model->getMedia('photos')) {
                $model->clearMediaCollection('photos');
            }
        });

    }

    public function chats()
    {
        return $this->morphMany(Chat::class,'model');
    }

    public function type()
    {
        return $this->belongsTo(AdvertisementType::class);
    }

}
