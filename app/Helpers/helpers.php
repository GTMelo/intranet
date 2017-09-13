<?php

use App\Models\User;

function generate_nome_curto($nome_completo){

    $toArray = collect(explode(' ', $nome_completo));

    $nome_curto = $toArray->first() . ' ' . $toArray->last();
    $i = 0;

    while(User::ofSlug(str_slug($nome_curto))){
        $i++;
        $nome_curto .= $i;
    }

    return $nome_curto;
}