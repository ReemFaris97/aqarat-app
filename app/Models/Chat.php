<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasManyThrough(User::class,ChatUser::class);
    }

    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }
}
