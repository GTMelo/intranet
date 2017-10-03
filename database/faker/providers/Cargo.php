<?php
/**
 * Created by PhpStorm.
 * User: 02364114110
 * Date: 29/09/2017
 * Time: 11:33
 */

namespace Faker\Provider;


class Cargo extends Base
{
    private $inicio = [
        'Secretario', 'Diretor', 'Diretor-geral',
        'Superintendente', 'Presidente', 'Chefe',
        'Coordenador-geral', 'Coordenador',
        'Procurador', 'Analista', 'Agente', 'Técnico',
        'Ministro', 'Delegado', 'Auditor', 'Controlador',
        'Controlador-geral', 'Gerente', 'Assistente',
        'Concierge', 'Ouvidor', 'Supervisor', 'Assessor'
    ];

    private $escopo = [
        'Assuntos', 'Temas'
    ];

    private $tema = [
        'Econômicos', 'Financeiros', 'Ecológicos',
        'Organizacionais', 'Políticos', 'Filosóficos',
        'Estrategicos', 'Ambientais', 'Tributários',
        'Previdenciários', 'Tecnológicos', 'Comerciais'
    ];

    private $modifiers = [
        'Municipais', 'Estaduais', 'Regionais',
        'Internacionais', ''
    ];

    public function cargo(){

        $a = collect($this->inicio)->random();
        $b = collect($this->escopo)->random();
        $c = collect($this->tema)->random();
        $d = collect($this->modifiers)->random();

        $result = "$a de $b $c $d";

        return trim("$a de $b $c $d");
    }

}