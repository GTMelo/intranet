@extends('layouts.master')

@section('content')

    <main class="container" id="app">

        <h1>Testes Vue</h1>
        <input type="text" v-model="foo">

        <p>Thing is @{{ foo }}</p>

    </main>

@endsection