<?php

namespace App\Models;

use App\Traits\Flaggable;
use App\Traits\Seedable;


class Rh extends Model
{

    use Flaggable, Seedable;

    protected $primaryKey = 'user_id';

    public $incrementing = false;

    protected $guarded = [];

    public $timestamps = false;

    protected $dates = ['data_nascimento', 'entrada_sain'];

    // USER ===================================================
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cpf(){
        return $this->user->cpf;
    }

    // DEPENDENTES ============================================
    public function dependentes(){
        return $this->hasMany(Dependente::class, 'rh_id');
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

    // CARGO ==================================================
    public function cargo(){
        return $this->belongsTo(Cargo::class);
    }

    public function cargoAbreviacao(){
        return ($this->cargo)?$this->cargo->abreviacao:null;
    }

    public function cargoDescricao(){
        return ($this->cargo)?$this->cargo->descricao:null;
    }


    // VINCULO ================================================
    public function vinculo(){
        return $this->hasOne(Vinculo::class, 'rh_id');
    }

    public function endereco(){
        return $this->belongsTo(Endereco::class);
    }

    public function dado_bancario(){
        return $this->belongsTo(DadoBancario::class, 'dado_bancario_id');
    }
//

    public function documentos(){
        return $this->hasMany(Documento::class, 'rh_id');
    }

    public function documento($tipo){
        // TODO Cache tipo documentos, trocar esta query para cache
        $tipoId = TipoDocumento::ofTipo($tipo)->id;
        dd($tipoId);
        return $this->documentos->keyBy('tipo_documento_id')[$tipoId];
    }

    // ESCOLARIDADE============================================
    public function escolaridades(){
        return $this->hasMany(Escolaridade::class, 'rh_id');
    }

    public function grau_escolaridade(){

        $escolaridades = $this->escolaridades;
        $grauMaisAlto = 0;
        foreach ($escolaridades as $escolaridade){
            $grau = $escolaridade->tipo->nivel;
            if($grau > $grauMaisAlto) $grauMaisAlto = $grau;
        }

        switch ($grauMaisAlto){
            case 1:
                return 'Ensino Fundamental';
            case 2:
                return 'Ensino Médio';
            case 3:
                return 'Graduação';
            case 4||5:
                return 'Pós-Graduação';
            default:
                return 'Não avaliado';
        }
    }

    // IDIOMAS ================================================
    public function idiomas(){
        return $this->belongsToMany(Idioma::class, 'idioma_rh', 'rh_id')
            ->withPivot(['leitura','escrita','compreensao','conversacao',]);
    }

    public function addIdioma(Idioma $idioma, $leitura = null, $escrita = null, $compreensao = null, $conversacao = null){

        return $this->idiomas()->attach($idioma, [
            'leitura' => $leitura ?: 'básico',
            'escrita' => $escrita ?: 'básico',
            'compreensao' => $compreensao ?: 'básico',
            'conversacao' => $conversacao ?: 'básico',
        ]);
    }

    public function removeIdioma(Idioma $idioma = null){
        return $this->idiomas()->detach($idioma);
    }

    public function updateIdioma(Idioma $idioma, $updatedData){
        return $this->idiomas()->updateExistingPivot($idioma->id, $updatedData);
    }

    // OUTROS ==================================================

    public function telefone_residencial(){
        return $this->user->relationsWithFlag('telefones', 'is-personal');
    }

    public function telefone_celular(){
        return $this->user->relationsWithFlag('telefones', 'is-cellphone');
    }


    public function email_pessoal(){
        return $this->user->relationsWithFlag('emails', 'is-personal');
    }


    public function getSexoAttribute($value){
        if($value == 'm') return 'Masculino';
        if($value == 'f') return 'Feminino';
    }
}