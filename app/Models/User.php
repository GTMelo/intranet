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
        'cpf',
        'nome_curto',
        'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['last_access', 'data_nascimento'];

    public function rh(){
        return self::hasOne(UserRh::class);
    }

    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }

    public function getCpfAttribute($value)
    {

        $mask = '###.###.###-##';

        $str = str_replace(" ", "", $value);

        for ($i = 0; $i < strlen($value); $i++) {
            $mask[strpos($mask, "#")] = $value[$i];
        }

        return $mask;
    }

    public function setCpfAttribute($value)
    {

        $value = str_replace([' ', '/', '.', '-'], "", $value);

        $this->attributes['cpf'] = $value;

    }

}
