<form id="formRegistration" class="form-horizontal" method="POST" action="{{ route('register') }}">
    {{--{{ csrf_field() }}--}}

    @include('forms.registration.dadosBasicos')
    @include('forms.registration.dadosPessoais')
    @include('forms.registration.dadosBancarios')
    @include('forms.registration.documentos')
    @include('forms.registration.escolaridade')
    @include('forms.registration.idiomas')
    @include('forms.registration.dependentes')
    @include('forms.registration.vinculo')

</form>