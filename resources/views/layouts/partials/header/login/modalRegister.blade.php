<modal v-if="showRegistrationModal" @close="showRegistrationModal = false" title="IntraSAIN - Criar nova conta de usuário">
<form class="form-horizontal" method="POST" action="{{ route('register') }}">

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
        <label class="label">Nome Curto</label>
        <div class="control">
            <input name="nome_curto" class="input" type="text">
        </div>
        <p class="help">O nome curto geralmente é a combinação do primeiro e último nomes.
            O nome curto é utilizado em recursos como e-mails, crachás e outros formulários.</p>
    </div>
    <div class="field">
        <label class="label">Senha</label>
        <div class="field has-addons">
            <div class="control is-expanded"><input name="password" class="input" type="password" placeholder="Digite a senha"></div>
            <div class="control is-expanded"><input name="password_confirmation" class="input" type="password" placeholder="Confirme a senha"></div>
        </div>
        <p class="help">A senha precisa ter no mínimo 6 dígitos</p>
    </div>
    <div class="field is-grouped is-grouped-centered">
        <div class="field">
            <input type="submit" class="button is-primary" value="Criar conta">
        </div>
    </div>
</form>
</modal>