<?php

use App\Models\User;

function makeNomeCurto($nome_completo){

    $toArray = collect(explode(' ', $nome_completo));

    $nome_curto = $toArray->first() . ' ' . $toArray->last();

    $result = $nome_curto;

    if(User::where('nome_curto', $nome_curto)->get()->isNotEmpty()){
        $i = 0;
        while(User::where('nome_curto', $result)->get()->isNotEmpty()){
            $result = $nome_curto . $i;
            $i++;
        }
    }

    return $result;
}

function makeSlug($nome_completo){

    $nome_curto = makeNomeCurto($nome_completo);

    $slug = str_slug($nome_curto);

    if(User::where('slug', $slug)->get()->isNotEmpty()){
        $i = 0;
        while(User::where('slug', $slug)->get()->isNotEmpty()){
            $slug = str_slug($nome_curto) . $i;
            $i++;
        }
    }

    return $slug;

}

function makeAbrv($nome_completo){

    $stripped = str_replace(['de', 'da', 'dos', 'das', 'para'], '' ,$nome_completo);
    $toAbrv = collect(explode(' ', $stripped));
    $result = '';

    foreach ($toAbrv as $item){
        $result .= substr($item, 0, 1);
    }

    $result = strtoupper($result);

    return $result;

}