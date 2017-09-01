<?php

namespace App\Http\Controllers;

use App\Models\Documento;
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
            'imagem' => $request->file('imagem')->store('public/documentos'),
            'identificacao' => $request['identificacao'],
            'tipo_documento_id' => $request['tipo_documento_id'],
            'user_rh_id' => $request['user_rh_id'],
        ]);

        $others = [
            'orgao_expeditor',
            'validade',
            'zona',
            'secao',
            'serie',
        ];

        foreach ($others as $item){
            if($request[$item]) $doc->$item = $request[$item];
        }

        $doc->save();

        return back();
    }

}
