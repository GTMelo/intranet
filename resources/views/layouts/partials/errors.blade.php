{{--{!! dd($errors->isEmpty()) !!}--}}

@if(!$errors->isEmpty())
    <section class="container">
        <message cat="danger" title="Erro">
            <p>Um ou mais problemas foram encontrados:</p>
            <ul>
                @foreach($errors as $error)
                    <li>{{ $error->message }}</li>
                @endforeach
            </ul>
        </message>
    </section>
@endif