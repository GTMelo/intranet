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

    public function show(User $slug, $secao = null){



//        $user = User::ofSlug($slug);
//
//        if(!$user) return redirect('usuarios')->withErrors(['userNotFound' => "O usuário \"$slug\" não foi encontrado"]);
//
//        switch($secao){
//            default:
//                return view('user/show/secao/basico', compact('user', 'secao'));
//        }
//
//        return view('user/show', compact('user'));

    }

    public function edit($slug, $subsecao){

        $user = User::ofSlug($slug);

        return view('user/edit', compact('user', 'subsecao'));

    }


}
