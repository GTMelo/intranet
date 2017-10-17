@extends('layouts.master')

@section('content')

    @include('layouts.partials.page_header', [
        'title' => 'IntraSAIN - Login',
        'sub' => 'É necessária uma conta para utilizar as ferramentas da IntraSAIN'
    ])

    <main class="container">
        <section class="section columns is-centered">
            <div class="column is-half">
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
        </section>
    </main>
@endsection

@section('scripts')
    <script>

    </script>
@endsection

{{--@section('content')--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-md-8 col-md-offset-2">--}}
{{--<div class="panel panel-default">--}}
{{--<div class="panel-heading">Login</div>--}}
{{--<div class="panel-body">--}}
{{--<form class="form-horizontal" method="POST" action="{{ route('login') }}">--}}
{{--{{ csrf_field() }}--}}

{{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
{{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="email" type="email" class="form-control" name="email"--}}
{{--value="{{ old('email') }}" required autofocus>--}}

{{--@if ($errors->has('email'))--}}
{{--<span class="help-block">--}}
{{--<strong>{{ $errors->first('email') }}</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
{{--<label for="password" class="col-md-4 control-label">Password</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="password" type="password" class="form-control" name="password" required>--}}

{{--@if ($errors->has('password'))--}}
{{--<span class="help-block">--}}
{{--<strong>{{ $errors->first('password') }}</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<div class="col-md-6 col-md-offset-4">--}}
{{--<div class="checkbox">--}}
{{--<label>--}}
{{--<input type="checkbox"--}}
{{--name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me--}}
{{--</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<div class="col-md-8 col-md-offset-4">--}}
{{--<button type="submit" class="btn btn-primary">--}}
{{--Login--}}
{{--</button>--}}

{{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--Forgot Your Password?--}}
{{--</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endsection--}}
