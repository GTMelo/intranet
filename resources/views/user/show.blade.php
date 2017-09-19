@extends('layouts.master')

@section('content')

    @include('user.show.hero_banner')

    <main class="container user-profile">

        @include('user/show/sidebar')

        <main>
            @yield('user-content')
        </main>
    </main>
@endsection