<?php

function generate_nome_curto($nome_completo){

    $toArray = collect(explode(' ', $nome_completo));

    return $toArray->first() . ' ' . $toArray->last();

}