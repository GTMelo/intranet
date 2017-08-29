<?php

namespace App\Models;

use App\Traits\Encryptable;
use Illuminate\Database\Eloquent\Model;

class DadoBancario extends Model
{
    use Encryptable;

    protected $encrypted = [
        'agencia', 'conta'
    ];

    protected $table = 'dados_bancarios';

    public function user(){
        return $this->belongsTo(UserRh::class);
    }

    public function banco(){
        return $this->belongsTo(Banco::class);
    }

}