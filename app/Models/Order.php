<?php

namespace App\Models;

use App\Http\Traits\ImageOperations;
use App\Notifications\SimilarOrderNotification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property int $user_id
 * @property int $category_id
 * @property int $neighborhood_id
 * @property string $contract
 * @property string $advertiser
 * @property float $lat
 * @property float $lng
 * @property string $address
 * @property string $price
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attribute[] $attributes
 * @property-read int|null $attributes_count
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\Neighborhood $neighborhood
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Utility[] $utilities
 * @property-read int|null $utilities_count
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAdvertiser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereContract($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereNeighborhoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @mixin \Eloquent
 */
class Order extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, ImageOperations, Prunable;

    protected $fillable = ['name', 'image', 'user_id', 'category_id', 'neighborhood_id', 'contract', 'advertiser', 'lat', 'lng', 'address', 'price', 'description', 'is_reviewed', 'is_active', 'type', 'is_special', 'admin_reviewed','special_until'];

    protected $dates = ['special_until'];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            if ($model->image) {
                $image = str_replace(url('/') . '/storage/', '', $model->image);
                deleteImage('uploads', $image);
            }
        });
        static::created(function (Order $order) {
            $users = User::whereHas('orders', function ($q) use ($order) {
                $q->where(['contract' => $order->contract, 'neighborhood_id' => $order->neighborhood_id, 'category_id' => $order->category_id, 'type' => $order->type == 'request' ? 'offer' : 'request']);
            })->where('users.id', '!=', $order->user_id)->get();
            \Notification::send($users, new SimilarOrderNotification($order));
        });

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function neighborhood()
    {
        return $this->belongsTo(Neighborhood::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, OrderAttribute::class)->withPivot(['value']);
    }

    public function utilities()
    {
        return $this->belongsToMany(Utility::class, OrderUtility::class);
    }

    public function views()
    {
        return $this->morphMany(View::class, 'model');
    }

    public function scopeFilter(Builder $query, Request $request)
    {

        $query->when($request->type, function ($q) {
            $q->where('type', \request('type'));
        });
        $query->when($request->advertiser, function ($q) {
            $q->where('advertiser', \request('advertiser'));
        });
        $query->when($request->contract, function ($q) {
            $q->where('contract', \request('contract'));
        });
        $query->when($request->is_special, function ($q) {
            $q->where('is_special', \request('is_special'));
        });
        $query->when($request->category_id, function ($q) {
            $q->where('category_id', \request('category_id'));
        });
        $query->when($request->name, function ($q) {
            $q->where('name', 'like', '%' . \request('name') . '%');
        });
        $query->when($request->sort, function ($q) {
            $q->where('name', 'like', '%' . \request('name') . '%');
        });
        $query->when($request->price_from and $request->price_to, function ($q) {
            $q->whereBetween('price', [\request('price_from'), \request('price_to')]);
        });
        $query->when($request->utilities, function ($q) {
            $q->whereHas('utilities', function ($query) {
                $query->whereIn('utilities.id', \request('utilities'));
            });
        });
        $query->when($request->get('attributes'), function ($q) {
            foreach (\request('attributes') as $key=>$attribute) {
                if ($attribute['value'])
                $q->whereHas('attributes', function ($query) use ($attribute,$key) {
                    $query->where('attributes.id', $key)->where('order_attributes.value', $attribute['value']);
                });
            }
        });

        $query->when($request->lat and $request->lng, function ($q) {
            $q->select('*')->selectRaw('( 6356 * acos( cos( radians(?) ) *
                           cos( radians( `lat` ) )
                           * cos( radians( `lng` ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( `lat` ) ) )
                         ) AS distance', [request()->lat, request()->lng, request()->lat])
                /*   ->havingRaw("20 >=  distance")*/ ->orderBy('distance');
        });
        $query->limit(50)->with('user', 'neighborhood', 'attributes', 'utilities')->withCount('views');
        $query->when($request->sort, function ($q) {
            $q->sort(\request('sort'));
        });
        $query->with('attributes', 'category', 'utilities', 'user')->withExists('isFavoured');
    }

    public function favouriests()
    {
        return $this->morphMany(Favourite::class, 'model');
    }

    public function isFavoured()
    {
        return $this->morphMany(Favourite::class, 'model')->where('favourites.user_id', object_get(auth()->user(), 'id', 0));
    }

    public function scopeSort($query, $sort)
    {
        switch ($sort) {
            case "price_a":
                $query->orderBy('price', 'asc');
                break;
            case "price_d":
                $query->orderBy('price', 'desc');
                break;
            case "latest":
                $query->latest('updated_at');
                break;
            case  "today":
                $query->whereDate('created_at', now()->toDateString());
                break;
            case "views":
                $query->orderBy('views_count', 'desc');
                break;
        }
    }

    public function prunable()
    {
        return static::where('updated_at', '<=', now()->sub('month', 3));
    }

    public function requests()
    {
        return $this->hasMany(OrderRequest::class);
    }

    public static function createWithAttributes($inputs)
    {
        foreach (Arr::get($inputs,'attributes',[])as $key => $value){
           $attribute=Attribute::findOrFail($key);
           throw_unless($attribute or !$value,ValidationException::withMessages([__("{$attribute->name} must be presented")]));
        }
        $order=self::create($inputs);
        if (Arr::has($inputs,'images')) $order->addMultipleMediaFromRequest(['images'])->each(function ($fileAdder) {
            $fileAdder->toMediaCollection();
        });
        if (Arr::has($inputs,'attributes')) $order->attributes()->sync(Arr::get($inputs,'attributes'));
        if (Arr::has($inputs,'utilities')) $order->utilities()->sync(Arr::get($inputs,'utilities'));
        return  $order;
    }
}
