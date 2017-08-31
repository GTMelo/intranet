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

    public function show(User $user){

        return view('user/show', compact('user'));

    }

    public function edit(User $user){

        return view('user/edit', compact('user'));

    }


}
