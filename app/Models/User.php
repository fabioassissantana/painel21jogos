<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'username',
        'token',
        'atk',
        'saldo',
        'valorapostado',
        'valordebitado',
        'valorganho',
        'rtp',
        'isinfluencer',
        'linha_ganho',
        'agentid',
    ];
}
