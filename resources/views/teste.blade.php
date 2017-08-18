@extends('layouts.master')

@section('content')

    <main class="container">

        <section class="container">
            <button class="button is-primary" @click="showTestModal = true">launch test modal</button>
            <modal v-if="showTestModal" @close="showTestModal = false" title="Example modal">
                <form id="formteste">adsf</form>
                <template slot="footer">
                    <button class="button is-primary" form="formteste">Go</button>
                </template>
            </modal>
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