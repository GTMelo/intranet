<modal v-if="showLoginModal" @close="showLoginModal = false" title="IntraSAIN - login">
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