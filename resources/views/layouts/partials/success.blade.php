@if(\Illuminate\Support\Facades\Session::has('messages'))
    <section class="container">
        <message cat="success">
            <ul>
                <li>{{ session()->get('messages') }}</li>
            </ul>
        </message>
    </section>
@endif