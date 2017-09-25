@extends('user.show')

@section('user-content')

    <section>
        <h1 class="is-size-2">Exercício</h1>

        <info-table>
            <it-item label="Lotação">{{ $user->rh->unidade->descricao }}</it-item>
            <it-item label="Data de Ingresso">{{ $user->rh->entrada_sain }}</it-item>
            <it-item label="Ramal">{{ $user->rh->ramal()->numero }}</it-item>
        </info-table>

    </section>

    <section>
        <h1 class="is-size-2">Tipo de Vínculo com a Administração Pública</h1>

        @if($user->rh->vinculo)
            <info-table>
                @if($user->rh->vinculo->tipo)
                    <it-item label="Tipo">{{ $user->rh->vinculo->tipo->descricao or '' }}</it-item>@endif
                @if($user->rh->matricula)
                    <it-item label="Matrícula">{{ $user->rh->matricula or '' }}</it-item>@endif
                @if($user->rh->vinculo->orgao_origem)
                    <it-item label="Órgão de Origem">{{ $user->rh->vinculo->orgao_origem or '' }}</it-item>@endif
                @if($user->rh->vinculo->matricula_origem)
                    <it-item
                            label="Matrícula de Origem">{{ $user->rh->vinculo->matricula_origem or '' }}</it-item>@endif
                @if($user->rh->vinculo->cargo_origem)
                    <it-item label="Cargo de Origem">{{ $user->rh->vinculo->cargo_origem or '' }}</it-item>@endif
                @if($user->rh->vinculo->classe)
                    <it-item label="Classe">{{ $user->rh->vinculo->classe or '' }}</it-item>@endif
                @if($user->rh->vinculo->padrao)
                    <it-item label="Padrão">{{ $user->rh->vinculo->padrao or '' }}</it-item>@endif
                @if($user->rh->vinculo->funcao)
                    <it-item label="Função">{{ $user->rh->vinculo->funcao or '' }}</it-item>@endif
                @if($user->rh->vinculo->denominacao_funcao)
                    <it-item
                            label="Denominação da Função">{{ $user->rh->vinculo->denominacao_funcao or '' }}</it-item>@endif
                @if($user->rh->vinculo->ato_nomeacao)
                    <it-item label="Ato de Nomeação">{{ $user->rh->vinculo->ato_nomeacao or '' }}</it-item>@endif
                @if($user->rh->vinculo->data_dou)
                    <it-item label="Data DOU">{{ $user->rh->vinculo->data_dou or '' }}</it-item>@endif
                @if($user->rh->cargo)
                    <it-item label="Cargo">{{ $user->rh->cargo->descricao or '' }}</it-item>@endif
                @if($user->rh->vinculo->data_admissao)
                    <it-item label="Data de Admissão">{{ $user->rh->vinculo->data_admissao or '' }}</it-item>@endif
                @if($user->rh->vinculo->empresa)
                    <it-item label="Empresa">{{ $user->rh->vinculo->empresa or '' }}</it-item>@endif
                @if($user->rh->vinculo->instituicao_ensino)
                    <it-item
                            label="Instituição de Ensino">{{ $user->rh->vinculo->instituicao_ensino or '' }}</it-item>@endif
                @if($user->rh->vinculo->nivel)
                    <it-item label="Nível">{{ $user->rh->vinculo->nivel or '' }}</it-item>@endif
                @if($user->rh->vinculo->curso)
                    <it-item label="Curso">{{ $user->rh->vinculo->curso or '' }}</it-item>@endif
                @if($user->rh->vinculo->semestre)
                    <it-item label="Semestre">{{ $user->rh->vinculo->semestre or '' }}</it-item>@endif
                @if($user->rh->vinculo->numero_contrato)
                    <it-item label="Número do Contrato">{{ $user->rh->vinculo->numero_contrato or '' }}</it-item>@endif
                @if($user->rh->vinculo->data_contrato)
                    <it-item label="Data do Contrato">{{ $user->rh->vinculo->data_contrato or '' }}</it-item>@endif
                @if($user->rh->vinculo->supervisor)
                    <it-item
                            label="Supervisor">{{ $user->rh->vinculo->supervisor->user->nome_curto or '' }}</it-item>@endif
            </info-table>
        @else
            <div>
                <span>Nenhum dado de vínculo encontrado.</span>
            </div>
        @endif
    </section>
@endsection