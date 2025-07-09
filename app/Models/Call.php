<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $fillable = [
        'iduser',
        'gamecode',
        'jsonname',
        'steps',
        'bycall',
        'aw',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }
}
