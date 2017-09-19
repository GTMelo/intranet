<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRh;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){

        $users = UserRh::paginate(15);

        return view('user/index', compact('users', 'tab'));

    }

    public function show(User $user, $secao = null){

        if (!$user) return redirect('usuarios')->withErrors(['userNotFound' => "O usuário \"$user\" não foi encontrado"]);

        $secoes = collect(['basico', 'pessoal', 'funcional', 'escolaridade', 'documentos']);

        if($secoes->contains($secao)){
            return view('user/show/secao/' . $secao, compact('user', 'secao'));
        } else {
            $secao = 'basico';
            return view('user/show/secao/basico', compact('user', 'secao'))->withErrors('A página não foi encontrada');
        }
    }

    public function edit($slug, $subsecao){
    }


}
