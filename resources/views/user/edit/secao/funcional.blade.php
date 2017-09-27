@extends('user.show')

@section('user-content')

    <section>
        <h1 class="is-size-2">Exercício</h1>

        <i-table>
            <i-item label="Lotação">{{ $user->rh->unidade->descricao }}</i-item>
            <i-item label="Data de Ingresso">{{ $user->rh->entrada_sain }}</i-item>
            <i-item label="Ramal">{{ $user->rh->ramal()->numero }}</i-item>
        </i-table>

    </section>

    <section>
        <h1 class="is-size-2">Tipo de Vínculo com a Administração Pública</h1>

        @if($user->rh->vinculo)
            <i-table>
                @if($user->rh->vinculo->tipo)
                    <i-item label="Tipo">{{ $user->rh->vinculo->tipo->descricao or '' }}</i-item>@endif
                @if($user->rh->matricula)
                    <i-item label="Matrícula">{{ $user->rh->matricula or '' }}</i-item>@endif
                @if($user->rh->vinculo->orgao_origem)
                    <i-item label="Órgão de Origem">{{ $user->rh->vinculo->orgao_origem or '' }}</i-item>@endif
                @if($user->rh->vinculo->matricula_origem)
                    <i-item
                            label="Matrícula de Origem">{{ $user->rh->vinculo->matricula_origem or '' }}</i-item>@endif
                @if($user->rh->vinculo->cargo_origem)
                    <i-item label="Cargo de Origem">{{ $user->rh->vinculo->cargo_origem or '' }}</i-item>@endif
                @if($user->rh->vinculo->classe)
                    <i-item label="Classe">{{ $user->rh->vinculo->classe or '' }}</i-item>@endif
                @if($user->rh->vinculo->padrao)
                    <i-item label="Padrão">{{ $user->rh->vinculo->padrao or '' }}</i-item>@endif
                @if($user->rh->vinculo->funcao)
                    <i-item label="Função">{{ $user->rh->vinculo->funcao or '' }}</i-item>@endif
                @if($user->rh->vinculo->denominacao_funcao)
                    <i-item
                            label="Denominação da Função">{{ $user->rh->vinculo->denominacao_funcao or '' }}</i-item>@endif
                @if($user->rh->vinculo->ato_nomeacao)
                    <i-item label="Ato de Nomeação">{{ $user->rh->vinculo->ato_nomeacao or '' }}</i-item>@endif
                @if($user->rh->vinculo->data_dou)
                    <i-item label="Data DOU">{{ $user->rh->vinculo->data_dou or '' }}</i-item>@endif
                @if($user->rh->cargo)
                    <i-item label="Cargo">{{ $user->rh->cargo->descricao or '' }}</i-item>@endif
                @if($user->rh->vinculo->data_admissao)
                    <i-item label="Data de Admissão">{{ $user->rh->vinculo->data_admissao or '' }}</i-item>@endif
                @if($user->rh->vinculo->empresa)
                    <i-item label="Empresa">{{ $user->rh->vinculo->empresa or '' }}</i-item>@endif
                @if($user->rh->vinculo->instituicao_ensino)
                    <i-item
                            label="Instituição de Ensino">{{ $user->rh->vinculo->instituicao_ensino or '' }}</i-item>@endif
                @if($user->rh->vinculo->nivel)
                    <i-item label="Nível">{{ $user->rh->vinculo->nivel or '' }}</i-item>@endif
                @if($user->rh->vinculo->curso)
                    <i-item label="Curso">{{ $user->rh->vinculo->curso or '' }}</i-item>@endif
                @if($user->rh->vinculo->semestre)
                    <i-item label="Semestre">{{ $user->rh->vinculo->semestre or '' }}</i-item>@endif
                @if($user->rh->vinculo->numero_contrato)
                    <i-item label="Número do Contrato">{{ $user->rh->vinculo->numero_contrato or '' }}</i-item>@endif
                @if($user->rh->vinculo->data_contrato)
                    <i-item label="Data do Contrato">{{ $user->rh->vinculo->data_contrato or '' }}</i-item>@endif
                @if($user->rh->vinculo->supervisor)
                    <i-item
                            label="Supervisor">{{ $user->rh->vinculo->supervisor->user->nome_curto or '' }}</i-item>@endif
            </i-table>
        @else
            <div>
                <span>Nenhum dado de vínculo encontrado.</span>
            </div>
        @endif
    </section>
@endsection