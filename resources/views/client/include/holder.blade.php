{{-- Formulário para adicionar ou modificar Cliente --}}
@isset($client)

<form id="cliente_form" method="post" action="{{ route('client.edit', $client->id) }}" enctype="multipart/form-data">
    {{ method_field('PUT')}}
    @if($client->holder->active)
        <fieldset>
    @else
        <fieldset disabled="disabled">
    @endif
@else
<form id="cliente_form" method="post" action="{{ route('client.create') }}" enctype="multipart/form-data">
@endisset
    {{ csrf_field() }}
    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nome do cliente" value="{{ isset($client) ? old('name', $client->name) : old('name') }}">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Endereço de E-mail" value="{{ isset($client) ? old('email', $client->email) : old('email') }}">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('birth_date') ? 'has-error' : '' }}">
        <label for="birth_date">Data de Nascimento</label>
        <input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="Data de nascimento" value="{{ isset($client) ? old('birth_date', $client->birth_date) : old('birth_date') }}">
        @if ($errors->has('birth_date'))
            <span class="help-block">
                <strong>{{ $errors->first('birth_date') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
        <label for="gender">Gênero</label>
        <select name="gender" id="gender" class="form-control">
            <option value="Não informado" @if((isset($client) && $client->gender == "Nãoinformado") || old('gender') == "Nãoinformado")) selected @endif>Não informado</option>
            <option value="Masculino" @if((isset($client) && $client->gender == "Masculino") || old('gender') == "Masculino")) selected @endif>Masculino</option>
            <option value="Feminino" @if((isset($client) && $client->gender == "Feminino") || old('gender') == "Feminino")) selected @endif>Ferminino</option>
        </select>
        @if ($errors->has('gender'))
            <span class="help-block">
                <strong>{{ $errors->first('gender') }}</strong>
            </span>
        @endif
    </div>
    <input type="hidden" name="type" value="Titular">
    <div class="form-group {{ $errors->has('cpf') ? 'has-error' : '' }}">
        <label for="cpf">CPF</label>
        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Numeração do CPF" value="{{ isset($client) ? old('cpf', $client->holder->cpf) : old('cpf') }}">
        @if ($errors->has('cpf'))
            <span class="help-block">
                <strong>{{ $errors->first('cpf') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('place') ? 'has-error' : '' }}">
        <label for="place">Logradouro</label>
        <input type="text" class="form-control" id="place" name="place" placeholder="Rua, avenida, praça ..." value="{{ isset($client) ? old('place', $client->holder->place) : old('place') }}">
        @if ($errors->has('place'))
            <span class="help-block">
                <strong>{{ $errors->first('place') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
        <label for="number">Número</label>
        <input type="text" class="form-control" id="number" name="number" placeholder="Numeração do logradouro" value="{{ isset($client) ? old('number', $client->holder->number) : old('number') }}">
        @if ($errors->has('number'))
            <span class="help-block">
                <strong>{{ $errors->first('number') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('complement') ? 'has-error' : '' }}">
        <label for="complement">Complemento</label>
        <input type="text" class="form-control" id="complement" name="complement" placeholder="Complemento do logradouro" value="{{ isset($client) ? old('complement', $client->holder->complement) : old('complement') }}">
        @if ($errors->has('complement'))
            <span class="help-block">
                <strong>{{ $errors->first('complement') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('district') ? 'has-error' : '' }}">
        <label for="district">Bairro</label>
        <input type="text" class="form-control" id="district" name="district" placeholder="Bairro do logradouro" value="{{ isset($client) ? old('district', $client->holder->district) : old('district') }}" list="district">
        @if ($errors->has('district'))
            <span class="help-block">
                <strong>{{ $errors->first('district') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
        <label for="city">Cidade</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Cidade do logradouro" value="{{ isset($client) ? old('city', $client->holder->city) : old('city') }}" list="city">
        @if ($errors->has('city'))
            <span class="help-block">
                <strong>{{ $errors->first('city') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
        <label for="state">Estado</label>
        <input type="text" class="form-control" id="state" name="state" placeholder="Estado do logradouro" value="{{ isset($client) ? old('state', $client->holder->state) : old('state') }}" list="state">
        @if ($errors->has('state'))
            <span class="help-block">
                <strong>{{ $errors->first('state') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
        <label for="country">País</label>
        <input type="text" class="form-control" id="country" name="country" placeholder="País do logradouro" value="{{ isset($client) ? old('country', $client->holder->country) : old('country') }}" list="countries">
        @if ($errors->has('country'))
            <span class="help-block">
                <strong>{{ $errors->first('country') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('workplace') ? 'has-error' : '' }}">
        <label for="workplace">Ocupação profissional</label>
        <input type="text" class="form-control" id="workplace" name="workplace" placeholder="Ocupação profissional" value="{{ isset($client) ? old('workplace', $client->holder->workplace) : old('workplace') }}">
        @if ($errors->has('workplace'))
            <span class="help-block">
                <strong>{{ $errors->first('workplace') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('home_phone') ? 'has-error' : '' }}">
        <label for="home_phone">Contato residencial</label>
        <input type="text" class="form-control" id="home_phone" name="home_phone" placeholder="Telefone residencial" value="{{ isset($client) ? old('home_phone', $client->holder->home_phone) : old('home_phone') }}">
        @if ($errors->has('home_phone'))
            <span class="help-block">
                <strong>{{ $errors->first('home_phone') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('cell_phone') ? 'has-error' : '' }}">
        <label for="cell_phone">Celular</label>
        <input type="text" class="form-control" id="cell_phone" name="cell_phone" placeholder="Telefone celular" value="{{ isset($client) ? old('cell_phone', $client->holder->cell_phone) : old('cell_phone') }}">
        @if ($errors->has('cell_phone'))
            <span class="help-block">
                <strong>{{ $errors->first('cell_phone') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('work_phone') ? 'has-error' : '' }}">
        <label for="work_phone">Contato profissional</label>
        <input type="text" class="form-control" id="work_phone" name="work_phone" placeholder="Telefone profissional" value="{{ isset($client) ? old('work_phone', $client->holder->work_phone) : old('work_phone') }}">
        @if ($errors->has('work_phone'))
            <span class="help-block">
                <strong>{{ $errors->first('work_phone') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-md-2 col-md-offset-10">
        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-fw fa-save"></i> Salvar</button>
    </div>
    <datalist id="country">
        @foreach($countries as $c)
        <option value="{{ $c->nome }}">
        @endforeach
    </datalist>
    <datalist id="state">
        @foreach($state as $s)
        <option value="{{ $s }}">
        @endforeach
    </datalist>
    <datalist id="city">
        @foreach($city as $ci)
        <option value="{{ $ci }}">
        @endforeach
    </datalist>
    <datalist id="district">
        @foreach($district as $d)
        <option value="{{ $d }}">
        @endforeach
    </datalist>
</fieldset>
</form>
