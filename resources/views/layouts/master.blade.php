<!doctype html>
<html lang="{{ app()->getLocale() }}">

{{--Head--}}
@include('layouts.partials.head')

<body>

<main role="content" id="app">
    {{--Header do Site--}}
    @include('layouts.partials.header')

    {{--Tudo entre header e footer--}}
    <div id="page_content">

        {{--Mensagens e erros--}}
        @include('layouts.partials.errors')
        @include('layouts.partials.success')

        @yield('content')
    </div>

    {{--Footer do site--}}
    @include('layouts.partials.footer')
</main>
{{--Scripts a serem adicionados--}}
<script src="{!! asset('js/app.js') !!}"></script>
@yield('scripts')
</body>

</html>
