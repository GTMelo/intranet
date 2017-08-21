@include('layouts.partials.header.login.modalLogin')
@include('layouts.partials.header.login.modalRegister')

@if(Auth::check())
    <div id="login-badge" class="level-item login-badge">
        <div class="user-image">
            <img src="http://via.placeholder.com/40x40">
        </div>
        <div class="user-data">
            <span id="user-name">{{ Auth::user()->nome_curto }}</span>
            <span id="user-unidade">{{ Auth::user()->unidade->sigla }} &nbsp <a href="/sair">(sair)</a></span>
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