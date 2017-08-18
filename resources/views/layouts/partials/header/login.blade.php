@include('layouts.partials.header.login.modalLogin')
@include('layouts.partials.header.login.modalRegister')

<div class="level-item header-item">
    <a href="#" @click="showLoginModal = true">Login</a>
</div>

<div class="level-item header-item">
    <a href="#" @click="showRegistrationModal = true">Cadastre-se</a>
</div>