@extends('user.show')

@section('user-content')

    <section>
        <h1 class="is-size-2">Escolaridade</h1>

        <i-table>
            <i-item label="Grau de Escolaridade">
                {{ $user->rh->grau_escolaridade() }}
            </i-item>
        </i-table>

        <h2 class="is-size-3">Títulos</h2>

        {{ ($user->rh->escolaridades->count() === 0)? 'Nenhum título registrado' : ''}}

        @foreach($user->rh->escolaridades as $item)
            <escolaridade-item
                    tipo="{{ $item->tipo->descricao }}"
                    instituicao="{{ $item->instituicao }}"
                    curso="{{ $item->titulo }}"
                    situacao="{{ $item->situacao }}"
                    inicio="{{ $item->inicio }}"
                    termino="{{ $item->termino }}"
            ></escolaridade-item>
        @endforeach

    </section>

    <section>
        <h1 class="is-size-2">Idiomas</h1>

        <table class="table is-fullwidth">
            <thead>
            <tr>
                <th>Idioma</th>
                <th>Leitura</th>
                <th>Escrita</th>
                <th>Compreensão</th>
                <th>Conversação</th>
            </tr>
            </thead>
            <tbody>
            @forelse($user->rh->idiomas as $idioma)
                <tr>
                    <th>{{ $idioma->descricao }}</th>
                    @foreach($idioma->nivel() as $item)
                        <td>{{ $item }}</td>
                    @endforeach
                </tr>
            @empty
                <td colspan="5">Nenhum idioma registrado</td>
            @endforelse
            </tbody>
        </table>
    </section>

@endsection