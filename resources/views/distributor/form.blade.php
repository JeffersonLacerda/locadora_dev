@extends('adminlte::page')

@section('content_header')
    @isset($distributor)
        <h1>Modificar Distribuidora</h1>
    @else
        <h1>Adicionar Distribuidora</h1>
    @endisset
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
        <li><a href="{{ route('distributor.index') }}">Distribuidora</a></li>
        @isset($distributor)
            <li><a href="{{ route('distributor.index', $distributor->id) }}">Modificar</a></li>
        @else
            <li><a href="{{ route('distributor.index') }}">Adicionar</a></li>
        @endisset
    </ol>
@stop
@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-primary"><i class="fa fa-fw fa-arrow-left"></i> Voltar</a>
        </div>
        <div class="box-body">
            @if (session('erro'))
                <div class="alert alert-error alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="fas fa-exclamation-circle"></i> Erro: </h4>
                    <p>{{ session('erro') }}</p>
                </div>
            @endif
            {{-- Formulário para adicionar ou modificar distribuidores --}}
            @isset($distributor)
            <form method="post" action="{{ route('distributor.edit', $distributor->id) }}" enctype="multipart/form-data">
                {{ method_field('PUT')}}
            @else
            <form method="post" action="{{ route('distributor.create') }}" enctype="multipart/form-data">
            @endisset
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('cnpj') ? 'has-error' : '' }}">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="Informe o CNPJ do distribuidor" value="{{ isset($distributor) ? old('cnpj', $distributor->cnpj) : old('cnpj') }}">
                    @if ($errors->has('cnpj'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cnpj') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('corporate_name') ? 'has-error' : '' }}">
                    <label for="corporate_name">Razão Social</label>
                    <input type="text" class="form-control" id="corporate_name" name="corporate_name" placeholder="Razão Social do distribuidor" value="{{ isset($distributor) ? old('corporate_name', $distributor->corporate_name) : old('corporate_name') }}">
                    @if ($errors->has('corporate_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('corporate_name') }}</strong>
                        </span>
                    @endif
                 </div>
                <div class="form-group {{ $errors->has('contact_name') ? 'has-error' : '' }}">
                    <label for="contact_name">Pessoa de Contato</label>
                    <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Informe o nome da pessoa de contato" value="{{ isset($distributor) ? old('contact_name', $distributor->contact_name) : old('contact_name') }}">
                    @if ($errors->has('contact_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('contact_name') }}</strong>
                        </span>
                    @endif
                 </div>
                 <div class="form-group {{ $errors->has('contact_phone') ? 'has-error' : '' }}">
                    <label for="contact_phone">Telefone de contato</label>
                    <input type="text" class="form-control" id="contact_phone" name="contact_phone" placeholder="Informe o telefone de contato" value="{{ isset($distributor) ? old('contact_phone', $distributor->contact_phone) : old('contact_phone') }}">
                    @if ($errors->has('contact_phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('contact_phone') }}</strong>
                        </span>
                    @endif
                 </div>
                 <div class="form-group {{ $errors->has('place') ? 'has-error' : '' }}">
                    <label for="place">Logradouro</label>
                    <input type="text" class="form-control" id="place" name="place" placeholder="Informe o logradouro" value="{{ isset($distributor) ? old('place', $distributor->place) : old('place') }}">
                    @if ($errors->has('place'))
                        <span class="help-block">
                            <strong>{{ $errors->first('place') }}</strong>
                        </span>
                    @endif
                 </div>
                 <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
                    <label for="number">Número</label>
                    <input type="text" class="form-control" id="number" name="number" placeholder="O número do logradouro" value="{{ isset($distributor) ? old('number', $distributor->number) : old('number') }}">
                    @if ($errors->has('number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('number') }}</strong>
                        </span>
                    @endif
                 </div>
                 <div class="form-group {{ $errors->has('complement') ? 'has-error' : '' }}">
                    <label for="complement">Complemento</label>
                    <input type="text" class="form-control" id="complement" name="complement" placeholder="Complemento do logradouro" value="{{ isset($distributor) ? old('complement', $distributor->complement) : old('complement') }}">
                    @if ($errors->has('complement'))
                        <span class="help-block">
                            <strong>{{ $errors->first('complement') }}</strong>
                        </span>
                    @endif
                 </div>
                 <div class="form-group {{ $errors->has('district') ? 'has-error' : '' }}">
                    <label for="district">Bairro</label>
                    <input type="text" class="form-control" id="district" name="district" placeholder="Bairro do logradouro" value="{{ isset($distributor) ? old('district', $distributor->district) : old('district') }}">
                    @if ($errors->has('district'))
                        <span class="help-block">
                            <strong>{{ $errors->first('district') }}</strong>
                        </span>
                    @endif
                 </div>
                 <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                    <label for="city">Cidade</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Cidade do logradouro" value="{{ isset($distributor) ? old('city', $distributor->city) : old('city') }}">
                    @if ($errors->has('city'))
                        <span class="help-block">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                    @endif
                 </div>
                 <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
                    <label for="state">Estado</label>
                    <input type="text" class="form-control" id="state" name="state" placeholder="Informe o estado" value="{{ isset($distributor) ? old('state', $distributor->state) : old('state') }}">
                    @if ($errors->has('state'))
                        <span class="help-block">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                    @endif
                 </div>
                 <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
                    <label for="country">País</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="Informe o país" value="{{ isset($distributor) ? old('country', $distributor->country) : old('country') }}">
                    @if ($errors->has('country'))
                        <span class="help-block">
                            <strong>{{ $errors->first('country') }}</strong>
                        </span>
                    @endif
                 </div>
                 <div class="form-group {{ $errors->has('cep') ? 'has-error' : '' }}">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" placeholder="Informe o CEP" value="{{ isset($distributor) ? old('cep', $distributor->cep) : old('cep') }}">
                    @if ($errors->has('cep'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cep') }}</strong>
                        </span>
                    @endif
                 </div>
                <div class="col-md-2 col-md-offset-10">
                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-fw fa-save"></i> Salvar</button>
                </div>
            </form>
        </div>
    </div>
@stop
