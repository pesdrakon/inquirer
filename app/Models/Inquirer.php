<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


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
