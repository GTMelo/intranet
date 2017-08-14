<header role="document-header">

    {{--Items à esquerda na barra--}}
    <nav class="level-left">
        @include('layouts.partials.header.brand')
        @include('layouts.partials.header.toolmenu')
    </nav>

    {{--Items no centro--}}
    <nav class="level-item">
    </nav>

    {{--Items à direita--}}
    <nav class="level-right">
        @include('layouts.partials.header.search')
        @include('layouts.partials.header.login')
    </nav>
</header>