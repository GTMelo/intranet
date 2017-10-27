<section class="hero hero-with-image is-primary">
    <div class="hero-body">
        <div class="container">
            <div class="hero-image">
                <img src="{{ $user->foto }}">
            </div>
            <div class="hero-content">
                <h1 class="title">{{ $user->nome_completo }}</h1>
                <h2 class="subtitle">
                    {{ $user->rh->cargoDescricao() ?: 'Sem Cargo' }} -
                    <a>{{ $user->unidadeDescricao() ?: 'Sem Unidade' }}</a>
                </h2>
                <div class="user-infocard">
                    <div>
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        @if($user->ramais()->count() > 0)
                            <span>{{ $user->ramais()->first()->numero }}</span>
                        @else
                            <span>Sem Número</span>
                        @endif
                    </div>
                    <div>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        @if($user->emails_funcionais()->count() > 0)
                            <a href="mailto:{{ $user->emails_funcionais()->first()->address }}">{{ $user->emails_funcionais()->first()->address }}</a>
                        @else
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--@include('user.show.hero_banner.hero_foot')--}}
</section>