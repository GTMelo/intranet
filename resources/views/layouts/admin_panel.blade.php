@extends('layouts.master')

@section('content')

    <div class=" grid gcols-4 gap-small full-height container">

        @include('admin.menu.links-list')

        <section class="colspan-3">
            @yield('content-admin')
        </section>
    </div>

@endsection