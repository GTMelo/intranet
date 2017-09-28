<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRh;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){

        $users = User::aprovado()->paginate(15);

        return view('user/index', compact('users', 'tab'));

    }

    public function show(User $user, $secao = null){

        $secoes = collect(['basico', 'pessoal', 'funcional', 'escolaridade', 'documentos']);

        if (!$user) return redirect('usuarios')->withErrors(['userNotFound' => "O usuário \"$user\" não foi encontrado"]);
        if(!$secao) return view('user/show/secao/basico', compact('user', 'secao'));


        if($secoes->contains($secao)){
            return view('user/show/secao/' . $secao, compact('user', 'secao'));
        }
        else {
            $wrongPage = $secao;
            $secao = 'basico';
            return view('user/show/secao/basico', compact('user', 'secao'))->withErrors("A página \"$wrongPage\" não foi encontrada");
        }
    }

    public function edit($slug, $subsecao){
    }


}
