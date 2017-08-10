<!doctype html>
<html lang="{{ app()->getLocale() }}">

{{--Head--}}
@include('layouts.partials.head')

<body>

{{--Header do Site--}}
@include('layouts.partials.header')

{{--Tudo entre header e footer--}}
@yield('content')

{{--Footer do site--}}
@include('layouts.partials.footer')

{{--Scripts a serem adicionados--}}
@yield('scripts')

</body>
</html>
