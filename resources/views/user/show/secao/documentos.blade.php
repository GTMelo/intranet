@extends('user.show')

@section('user-content')

    <documento-card tipo="CPF/Identidade" img="http://via.placeholder.com/150x150" numero="0000000" cpf="00000000000" expedidor="xxx/xx" emissao="xx/xx/xxxx"></documento-card>
    <documento-card tipo="PIS/PASEP" img="http://via.placeholder.com/150x150" numero="numero"></documento-card>
    <documento-card tipo="Título de Eleitor" img="http://via.placeholder.com/150x150" numero="00000" zona="000" secao="000"></documento-card>
    <documento-card tipo="Carteira Profissional" img="http://via.placeholder.com/150x150" numero="00000000" serie="000000" emissao="xx/xx/xxxx"></documento-card>
    <documento-card tipo="Passaporte" img="http://via.placeholder.com/150x150" emissao="xx/xx/xxxx" validade="xx/xx/xxxx"></documento-card>

@endsection