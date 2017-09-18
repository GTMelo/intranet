<table class="table is-fullwidth user-profile animated fadeInDown">
    {{--<tr>--}}
        {{--<td>Data de Criação</td>--}}
        {{--<td>{{ $user->created_at }}</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<td>Naturalidade</td>--}}
        {{--<td>{{ $user->rh->naturalidade->nome }}</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<td>Sexo</td>--}}
        {{--<td>--}}
            {{--@if($user->rh->sexo == 'm')--}}
                {{--Masculino--}}
            {{--@elseif($user->rh->sexo == 'f')--}}
                {{--Feminino--}}
            {{--@else Não informado--}}
            {{--@endif--}}
        {{--</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<td>Data de Nascimento</td>--}}
        {{--<td>{{ $user->rh->data_nascimento }}</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<td>Estado Civil</td>--}}
        {{--<td>{{ $user->rh->estado_civil }}</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<td>Endereço</td>--}}
        {{--<td>--}}
            {{--{{ $user->rh->endereco->logradouro }}<br>--}}
            {{--{{ $user->rh->endereco->cep }}<br>--}}
            {{--{{ $user->rh->endereco->cidade->nome }} - {{ $user->rh->endereco->cidade->estado->pais->nome }}--}}
        {{--</td>--}}
    {{--</tr>--}}
</table>