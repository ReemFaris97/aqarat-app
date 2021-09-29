<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Chat
 *
 * @property int $id
 * @property string $model_type
 * @property int $model_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChatMessage[] $messages
 * @property-read int|null $messages_count
 * @property-read Model|\Eloquent $model
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChatUser[] $users
 * @property-read int|null $users_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $usersModel
 * @property-read int|null $users_model_count
 * @method static \Illuminate\Database\Eloquent\Builder|Chat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Chat extends Model
{
    use HasFactory;

    protected $touches = ['messages'];
    protected $fillable = ['model_type', 'model_id'];

    public function model()
    {
        return $this->morphTo('model');
    }

    public function users()
    {
        return $this->hasMany(ChatUser::class);
    }

    public function usersModel()
    {
        return $this->belongsToMany(User::class,ChatUser::class);
    }

    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }
}
