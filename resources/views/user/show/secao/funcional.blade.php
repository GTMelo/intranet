@extends('user.show')

@section('user-content')

    <section>
        <h1 class="is-size-2">Exercício</h1>

        <table class="table is-fullwidth">
            <tr>
                <th>Lotação</th>
                <td>{{ $user->rh->unidade->descricao }} </td>
            </tr>
            <tr>
                <th>Data de ingresso</th>
                <td>{{ $user->rh->entrada_sain }}</td>
            </tr>
            <tr>
                <th>Ramal</th>
                <td>{{ $user->rh->ramal()->numero }}</td>
            </tr>
        </table>
    </section>

    <section>
        <h1 class="is-size-2">Tipo de Vínculo com a Administração Pública</h1>
        <table class="table is-fullwidth">

            <tr>
                <th>Tipo</th>
                <td>{{ $user->rh->vinculo->tipo->descricao }}</td>
            </tr>

            <tr class="servidor-com-vinculo">
                <th>Matrícula</th>
                <td>{{ $user->rh->matricula }}</td>
            </tr>

            <tr>
                <th>Órgão de Origem</th>
                <td>{{ $user->rh->vinculo->orgao_origem }}</td>
            <tr>

                <th>Matrícula de Origem</th>
                <td>{{ $user->rh->vinculo->matricula_origem }}</td>
            </tr>

            <tr>
                <th>Cargo efetivo de Origem</th>
                <td>{{ $user->rh->vinculo->cargo_origem }}</td>
            </tr>

            <tr>
                <th>Classe</th>
                <td>{{ $user->rh->vinculo->classe }}</td>
            </tr>

            <tr>
                <th>Padrão</th>
                <td>{{ $user->rh->vinculo->padrao }}</td>
            </tr>

            <tr>
                <th>Função</th>
                <td>{{ $user->rh->vinculo->funcao }}</td>
            </tr>

            <tr>
                <th>Denominação da Função</th>
                <td>{{ $user->rh->vinculo->denominacao_funcao }}</td>
            </tr>

            <tr>
                <th>Ato de Nomeação</th>
                <td>{{ $user->rh->vinculo->ato_nomeacao }}</td>
            </tr>

            <tr>
                <th>Data DOU</th>
                <td>{{ $user->rh->vinculo->data_dou }}</td>
            </tr>

            <tr>
                <th>Cargo</th>
                <td>{{ $user->rh->cargo->descricao }}</td>
            </tr>

            <tr>
                <th>Data de Admissão</th>
                <td>{{ $user->rh->vinculo->tipo->descricao }}</td>
            </tr>

            <tr>
                <th>Empresa</th>
                <td>{{ $user->rh->vinculo->empresa }}</td>
            </tr>

            <tr>
                <th>Instituição de Ensino</th>
                <td>{{ $user->rh->vinculo->instituicao_ensino }}</td>
            </tr>

            <tr>
                <th>Nível</th>
                <td>{{ $user->rh->vinculo->nivel }}</td>
            </tr>

            <tr>
                <th>Curso</th>
                <td>{{ $user->rh->vinculo->curso }}</td>
            </tr>

            <tr>
                <th>Semestre</th>
                <td>{{ $user->rh->vinculo->semestre }}º</td>
            </tr>

            <tr>
                <th>Número do Contrato</th>
                <td>{{ $user->rh->vinculo->numero_contrato }}</td>
            </tr>

            <tr>
                <th>Data do Contrato</th>
                <td>{{ $user->rh->vinculo->data_contrato }}</td>
            </tr>

            <tr>
                <th>Supervisor</th>
                <td>{{ $user->rh->vinculo->supervisor->user->nome_curto }}</td>
            </tr>

        </table>
    </section>


@endsection