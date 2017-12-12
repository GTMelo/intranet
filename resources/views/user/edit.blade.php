@extends('layouts.master')

@section('content')

    @include('layouts.partials.page_header', [
    'title' => 'Editando usuário',
    'sub' => 'Altere as informações desejadas e clique em Salvar, no fim da página.'
     ])

    <section class="section container-compact">

        <form name="user_edit" method="POST" action="/usuarios/{{ $user->slug }}">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <section>
                <h2 class="is-size-2">Dados Básicos</h2>
                <div class="grid gcols-2 gap-normal ">

                    <div class="field">
                        <label class="label">Nome Completo</label>
                        <div class="control">
                            <input class="input" type="text" name="nome_completo">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Nome Curto</label>
                        <div class="control">
                            <input class="input" type="text" name="nome_curto">
                        </div>
                        <p class="help">O nome curto é preferencialmente uma combinação do primeiro e último nomes. Ele
                            será usado em emails, crachás e outros serviços</p>
                    </div>

                    <div class="field">
                        <label class="label">Senha</label>
                        <div class="control">
                            <input class="input" type="password" name="password">
                        </div>
                        <p class="help">A senha precisa ter no mínimo 6 dígitos</p>
                    </div>

                    <div class="field">
                        <label class="label">Confirmação de senha</label>
                        <div class="control">
                            <input class="input" type="password" name="password_confirmation">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">CPF</label>
                        <div class="control">
                            <input class="input" type="text" name="cpf">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Foto</label>
                        <div class="control">
                            <input class="input" type="file" name="foto">
                        </div>
                    </div>

                </div>

            </section>

            <section>
                <h2 class="is-size-2">Dados Pessoais</h2>

                <div class="grid gcols-2 gap-normal ">
                    <div class="field">
                        <label class="label">Data de Nascimento</label>
                        <div class="control">
                            <input-date name="data_nascimento"></input-date>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Pai</label>
                        <div class="control">
                            <input class="input" type="text" name="pai">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Mãe</label>
                        <div class="control">
                            <input class="input" type="text" name="mae">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Nacionalidade</label>
                        <div class="control">
                            <input class="input" type="text" name="nacionalidade">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Naturalidade</label>
                        <div class="control">
                            <input class="input" type="text" name="naturalidade">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">UF</label>
                        <div class="control">
                            <input class="input" type="text" name="uf">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Nome Completo</label>
                        <div class="control">
                            <input class="input" type="text" name="nome_completo">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Estado Civil</label>
                        <div class="control">
                            <input class="input" type="text" name="nome_completo">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Endereço</label>
                        <div class="control">
                            <input class="input" type="text" name="endereco">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Cidade</label>
                        <div class="control">
                            <input class="input" type="text" name="cidade">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Estado</label>
                        <div class="control">
                            <input class="input" type="text" name="estado">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">CEP</label>
                        <div class="control">
                            <input class="input" type="text" name="nome_completo">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Telefone Residencial</label>
                        <div class="control">
                            <input class="input" type="text" name="telefone_residencial">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Telefone Celular</label>
                        <div class="control">
                            <input class="input" type="text" name="celular">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Email Particular</label>
                        <div class="control">
                            <input class="input" type="text" name="email_particular">
                        </div>
                    </div>
                </div>

            </section>

            <section>
                <h2 class="is-size-2">Dados Bancários</h2>

                <div class="field">
                    <label class="label">Banco</label>
                    <div class="control">
                        <input class="input" type="text" name="banco">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Agência</label>
                    <div class="control">
                        <input class="input" type="text" name="agencia">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Conta</label>
                    <div class="control">
                        <input class="input" type="text" name="conta">
                    </div>
                </div>
            </section>



            <button class="button is-primary" type="submit">Enviar</button>
        </form>

        {{--<form name="user_edit">--}}
        {{--{{ csrf_field() }}--}}
        {{--{{ method_field('PATCH') }}--}}
        {{--<section>--}}
        {{--<h2 class="is-size-2">Dados Básicos</h2>--}}
        {{--<input-text label="Nome Completo" name="nome_completo"></input-text>--}}
        {{--<input-text label="Nome Curto" name="nome_curto" help="O nome curto normalmente é uma combinação do primeiro e último nomes."></input-text>--}}
        {{--<input-password label="Senha" name="password" confirm="true"></input-password>--}}
        {{--@permission('global-edit-user-rh')--}}
        {{--<input-text label="cpf" name="cpf"></input-text>--}}
        {{--@endpermission--}}
        {{--<input-file label="Foto" name="foto" placeholder="Clique aqui para fazer o upload da foto"></input-file>--}}

        {{--</section>--}}
        {{--<section>--}}
        {{--<h2 class="is-size-2">Dados Pessoais</h2>--}}
        {{--<input-text label="Pai" name="pai"></input-text>--}}
        {{--<input-text label="Mãe" name="mae"></input-text>--}}
        {{--<input-radio label="Sexo" name="sexo" values="m|Masculino,f|Feminino"></input-radio>--}}
        {{--<input-map label="naturalidade" name="naturalidade"></input-map> Botão que chama modal com google maps.--}}
        {{--<input-text label="Estado civil" name="estado_civil"></input-text>--}}
        {{--<input-map label="Endereço" name="endereco"></input-map> Botão que chama modal com google maps.--}}
        {{--<input-text label="Telefone residencial" name="telefone_residencial"></input-text>--}}
        {{--<input-text label="Celular pessoal" name="celular_pessoal"></input-text>--}}
        {{--<input-text label="E-mail pessoal" name="email_pessoal"></input-text>--}}
        {{--</section>--}}
        {{--<section>--}}
        {{--<h2 class="is-size-2">Dados Bancários</h2>--}}
        {{--<input-text-suggest label="Banco" name="banco" help="Digite o banco desejado, e escolha entre as sugestões disponíveis"></input-text-suggest>--}}
        {{--<input-text label="Agência" name="agencia"></input-text>--}}
        {{--<input-text label="Conta Corrente" name="conta"></input-text>--}}
        {{--</section>--}}
        {{--<section>--}}
        {{--<h2 class="is-size-2">Documentos</h2>--}}
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
        {{--</section>--}}
        {{--<section>--}}
        {{--<h2 class="is-size-2">Escolaridade</h2>--}}
        {{--</section>--}}
        {{--<section>--}}
        {{--<h2 class="is-size-2">Idiomas</h2>--}}
        {{--</section><section>--}}
        {{--<h2 class="is-size-2">Vínculo</h2>--}}
        {{--</section>--}}
        {{--</form>--}}
    </section>

@endsection