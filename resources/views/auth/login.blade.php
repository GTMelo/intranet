@extends('layouts.master')

@section('content')

    @include('layouts.partials.page_header', [
        'title' => 'IntraSAIN - Login',
        'sub' => 'É necessária uma conta para utilizar as ferramentas da IntraSAIN'
    ])

    <section class="section">
            <div class="columns is-centered">
                <div class="column is-one-third">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="field">
                            <div class="control has-icons-left">
                                <input class="input is-large" type="text" placeholder="CPF" name="cpf">
                                <span class="icon is-large is-left"><i class="fa fa-user"></i></span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control has-icons-left">
                                <input class="input is-large" type="password" placeholder="Senha" name="password">
                                <span class="icon is-large is-left"><i class="fa fa-key"></i></span>
                            </div>
                        </div>
                        <div class="field">
                            <button class="button is-large is-fullwidth is-primary">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>

    </section>

    {{--<main class="container">--}}
        {{--<section class="section columns is-centered">--}}
            {{--<div class="column is-half">--}}
                {{--<form class="form-horizontal" method="POST" action="{{ route('login') }}">--}}
                    {{--{{ csrf_field() }}--}}

                    {{--<div class="field">--}}
                        {{--<div class="control has-icons-left">--}}
                            {{--<input class="input is-large" type="text" placeholder="CPF" name="cpf">--}}
                            {{--<span class="icon is-large is-left"><i class="fa fa-user"></i></span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="field">--}}
                        {{--<div class="control has-icons-left">--}}
                            {{--<input class="input is-large" type="password" placeholder="Senha" name="password">--}}
                            {{--<span class="icon is-large is-left"><i class="fa fa-key"></i></span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="field">--}}
                        {{--<button class="button is-large is-fullwidth is-primary">Entrar</button>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</section>--}}
    {{--</main>--}}
@endsection

@section('scripts')
    <script>

    </script>
@endsection