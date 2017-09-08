<section>
    <h2 class="is-size-2">Dados bancários</h2>

    <label class="label">Dados bancários</label>
    <div class="field has-addons">
        <div class="select is-expanded">
            <select name="banco">

                @foreach(\App\Models\Banco::all()->sortBy('nome') as $banco)
                    <option value="{{ $banco->id }}" @if($banco->nome == 'Banco do Brasil S/A') selected="selected" @endif>{{ $banco->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="control is-expanded">
            <input name="agencia" class="input" type="text" placeholder="Agência">
        </div>
        <div class="control is-expanded">
            <input name="conta" class="input" type="text" placeholder="conta">
        </div>

    </div>

</section>