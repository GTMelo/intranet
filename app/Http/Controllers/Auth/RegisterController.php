<?php

namespace App\Http\Controllers\Auth;

use App\Models\Email;
use App\Models\Telefone;
use App\Models\Unidade;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\UserRh;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'cpf' => 'required|string|unique:users',
            'nome_completo' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'cpf' => $data['cpf'],
            'nome_curto' => generate_nome_curto($data['nome_completo']),
            'nome_completo' => $data['nome_completo'],
            'password' => bcrypt($data['password']),
        ]);

        $userRh = UserRh::create([
            'user_id' => $user->id,
            'unidade_id' => Unidade::first()->id,
        ]);

        $userRh->telefones()->attach(Telefone::find(1));
        $userRh->emails()->attach(Email::find(1));

        Session::flash('messages', 'Sua conta foi criada com sucesso.');

        return $user;
    }
}
