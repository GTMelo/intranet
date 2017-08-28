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
}
