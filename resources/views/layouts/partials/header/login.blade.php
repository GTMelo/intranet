<div class="level-item">
    <a href="#" @click="showLoginModal = true">Login</a>
</div>

<div class="level-item">
    <a href="/registrar">Cadastre-se</a>
</div>

<modal v-if="showLoginModal" @close="showLoginModal = false" title="IntraSain-login">
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="field">
            <div class="control has-icons-left has-icons-right">
                <input class="input is-large" type="text" placeholder="CPF">
                <span class="icon is-large is-left"><i class="fa fa-user"></i></span>
            </div>
        </div>
        <div class="field">
            <div class="control has-icons-left has-icons-right">
                <input class="input is-large" type="password" placeholder="Senha">
                <span class="icon is-large is-left"><i class="fa fa-key"></i></span>
            </div>
        </div>
        <div class="field">
            <button class="button is-large is-fullwidth is-primary">Entrar</button>
        </div>
    </form>
</modal>