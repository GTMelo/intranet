<section class="hero hero-with-image is-primary">
    @if(auth()->check())
        @if( auth()->user()->ownOrAllowed($user->rh, 'global-edit-user-rh'))
            <div class="hero-head">
                <div class="nav">
                    <div class="container">
                        <div class="nav-right nav-menu">
                            <a class="nav-item">Editar</a>
                            @permission('validate-user')<a class="nav-item">Validar</a>@endpermission
                            @permission('delete-user')<a class="nav-item">Excluir</a>@endpermission
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif

    <div class="hero-body">
        <div class="container">
            <div class="hero-image">
                <img src="http://via.placeholder.com/150x150">
            </div>
            <div class="hero-content">
                <h1 class="title">{{ $user->nome_completo }}</h1>
                <h2 class="subtitle">{{ $user->rh->cargo->descricao }} - <a>{{ $user->rh->unidade->descricao }}</a></h2>
                <div class="user-infocard">
                    <div>
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span>{{ $user->ramal()->numero }}</span>
                    </div>
                    <div>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <a href="mailto:{{ $user->email_funcional()->address}}"><span>{{ $user->email_funcional()->address}}</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--@include('user.show.hero_banner.hero_foot')--}}
</section>