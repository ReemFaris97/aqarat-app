<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\CommonQuestion
 *
 * @property int $id
 * @property array $question
 * @property array $answer
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @method static \Illuminate\Database\Eloquent\Builder|CommonQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommonQuestion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommonQuestion query()
 * @method static \Illuminate\Database\Eloquent\Builder|CommonQuestion whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommonQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommonQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommonQuestion whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommonQuestion whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommonQuestion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CommonQuestion extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['question', 'answer'];
    protected $fillable = ['question', 'answer', 'status'];

    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }
}
