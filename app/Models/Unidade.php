<?php

namespace App\Models;

use App\Models\Scopes\AtivoScope;
use App\Traits\Seedable;


class Unidade extends Model
{



    protected $fillable = [
        'sigla', 'unidade_superior_id', 'descricao', 'tldr', 'status_id'
    ];


    protected static function boot()
    {

        self::addGlobalScope(new AtivoScope());
        parent::boot();

    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function unidade_superior()
    {

        return $this->hasOne(self::class, 'id', 'unidade_superior_id');

    }

    public function hierarquia()
    {

        $result = collect([]);

        $unidade_atual = $this->unidade_superior;

        while ($unidade_atual != null) {

            $result->push($unidade_atual);
            $unidade_atual = $unidade_atual->unidade_superior;

        }

        return $result;

    }
}
