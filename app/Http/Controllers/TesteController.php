<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TesteController extends Controller
{

    public function index()
    {
        return view('teste');
    }

    public function docStore(Request $request)
    {
        $doc = Documento::create([
            'imagem' => $request->file('imagem')->store('documentos'),
            'identificacao' => $request['identificacao'],
            'orgao_expeditor' => $request['orgao_expeditor'],
            'data_emissao' => Carbon::createFromFormat('d/m/Y', $request['data_emissao']),
            'validade' => $request['validade'],
            'zona' => $request['zona'],
            'secao' => $request['secao'],
            'serie' => $request['serie'],
            'tipo_documento_id' => $request['tipo_documento_id'],
            'user_rh_id' => $request['user_rh_id'],
        ]);

        return back();
    }

}
