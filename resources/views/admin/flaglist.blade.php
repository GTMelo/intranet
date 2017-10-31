@extends('layouts.admin_panel')

@section('content-admin')

    <h1 class="is-size-3">Lista de Flags</h1>
    <table class="table is-fullwidth info-table">
        <tr>
            <th>Nome</th>
            <th>Código</th>
            <th>Descrição</th>
        </tr>
        @foreach($flags as $flag)
            <tr>
                <td>{{$flag->display_name}}</td>
                <td>{{$flag->code}}</td>
                <td>{{$flag->description}}</td>
            </tr>
        @endforeach
    </table>

@endsection
