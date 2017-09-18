<!doctype html>
<html lang="{{ app()->getLocale() }}">

{{--Head--}}
@include('layouts.partials.head')

<body>
    <div class="document-content" id="app">

        {{--Header do Site--}}
        @include('layouts.partials.header')

        {{--Mensagens e erros--}}
        @include('layouts.partials.errors')
        @include('layouts.partials.success')

        {{--Tudo entre header e footer--}}
        @yield('content')

        {{--Footer do site--}}
{{--        @include('layouts.partials.footer')--}}

    </div>

    {{--Scripts a serem adicionados--}}
    <script src="{!! asset('js/app.js') !!}"></script>
    @yield('scripts')
</body>

</html>
