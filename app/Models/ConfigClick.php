<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfigClick extends Model
{
    protected $fillable = [
        'user_id',
        'game_code',
        'json',
        'created_at',
    ];
}
