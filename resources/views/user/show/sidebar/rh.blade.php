<p class="menu-label">Recursos Humanos</p>
<ul class="menu-list">
    <li><a href="/usuarios/{{ $user->slug }}/rh/basico" @if($secao == 'basico' || !isset($secao)) class="is-active" @endif>Dados básicos</a></li>
    <li><a href="/usuarios/{{ $user->slug }}/rh/pessoal" @if($secao == 'pessoal') class="is-active" @endif>Dados pessoais</a></li>
    <li><a href="/usuarios/{{ $user->slug }}/rh/escolaridade" @if($secao == 'escolaridade') class="is-active" @endif>Escolaridade, idiomas e conhecimentos</a></li>
    <li><a href="/usuarios/{{ $user->slug }}/rh/documentos" @if($secao == 'documentos') class="is-active" @endif>Documentos</a></li>
    <li><a href="/usuarios/{{ $user->slug }}/rh/funcional" @if($secao == 'funcional') class="is-active" @endif>Dados Funcionais</a></li>
</ul>