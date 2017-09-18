@extends('layouts.master')

@section('content')

    @include('user.show.hero_banner')

    <main class="container user-profile">

        <aside class="menu">
            <p class="menu-label">Navegação</p>
            <ul class="menu-list">
                <li>
                    <a href="/usuarios/{{ $user->slug() }}/rh/basicos" @if($subsecao == 'basicos' || !isset($subsecao)) class="is-active" @endif>Dados pessoais</a>
                </li>

                <li>
                    <a href="/usuarios/{{ $user->slug() }}/rh/pessoais" @if($subsecao == 'pessoais') class="is-active" @endif>Dados pessoais</a>
                </li>

                <li>
                    <a href="/usuarios/{{ $user->slug() }}/rh/escolaridade" @if($subsecao == 'escolaridade') class="is-active" @endif>Escolaridade, idiomas e conhecimentos</a>
                </li>

                <li>
                    <a href="/usuarios/{{ $user->slug() }}/rh/documentos" @if($subsecao == 'documentos') class="is-active" @endif>Documentos</a>
                </li>

                <li>
                    <a href="/usuarios/{{ $user->slug() }}/rh/funcionais" @if($subsecao == 'funcionais') class="is-active" @endif>Tipo de Vínculo com a Administração Pública</a>
                </li>

            </ul>
        </aside>
        <main>
            @if(isset($subsecao))
                @include('user.show.subsecao.' . $subsecao)
            @else
                @include('user.show.subsecao.basicos')
            @endif
        </main>


        {{--<section>This is the main</section>--}}
        {{--<aside>This is the sidebar</aside>--}}

        {{--@if(request()->get('secao')subsecao
            {{--@if(request()->get('secao')subsecaorecursos_humanos') @include('user.show.recursos_humanos') @endif--}}
        {{--@else--}}
        {{--@include('user.show.recursos_humanos')--}}
        {{--@endif--}}
    </main>
@endsection