<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserData
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $face_book
 * @property string|null $twitter
 * @property string|null $instagram
 * @property string|null $letter
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserData query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereFaceBook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereLetter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereUserId($value)
 * @mixin \Eloquent
 */
class UserData extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'face_book', 'twitter', 'instagram', 'letter'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
