<?php

namespace App\Models;

use App\Traits\Flaggable;
use App\Traits\Seedable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use App\Models\Scopes\AtivoScope;

class User extends Authenticatable
{
    use Notifiable, LaratrustUserTrait, Flaggable, Seedable;

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
        return $this->hasOne(Rh::class);
    }

    public function unidade(){
        return $this->belongsTo(Unidade::class);
    }

    public function telefones()
    {
        return $this->belongsToMany(Telefone::class);
    }

//    public function ramal(){
//        return $this->filterFlag($this->telefones, 'is-work')->first();
//    }

    public function emails()
    {
        return $this->belongsToMany(Email::class);
    }

//    public function email(){
//        return $this->filterFlag($this->emails, 'is-work')->first();
//    }

    public static function ofSlug($slug){
        return self::where('slug', $slug)->first();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function canOrOwns($thing, $permissions, $fk = 'user_id'){
        return $this->owns($thing, $fk) || $this->can($permissions);
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

    public function aprovar(){
        $this->removeFlag('approval-pending');
    }

    /**
     * @return mixed
     * Suggar pra ver usuários aprovados
     */
    public static function aprovados(){
        return self::aprovado()->get();
    }

    /**
     * @return mixed
     * Suggar pra ver usuários pendentes
     */
    public static function pendentes(){
        return self::aprovado(true)->get();
    }

    public function scopeAprovado($query, $reversed = false){

        if($reversed) {
            return $query->whereHas('flags', function ($query){
                $query->where('flag_id', Flag::ofCode('approval-pending')->id);
            });
        }

        return $query->whereDoesntHave('flags', function ($query){
            $query->where('flag_id', Flag::ofCode('approval-pending')->id);
        });
    }

}
