@extends('layouts.master')

@section('content')

    @include('layouts.partials.page_header', [
    'title' => 'Editando usuário',
    'sub' => 'Altere as informações desejadas e clique em Salvar, no fim da página.'
     ])

    <main class="container">
        <form>
            {{ csrf_field() }}
            <section>
                <h2 class="is-size-2">Dados Básicos</h2>
                <input-text label="Nome Completo" name="nome_completo"></input-text>
                <input-password label="Senha" name="password"></input-password>

            </section>
        </form>
    </main>

@endsection