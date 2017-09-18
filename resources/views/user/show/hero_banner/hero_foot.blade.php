<div class="hero-foot">
    <nav class="tabs is-boxed is-fullwidth">
        <div class="container">
            <ul>
                <li @if(request()->get('subsecao') == 'recursos_humanos' ) class="is-active" @endif>
                    <a href="/usuarios/{{$user->slug()}}?secao=recursos_humanos">Recursos Humanos</a>
                </li>
            </ul>
        </div>
    </nav>
</div>