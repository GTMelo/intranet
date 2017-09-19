<?php

namespace App\Models;

use App\Traits\Flaggable;
use Illuminate\Database\Eloquent\Model;

class UserRh extends Model
{
    use Flaggable;

    protected $table = 'users_rh';

    protected $primaryKey = 'user_id';

    protected $guarded = [];

    protected $dates = ['data_nascimento', 'entrada_sain'];

    public $incrementing = false;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function slug(){
        return $this->user->slug();
    }

    public function cpf(){
        return $this->user->cpf;
    }

    public function telefones()
    {
        return $this->belongsToMany(Telefone::class, 'telefone_user_rh', 'user_rh_id');
    }

    public function telefone_pessoal(){
        return $this->telefones();
    }

    public function telefone_residencial(){
        return $this->filterFlag($this->telefones, 'personal')->first();
    }

    public function telefone_celular(){
        return $this->filterFlag($this->telefones, 'is-cellphone')->first();
    }

    public function ramal(){
        return $this->filterFlag($this->telefones, 'is-work')->first();
    }

    public function emails()
    {
        return $this->belongsToMany(Email::class, 'email_user_rh', 'user_rh_id');
    }

    public function naturalidadeCidade(){

        return $this->belongsTo(Cidade::class, 'naturalidade_id');
    }

    public function naturalidade(){

        return $this->naturalidadeCidade;
    }

    public function nacionalidade(){
        return $this->naturalidadeCidade->estado->pais->adjetivo_patrio;
    }

    public function email_pessoal(){
        return $this->filterFlag($this->emails, 'is-personal')->first();
    }

    public function email_funcional(){
        return $this->filterFlag($this->emails, 'is-work')->first();
    }

    public function endereco(){
        return $this->belongsTo(Endereco::class);
    }

    public function dado_bancario(){
        return $this->belongsTo(DadoBancario::class, 'dado_bancario_id');
    }

    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }

    public function cargo(){
        return $this->belongsTo(Cargo::class);
    }

    public function documentos(){
        return $this->hasMany(Documento::class);
    }

    public function escolaridades(){
        return $this->hasMany(Escolaridade::class, 'user_id');
    }

    public function idiomas(){
        return $this->belongsToMany(Idioma::class, 'idioma_user_rh', 'user_rh_id', 'idioma_id')
            ->withPivot(['leitura','escrita','compreensao','conversacao',]);
    }

    public function dependentes(){
        return $this->hasMany(Dependente::class, 'user_rh_id');
    }

    public function pai(){
        return $this->dependentes()->where('tipo_dependente_id', TipoDependente::ofTipo('pai')->id)->first();
    }

    public function mae(){
        return $this->dependentes()->where('tipo_dependente_id', TipoDependente::ofTipo('mãe')->id)->first();
    }

    public function conjuge(){
        return $this->dependentes()->where('tipo_dependente_id', TipoDependente::ofTipo('conjuge')->id)->first();
    }

    public function getSexoAttribute($value){
        if($value == 'm') return 'masculino';
        if($value == 'f') return 'feminino';
    }
}