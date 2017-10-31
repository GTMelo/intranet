@extends('layouts.master')

@section('content')

    <div class=" grid gcols-4 gap-small full-height container">
        <aside class="menu">
            <div id="header_buttons">
            </div>
            <div id="admin-dashboard-menu">
                <p class="menu-label">Flags</p>
                <ul class="menu-list">
                    <li><a href="/admin/flaglist">List of flags</a></li>
                </ul>
            </div>
        </aside>
        <section class="colspan-3">
            @yield('content-admin')
        </section>
    </div>

@endsection