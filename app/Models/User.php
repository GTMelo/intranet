<?php

namespace App\Models;

use App\Model\Status;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use App\Models\Scopes\AtivoScope;

class User extends Authenticatable
{
    use Notifiable, LaratrustUserTrait;

    protected static function boot()
    {
        parent::boot();
        self::addGlobalScope(new AtivoScope());
    }

    protected $fillable = [
        'cpf', 'nome_completo', 'nome_curto', 'password', 'ativo', 'unidade_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['last_access'];

    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }

    public function scopeValido($query){
        return $query->where('status_id', '!==', Status::ofSlug('inactive'));
    }

    public function telefones(){
        return self::belongsToMany(Telefone::class);
    }

    public function main_telefone(){
        return self::belongsToMany(Telefone::class)->where('is_primary', true)->first();
    }
}
