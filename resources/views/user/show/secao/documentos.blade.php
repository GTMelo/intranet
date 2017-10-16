@extends('user.show')

@section('user-content')

    <section>
        <h1 class="is-size-2">Documentos</h1>

        <div>
            @forelse($user->rh->documentos as $documento)
                <documento-card
                        tipo="{{ $documento->tipo->display_name ?: '' }}"
                        @if($documento->imagem)
                        img="{{ Storage::url('documentos/' . $documento->imagem) ?: 'images/sem_imagem.png' }}"
                        @else
                        img="{{ asset('images/sem_imagem.png') }}"
                        @endif
                        numero="{{ $documento->identificacao ?: '' }}"
                        cpf="{{ $documento->cpf ?: '' }}"
                        expedidor="{{ $documento->orgao_expedidor ?: '' }}"
                        emissao="{{ $documento->data_emissao ?: '' }}"
                        validade="{{ $documento->validade ?: '' }}"
                        zona="{{ $documento->zona ?: '' }}"
                        secao="{{ $documento->secao ?: '' }}"
                        serie="{{ $documento->serie ?: '' }}">
                </documento-card>
            @empty
                <span>Nenhum documento encontrado.</span>
            @endforelse
        </div>
    </section>

@endsection