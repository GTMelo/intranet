<?php

namespace App\Models;

use App\Traits\Flaggable;
use App\Traits\Seedable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Laratrust\Traits\LaratrustUserTrait;
use App\Models\Scopes\NaoDeletadoScope;

class User extends Authenticatable
{
    use Notifiable, LaratrustUserTrait, Flaggable, Seedable;

    protected $fillable = [
        'cpf',
        'nome_curto',
        'slug',
        'nome_completo',
        'password',
        'is_aprovado',
        'is_suspenso'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['previous_last_login', 'current_last_login'];

    protected $casts = [
        'is_aprovado' => 'boolean',
        'is_suspenso' => 'boolean'
    ];

    public function aprovar(){
        $this->is_aprovado = true;
        $this->save();
    }

    public function desaprovar(){
        $this->is_aprovado = false;
        $this->save();
    }

    public function isAprovado(){
        return $this->is_aprovado;
    }

    public function suspender(){
        $this->is_suspenso = true;
        $this->save();
    }

    public function reativar(){
        $this->is_suspenso = false;
        $this->save();
    }

    public function isSuspenso(){
        return $this->is_suspenso;
    }

    public function scopeAprovado($query, $inverter = false){
        return $query->where('is_aprovado', !$inverter);
    }

    public function scopeAtivo($query, $inverter = false){
        return $query->where('is_suspenso', $inverter);
    }

    public function scopeValido($query){
        return $query->aprovado()->ativo();
    }

//    public function rh(){
//        return $this->hasOne(Rh::class);
//    }
//
//    public function unidade(){
//        return $this->belongsTo(Unidade::class);
//    }
//
//    public function unidadeDescricao(){
//        return ($this->unidade)?$this->unidade->descricao:false;
//    }
//
//    public function unidadeSigla(){
//        return ($this->unidade)?$this->unidade->sigla:false;
//    }
//
//    public function telefones()
//    {
//        return $this->belongsToMany(Telefone::class);
//    }
//
//    public function ramais(){
//        return $this->relationsWithFlag('telefones', 'is-work');
//    }
//
//    public function emails()
//    {
//        return $this->belongsToMany(Email::class);
//    }
//
//    public function emails_funcionais(){
//        return $this->relationsWithFlag('emails', 'is-work');
//    }
//
//    public function email(){
//        return $this->emails()->first();
//    }

    public static function ofSlug($slug){
        return static::where('slug', $slug)->first();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

//    public function canOrOwns($thing, $permissions, $fk = 'user_id'){
//
//        if(!auth()->check()) return false;
//
//        if(is_int($thing)) return $this->id === $thing || $this->can($permissions);
//
//        return $this->owns($thing, $fk) || $this->can($permissions);
//
//    }
//
//    public function getFotoAttribute($value){
//            return ($value)?Storage::url('documentos/' . $value):'/images/sem_imagem.png';
//    }
//
//    public function getCpfAttribute($value)
//    {
//
//        $mask = '###.###.###-##';
//
//        $str = str_replace(" ", "", $value);
//
//        for ($i = 0, $iMax = strlen($value); $i < $iMax; $i++) {
//            $mask[strpos($mask, "#")] = $value[$i];
//        }
//
//        return $mask;
//    }
//
//    public function setCpfAttribute($value)
//    {
//
//        $value = str_replace([' ', '/', '.', '-'], "", $value);
//
//        $this->attributes['cpf'] = $value;
//
//    }

//    public function aprovar(){
//        $this->removeFlag('approval-pending');
//        return !$this->hasFlag('approval-pending');
//    }
//
//    /**
//     * @return mixed
//     * Suggar pra ver usuários aprovados
//     */
//    public function scopeAprovados(){
//        return self::withFlag('approval-pending', true);
//    }

//    /**
//     * @return mixed
//     * Suggar pra ver usuários pendentes
//     */
//    public function scopePendentes(){
//        return self::withFlag('approval-pending');
//    }

}
