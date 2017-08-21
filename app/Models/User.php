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
        return self::belongsToMany(Telefone::class)->withPivot('is_main');
    }

    public function main_telefone(){
        return self::belongsToMany(Telefone::class)->wherePivot('is_main', true)->first();
    }

    public function emails(){
        return self::belongsToMany(Email::class)->withPivot('is_main');
    }

    public function main_email(){
        return self::belongsToMany(Email::class)->wherePivot('is_main', true)->first();
    }

    public function getCpfAttribute($value){

        $mask = '###.###.###-##';

        $str = str_replace(" ","",$value);

        for($i=0;$i<strlen($value);$i++){
            $mask[strpos($mask,"#")] = $value[$i];
        }

        return $mask;
    }

}
