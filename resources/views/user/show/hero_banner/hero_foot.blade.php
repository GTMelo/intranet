@if(auth()->user()->hasPermission(['read-rhdata']))
    <div class="hero-foot">
        <nav class="tabs is-boxed is-fullwidth">
            <div class="container">
                <ul>
                    <li @if(request()->get('secao') == 'dados_basicos' ) class="is-active" @endif><a
                                href="/usuarios/{{$user->slug()}}?secao=dados_basicos">Dados Básicos</a></li>
                    <li @if(request()->get('secao') == 'dados_pessoais' ) class="is-active" @endif><a
                                href="/usuarios/{{$user->slug()}}?secao=dados_pessoais">Dados Pessoais</a></li>
                    <li @if(request()->get('secao') == 'dados_funcionais' ) class="is-active" @endif><a
                                href="/usuarios/{{$user->slug()}}?secao=dados_funcionais">Dados Funcionais</a></li>
                    <li @if(request()->get('secao') == 'dados_academicos' ) class="is-active" @endif><a
                                href="/usuarios/{{$user->slug()}}?secao=dados_academicos">Dados Acadêmicos</a></li>
                </ul>
            </div>
        </nav>
    </div>
@endif