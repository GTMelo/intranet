@include('layouts.partials.header.login.modalLogin')
@include('layouts.partials.header.login.modalRegister')

@if(auth()->check())
    <div id="login-badge" class="level-item login-badge">
        <div class="user-image">
            @if(auth()->user()->foto())
                <img src="{{Storage::url('documentos/' . auth()->user()->foto())}}">
            @else
                <img src="images/sem_imagem.png">
            @endif
        </div>
        <div class="user-data">
            <span id="user-name"><a href="/usuarios/{{auth()->user()->slug}}">{{ auth()->user()->nome_curto }}</a></span>
            <span id="user-unidade">
                @if(auth()->user()->rh->unidade) {{ auth()->user()->rh->unidade->sigla }} @endif
                @if(auth()->user()->hasFlag('approval-pending')) (Usuário com aprovação pendente ) @endif
                &nbsp <a href="/sair">(sair)</a>
            </span>
        </div>
    </div>
@else
    <div class="level-item header-item">
        <a href="#" @click="showLoginModal = true">Login</a>
    </div>

    <div class="level-item header-item">
        <a href="#" @click="showRegistrationModal = true">Cadastre-se</a>
    </div>
@endif