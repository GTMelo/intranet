<section class="hero hero-with-image is-primary">
    {{--@if(auth()->check())--}}
        {{--@if( auth()->user()->ownOrAllowed($user->rh, 'global-edit-user-rh'))--}}
            {{--<div class="hero-head">--}}
                {{--<div class="nav">--}}
                    {{--<div class="container">--}}
                        {{--<div class="nav-right nav-menu">--}}
                            {{--<a class="nav-item">Editar</a>--}}
                            {{--@permission('validate-user')<a class="nav-item">Validar</a>@endpermission--}}
                            {{--@permission('delete-user')<a class="nav-item">Excluir</a>@endpermission--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--@endif--}}
    {{--@endif--}}

    <div class="hero-body">
        <div class="container">
            <div class="hero-image">
                {{--<img src="http://via.placeholder.com/150x150">--}}
                <img src="{{Storage::url('documentos/' . $user->foto())}}">
            </div>
            <div class="hero-content">
                <h1 class="title">{{ $user->nome_completo }}</h1>
                <h2 class="subtitle">{{ $user->rh->cargo->descricao }} - <a>{{ $user->unidade->descricao }}</a></h2>
                <div class="user-infocard">
                    <div>
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span>{{ $user->ramais()->first()->numero or 'Sem número' }}</span>
                    </div>
                    <div>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <a href="mailto:{{ $user->email()->address or 'Sem e-mail'}}"><span>{{ $user->email()->address}}</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--@include('user.show.hero_banner.hero_foot')--}}
</section>