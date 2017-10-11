<?php

namespace App\Models;

use App\Traits\Encryptable;


class DadoBancario extends Model
{
    use Encryptable;

    protected $encrypted = [
        'agencia', 'conta'
    ];

    protected $table = 'dados_bancarios';

    public function user(){
        return $this->belongsTo(Rh::class);
    }

    public function banco(){
        return $this->belongsTo(Banco::class);
    }

}
