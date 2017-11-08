{{--@include('layouts.partials.header.login.modalLogin')--}}
{{--@include('layouts.partials.header.login.modalRegister')--}}

@if(auth()->check())
    <div id="login-badge" class="level-item login-badge">
        <div class="user-image">
            <img src="{{ auth()->user()->foto }}">
        </div>
        <div class="user-data">
            <span id="user-name"><a
                        href="/usuarios/{{auth()->user()->slug}}">{{ auth()->user()->nome_curto }}</a></span>
            <span id="user-unidade">
                {{--@if(auth()->user()->rh->unidade) {{ auth()->user()->rh->unidade->sigla }} @endif--}}
                {{ auth()->user()->unidadeDescricao() ?: '' }}
                @if(auth()->user()->hasFlag('approval-pending')) (Usuário com aprovação pendente ) @endif
                &nbsp <a href="/sair">(sair)</a>
            </span>
        </div>
    </div>
@else
    <div class="level-item header-item">
        {{--<a href="#" @click="showLoginModal = true">Login</a>--}}
        <modal id="loginModal" text="Login" >
            <p slot="header">Entrar na IntraSAIN</p>

            <form id="formLogin" class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="field">
                    <div class="control has-icons-left">
                        <input name="cpf" class="input is-large" type="text" placeholder="CPF">
                        <span class="icon is-large is-left"><i class="fa fa-user"></i></span>
                    </div>
                </div>
                <div class="field">
                    <div class="control has-icons-left">
                        <input name="password" class="input is-large" type="password" placeholder="Senha">
                        <span class="icon is-large is-left"><i class="fa fa-key"></i></span>
                    </div>
                </div>
            </form>

            <div slot="footer" class="field">
                <button class="button is-primary" form="formLogin">Entrar</button>
            </div>

        </modal>
    </div>

    <div class="level-item header-item">
        <modal id="registerModal" text="Cadastre-se">
            <p slot="header">Criar uma conta na IntraSAIN</p>

            <form id="formRegistration" class="form-horizontal" method="POST" action="{{ route('register') }}">

                {{ csrf_field() }}

                <div class="field">
                    <label class="label">CPF</label>
                    <div class="control">
                        <input name="cpf" class="input" type="text">
                    </div>
                    <p class="help">Digite apenas os números</p>
                </div>

                <div class="field">
                    <label class="label">Nome Completo</label>
                    <div class="control">
                        <input name="nome_completo" class="input" type="text">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Senha</label>
                    <div class="field has-addons">
                        <div class="control is-expanded"><input name="password" class="input" type="password" placeholder="Digite a senha"></div>
                        <div class="control is-expanded"><input name="password_confirmation" class="input" type="password" placeholder="Confirme a senha"></div>
                    </div>
                    <p class="help">A senha precisa ter no mínimo 6 dígitos</p>
                </div>

            </form>
            <div slot="footer" class="field">
                <button class="button is-primary" form="formRegistration">Criar nova Conta</button>
            </div>
        </modal>
    </div>
@endif