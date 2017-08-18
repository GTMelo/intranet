@if(count($errors))
    <section class="container">
        <message cat="danger" title="Um ou mais problemas foram encontrados:">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </message>
    </section>
@endif