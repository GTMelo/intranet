@extends('layouts.master')

@section('content')

    <main class="container">

        <section>
        </section>

        <section class="section">
            <div>
                <label>Teste Vue</label>
                <input type="text" v-model="foo">
            </div>
            <br>
            <div>
                <pre>@{{ $data }}</pre>
            </div>
        </section>
        <section class="section">
            <input type="text" v-model="newName">
            <button @click="addName">add name</button>
            <ul>
                <li v-for="name in names" v-text="name"></li>
            </ul>
        </section>


    </main>

@endsection