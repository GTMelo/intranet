<?php

namespace App\Models;



class Idioma extends Model
{

    protected $guarded = ['id'];

    public $timestamps = false;

    public function users(){
        return $this->belongsToMany(Rh::class, 'idioma_rh', 'idioma_id', 'rh_id')
            ->withPivot(['leitura','escrita','compreensao','conversacao',]);
    }

    public function nivel($area = null){

        if(!$area) return collect([
           'leitura' => $this->pivot->leitura,
           'escrita' => $this->pivot->escrita,
           'compreensao' => $this->pivot->compreensao,
           'conversacao' => $this->pivot->conversacao
        ]);

        return $this->pivot->$area;
    }

}
