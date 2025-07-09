<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Agent extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'agentCode',
        'saldo',
        'agentToken',
        'secretKey',
        'probganho',
        'probbonus',
        'probganhortp',
        'probganhoinfluencer',
        'probbonusinfluencer',
        'probganhoaposta',
        'probganhosaldo',
        'callbackurl',
        'senha',
    ];

    protected $hidden = [
        'senha',
    ];

    public function getAuthPassword()
    {
        return $this->senha;
    }

    // Adiciona um accessor 'name' para o Filament
    public function getNameAttribute(): string
    {
        return $this->agentCode; 
    }

    // Mantém getFilamentName para compatibilidade, embora getNameAttribute seja mais direto
    public function getFilamentName(): string
    {
        return $this->agentCode; 
    }
}
