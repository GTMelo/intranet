<?php

namespace App\Models;


use Illuminate\Support\Collection;

class Pais extends Model
{

    protected $table = 'paises';

    protected $guarded = ['id'];

    /**
     * Lista os estados de um país
     * @return \Illuminate\Database\Eloquent\Relations\HasMany Lista de estados do país
     */
    public function estados(){
        return $this->hasMany(Estado::class);
    }

    /**
     * Lista as cidades de um país, a partir dos estados que o país tem
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough cidades a partir do estado
     */
    public function cidades()
    {
        return $this->hasManyThrough(Cidade::class, Estado::class);
    }

    /**
     * Lista as cidades de um país que tenha sido marcadas como capitais
     * @return Collection A lista de capitais de um país
     */
    public function capitais()
    {

        return $this->cidades->filter(function ($value){
            return $value->hasFlag('is-capital');
        });

    }

    /**
     * Função apenas para açúcar, já que a maioria dos país tem somente uma capital
     * @return static
     */
    public function capital(){
        return $this->capitais();
    }

}
