@extends('user.show')

@section('user-content')

    <section>
        <h1 class="is-size-2">Documentos</h1>

        <div>
            @forelse($user->rh->documentos as $documento)
                <documento-card
                tipo="{{ $documento->tipo->descricao or '' }}"
                img="http://via.placeholder.com/150x150"
                numero="{{ $documento->identificacao or '' }}"
                cpf="{{ $documento->cpf or '' }}"
                expedidor="{{ $documento->orgao_expedidor or '' }}"
                emissao="{{ $documento->data_emissao or '' }}"
                validade="{{ $documento->validade or '' }}"
                zona="{{ $documento->zona or '' }}"
                secao="{{ $documento->secao or '' }}"
                serie="{{ $documento->serie or '' }}">
                </documento-card>
            @empty
                <span>Nenhum documento encontrado.</span>
            @endforelse
        </div>
    </section>

@endsection