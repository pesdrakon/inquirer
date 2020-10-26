<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Inquirer
 *
 * @property int $id
 * @property string $key
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Answer[] $answers
 * @property-read int|null $answers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Question[] $questions
 * @property-read int|null $questions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Inquirer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inquirer newQuery()
 * @method static \Illuminate\Database\Query\Builder|Inquirer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Inquirer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Inquirer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquirer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquirer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquirer whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquirer whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inquirer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Inquirer withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Inquirer withoutTrashed()
 * @mixin \Eloquent
 */
class Inquirer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'key'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function answers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Answer::class, 'inquirer_id', 'id');
    }

    public function questions(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Question::class,Answer::class, 'inquirer_id', 'answer_id');
    }
}
