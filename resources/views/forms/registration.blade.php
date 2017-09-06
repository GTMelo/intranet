<form id="formRegistration" class="form-horizontal" method="POST" action="{{ route('register') }}">
    {{--{{ csrf_field() }}--}}

    @include('forms.registration.dadosBasicos')
    @include('forms.registration.dadosPessoais')
    @include('forms.registration.dadosBancarios')

</form>