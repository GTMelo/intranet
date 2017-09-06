<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cpf' => 'required|string|unique:users',
            'nome_completo' => 'required|string|max:255',
            'nome_curto' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function persist(){

    }
}
