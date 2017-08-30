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

    public $incrementing = false;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function telefones()
    {
        return $this->belongsToMany(Telefone::class, 'telefone_user_rh', 'user_rh_id');
    }

    public function telefone_pessoal(){
        return $this->telefones();
    }

    public function telefone_residencial(){
        return $this->filterFlag($this->telefones, 'personal');
    }

    public function ramal(){
        return $this->filterFlag($this->telefones, 'is-work')->first();
    }

    public function emails()
    {
        return $this->belongsToMany(Email::class, 'email_user_rh', 'user_rh_id');
    }

    public function naturalidade(){

        return $this->belongsTo(Cidade::class, 'naturalidade_id');
    }

    public function nacionalidade(){
        return $this->naturalidade->estado->pais->adjetivo_patrio;
    }

    public function email_pessoal(){
        return $this->filterFlag($this->emails, 'is-personal')->first();
    }

    public function email_funcional(){
        return $this->filterFlag($this->emails, 'is-work')->first();
    }

    public function telefone_celular(){
        return $this->filterFlag($this->telefones, 'is-cellphone');
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
}
