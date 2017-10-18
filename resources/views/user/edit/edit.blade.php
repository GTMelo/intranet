@extends('layouts.master')

@section('content')

    @include('layouts.partials.page_header', [
    'title' => 'Editando usuário',
    'sub' => 'Altere as informações desejadas e clique em Salvar, no fim da página.'
     ])

    <main class="container">
        <form name="user_edit">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <section>
                <h2 class="is-size-2">Dados Básicos</h2>
                <input-text label="Nome Completo" name="nome_completo"></input-text>
                <input-text label="Nome Curto" name="nome_curto" help="O nome curto normalmente é uma combinação do primeiro e último nomes."></input-text>
                <input-password label="Senha" name="password" confirm="true"></input-password>
                @permission('global-edit-user-rh')
                    <input-text label="cpf" name="cpf"></input-text>
                @endpermission
                {{--<input-file label="Foto" name="foto"></input-file>--}}
            </section>
            <section>
                <h2 class="is-size-2">Dados Pessoais</h2>
                <input-text label="Pai" name="pai"></input-text>
                <input-text label="Mãe" name="mae"></input-text>
                <input-radio label="Sexo" name="sexo" values="m|Masculino,f|Feminino"></input-radio>
                {{--<input-map label="naturalidade" name="naturalidade"></input-map> Botão que chama modal com google maps.--}}
                <input-text label="Estado civil" name="estado_civil"></input-text>
                {{--<input-map label="Endereço" name="endereco"></input-map> Botão que chama modal com google maps.--}}
                <input-text label="Telefone residencial" name="telefone_residencial"></input-text>
                <input-text label="Celular pessoal" name="celular_pessoal"></input-text>
                <input-text label="E-mail pessoal" name="email_pessoal"></input-text>
            </section>
            <section>
                <h2 class="is-size-2">Dados Bancários</h2>
                {{--<input-text-suggest label="Banco" name="banco" help="Digite o banco desejado, e escolha entre as sugestões disponíveis"></input-text-suggest>--}}
                <input-text label="Agência" name="agencia"></input-text>
                <input-text label="Conta Corrente" name="conta"></input-text>
            </section>
            <section>
                <h2 class="is-size-2">Documentos</h2>
                {{--<input-file label="CPF/RG" name="rg"></input-file>--}}
                {{--<input-file label="PIS/PASEP" name="pis-pasep"></input-file>--}}
                {{--<input-file label="Título de Eleitor" name="titulo_eleitor"></input-file>--}}
                {{--<input-file label="Carteira Profissional" name="carteira_profissional"></input-file>--}}
                {{--<input-file label="Passaporte" name="passaporte"></input-file>--}}
                {{--<input-file label="Carteira de Motorista" name="carteira_motorista"></input-file>--}}
                {{--<input-file label="Certificado de Escolaridade ou diploma" name="certificado_escolaridade"></input-file>--}}
                {{--<input-file label="Certificado de Nascimento, Casamento ou Divórcio" name="certificado_cnd"></input-file>--}}
                {{--<input-file label="Certificado de Reservista" name="certificado_reservista"></input-file>--}}
                {{--<input-file label="Comprovante de Residência" name="comprovante_residencia"></input-file>--}}
            </section>
            <section>
                <h2 class="is-size-2">Escolaridade</h2>
            </section>
            <section>
                <h2 class="is-size-2">Idiomas</h2>
            </section><section>
                <h2 class="is-size-2">Vínculo</h2>
            </section>


        </form>
    </main>

@endsection