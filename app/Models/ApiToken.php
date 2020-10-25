<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiToken extends Model
{

    protected $fillable = ['api_token', 'ended_at'];
    protected $hidden = ['created_at', 'updated_at'];

}
