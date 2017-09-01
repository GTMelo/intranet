@extends('layouts.master')

@section('content')

    <main class="container">

        <section>
            <form enctype="multipart/form-data" method="post" action="/teste">
                {{ csrf_field() }}
                <input name="imagem" type="file">
                <input name="identificacao" type="text" placeholder="ident">
                <input name="orgao_expeditor" type="text" placeholder="org_exp">
                <input name="data_emissao" type="datetime-local" placeholder="data_emis">
                <input name="validade" type="datetime-local" placeholder="valid">
                <input name="zona" type="text" placeholder="zona">
                <input name="secao" type="text" placeholder="secao">
                <input name="serie" type="text" placeholder="serie">
                <input name="tipo_documento_id" type="hidden" value="1">
                <input name="user_rh_id" type="hidden" value="1">
                <button type="submit">Enviar</button>
            </form>

            <img src="{{ Storage::disk('local')->url(App\Models\Documento::latest()->first()->imagem) }}">
            <pre>
                {{ \App\Models\Documento::latest()->first() }}
            </pre>
            <pre>
            </pre>
        </section>

        <section class="section">
            <div>
                <label>Teste Vue</label>
                <input type="text" v-model="foo">
            </div>
            <br>
            <div>
                <pre>@{{ $data }}</pre>
            </div>
        </section>
        <section class="section">
            <input type="text" v-model="newName">
            <button @click="addName">add name</button>
            <ul>
                <li v-for="name in names" v-text="name"></li>
            </ul>
        </section>

    </main>

@endsection