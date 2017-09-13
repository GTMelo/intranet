<section class="hero hero-with-image is-primary">
    <div class="hero-body">
        <div class="container">
            <div class="hero-image">
                <img src="http://via.placeholder.com/150x150">
            </div>
            <div class="hero-content">
                <h1 class="title">{{ $user->nome_completo }}</h1>
                <h2 class="subtitle">{{ $user->rh->cargo->descricao }} - {{ $user->rh->unidade->descricao }}</h2>
                <div class="user-infocard">
                    <div>
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span>{{ $user->rh->telefones->first()->numero }}</span>
                    </div>
                    <div>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <a href="mailto:{{ $user->rh->emails->first()->address}}"><span>{{ $user->rh->emails->first()->address}}</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-foot">
        <nav class="tabs is-boxed is-fullwidth">
            <div class="container">
                <ul>
                    <li @if(request()->get('secao') == 'dados_basicos' ) class="is-active" @endif><a href="/usuarios/{{$user->slug()}}?secao=dados_basicos">Dados Básicos</a></li>
                    <li @if(request()->get('secao') == 'dados_pessoais' ) class="is-active" @endif><a href="/usuarios/{{$user->slug()}}?secao=dados_pessoais">Dados Pessoais</a></li>
                    <li @if(request()->get('secao') == 'dados_funcionais' ) class="is-active" @endif><a href="/usuarios/{{$user->slug()}}?secao=dados_funcionais">Dados Funcionais</a></li>
                    <li @if(request()->get('secao') == 'dados_academicos' ) class="is-active" @endif><a href="/usuarios/{{$user->slug()}}?secao=dados_academicos">Dados Acadêmicos</a></li>
                </ul>
            </div>
        </nav>
    </div>
</section>