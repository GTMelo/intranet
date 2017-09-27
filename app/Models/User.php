<?php

namespace App\Models;

use App\Traits\Flaggable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use App\Models\Scopes\AtivoScope;

class User extends Authenticatable
{
    use Notifiable, LaratrustUserTrait, Flaggable;

    protected $fillable = [
        'cpf',
        'nome_curto',
        'slug',
        'nome_completo',
        'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['previous_last_login', 'current_last_login'];

    protected static function boot()
    {
        parent::boot();
        self::addGlobalScope(new AtivoScope());
    }

    public function rh(){
        return self::hasOne(UserRh::class);
    }

    public function ramal(){
        return $this->filterFlag($this->telefones, 'is-work')->first();
    }

    public function email_funcional(){
        return $this->filterFlag($this->emails, 'is-work')->first();
    }

    public function unidade(){
        return $this->rh->unidade();
    }

    public function telefones()
    {
        return $this->belongsToMany(Telefone::class);
    }

    public function emails()
    {
        return $this->belongsToMany(Email::class);
    }

    public static function ofSlug($slug){
        return self::where('slug', $slug)->first();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function ownOrAllowed($thing, $permission){
        return $thing->user_id == $this->id || $this->hasPermission($permission);
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
