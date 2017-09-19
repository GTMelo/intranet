<section class="hero hero-with-image is-primary">
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

    {{--@include('user.show.hero_banner.hero_foot')--}}
</section>