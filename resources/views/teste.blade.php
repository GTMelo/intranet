@extends('layouts.master')

@section('content')

    <section>
        <modaltwo classes="button" id="testeMe" text="VClick Mew">
            <p slot="card_header"></p>

            <span slot="card-footer">
                Test footer
            </span>
        </modaltwo>

    </section>

    {{--<section>--}}
        {{--<div class="grid gcols-{{ $gridSize }} grows-{{ $gridSize }} gap-small debug">--}}
            {{--@for ($i = 0; $i < $gridSize*$gridSize; $i++)--}}
                {{--<div>{{ $i }}</div>--}}
            {{--@endfor--}}
        {{--</div>--}}
    {{--</section>--}}

    {{--<main class="container">--}}

        {{--<img src="{{Storage::url('documentos/' . \App\Models\User::first()->rh->documentos->first()->imagem)}}">--}}

        {{--<section>--}}
            {{--<i-table>--}}
                {{--<i-item label="thing">thang</i-item>--}}
            {{--</i-table>--}}
        {{--</section>--}}

        {{--<section>--}}

            {{--<form>--}}
                {{--<ul>--}}
                    {{--<li v-for="item in testArray" v-text="item" ></li>--}}
                    {{--<input type="text"> <button v-on="click">Add</button>--}}
                {{--</ul>--}}
            {{--</form>--}}


        {{--</section>--}}

        {{--<section>--}}
            {{--<form enctype="multipart/form-data" method="post" action="/teste">--}}
                {{--{{ csrf_field() }}--}}
                {{--<input name="imagem" type="file">--}}
                {{--<input name="identificacao" type="text" placeholder="ident">--}}
                {{--<input name="orgao_expeditor" type="text" placeholder="org_exp">--}}
                {{--<input name="data_emissao" type="datetime-local" placeholder="data_emis">--}}
                {{--<input name="validade" type="datetime-local" placeholder="valid">--}}
                {{--<input name="zona" type="text" placeholder="zona">--}}
                {{--<input name="subsecao" type="text" placeholder="subsecao">--}}
                {{--<input name="serie" type="text" placeholder="serie">--}}
                {{--<input name="tipo_documento_id" type="hidden" value="1">--}}
                {{--<input name="user_rh_id" type="hidden" value="1">--}}
                {{--<button type="submit">Enviar</button>--}}
            {{--</form>--}}

            {{--@if(\App\Models\Documento::latest()->first())--}}
                {{--<img src="{{ Storage::disk('local')->url(App\Models\Documento::latest()->first()->imagem) }}">--}}
                {{--<pre>--}}
                {{--{{ \App\Models\Documento::latest()->first() }}--}}
                {{--</pre>--}}
            {{--@endif--}}
            {{--<pre>--}}
            {{--</pre>--}}
        {{--</section>--}}

        {{--<section class="section">--}}
            {{--<div>--}}
                {{--<label>Teste Vue</label>--}}
                {{--<input type="text" v-model="foo">--}}
            {{--</div>--}}
            {{--<br>--}}
            {{--<div>--}}
                {{--<pre>@{{ $data }}</pre>--}}
            {{--</div>--}}
        {{--</section>--}}
        {{--<section class="section">--}}
            {{--<input type="text" v-model="newName">--}}
            {{--<button @click="addName">add name</button>--}}
            {{--<ul>--}}
                {{--<li v-for="name in names" v-text="name"></li>--}}
            {{--</ul>--}}
        {{--</section>--}}

    {{--</main>--}}

@endsection

@section('scripts')
    <script>
        var thing = {
            thang: 'stuff'
        };

        function calculate(arg){
            console.log(this);
        }

        console.log(this.thing);




    </script>
@endsection