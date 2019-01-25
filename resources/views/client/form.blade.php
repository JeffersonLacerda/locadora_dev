@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/select2-4.0.5/dist/css/select2.min.css')}}">
    <style>
            .select2-container--default .select2-selection--single, .select2-selection .select2-selection--single{
                padding: 3px !important;
            }
    </style>
@stop

@section('content_header')
    @isset($client)
        <h1>Modificar Cliente</h1>
    @else
        <h1>Adicionar Cliente</h1>
    @endisset
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
        <li><a href="{{ route('client.index') }}">Item</a></li>
        @isset($client)
            <li><a href="{{ route('client.edit', $client->id) }}">Modificar</a></li>
        @else
            <li><a href="{{ route('client.create') }}">Adicionar</a></li>
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
            {{-- Formulário para adicionar ou modificar Cliente --}}
            @isset($client)
            <form method="post" action="{{ route('client.edit', $client->id) }}" enctype="multipart/form-data">
                {{ method_field('PUT')}}
            @else
            <form method="post" action="{{ route('client.create') }}" enctype="multipart/form-data">
            @endisset
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Nome</label>
                    <input type="text" maxlength="20" class="form-control" id="name" name="name" numberholder="Nome do cliente" value="{{ isset($client) ? old('name', $client->name) : old('name') }}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">E-mail</label>
                    <input type="email" maxlength="20" class="form-control" id="email" name="email" numberholder="Endereço de E-mail" value="{{ isset($client) ? old('email', $client->email) : old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('cpf') ? 'has-error' : '' }}">
                    <label for="cpf">CPF</label>
                    <input type="text" maxlength="20" class="form-control" id="cpf" name="cpf" numberholder="Numeração do CPF" value="{{ isset($client) ? old('cpf', $client->holder->cpf) : old('cpf') }}">
                    @if ($errors->has('cpf'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cpf') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('place') ? 'has-error' : '' }}">
                    <label for="place">Logradouro</label>
                    <input type="text" maxlength="20" class="form-control" id="place" name="place" placeholder="Rua, avenida, praça ..." value="{{ isset($client) ? old('place', $client->holder->place) : old('place') }}">
                    @if ($errors->has('place'))
                        <span class="help-block">
                            <strong>{{ $errors->first('place') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
                    <label for="number">Número</label>
                    <input type="text" maxlength="20" class="form-control" id="number" name="number" numberholder="Numeração do logradouro" value="{{ isset($client) ? old('number', $client->holder->number) : old('number') }}">
                    @if ($errors->has('number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('number') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('complement') ? 'has-error' : '' }}">
                    <label for="complement">Complemento</label>
                    <input type="text" maxlength="20" class="form-control" id="complement" name="complement" complementholder="Complemento do logradouro" value="{{ isset($client) ? old('complement', $client->holder->complement) : old('complement') }}">
                    @if ($errors->has('complement'))
                        <span class="help-block">
                            <strong>{{ $errors->first('complement') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('district') ? 'has-error' : '' }}">
                    <label for="district">Bairro</label>
                    <input type="text" maxlength="20" class="form-control" id="district" name="district" districtholder="Bairro do logradouro" value="{{ isset($client) ? old('district', $client->holder->district) : old('district') }}">
                    @if ($errors->has('district'))
                        <span class="help-block">
                            <strong>{{ $errors->first('district') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                    <label for="city">Cidade</label>
                    <input type="text" maxlength="20" class="form-control" id="city" name="city" cityholder="Cidade do logradouro" value="{{ isset($client) ? old('city', $client->holder->city) : old('city') }}">
                    @if ($errors->has('city'))
                        <span class="help-block">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
                    <label for="state">Estado</label>
                    <input type="text" maxlength="20" class="form-control" id="state" name="state" stateholder="Estado do logradouro" value="{{ isset($client) ? old('state', $client->holder->state) : old('state') }}">
                    @if ($errors->has('state'))
                        <span class="help-block">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                    @endif
                </div>
               {{--   <div class="form-group {{ $errors->has('aaaaa') ? 'has-error' : '' }}">
                    <label for="aaaaa">Logradouro</label>
                    <input type="text" maxlength="20" class="form-control" id="aaaaa" name="aaaaa" aaaaaholder="Rua, avenida, praça ..." value="{{ isset($client) ? old('aaaaa', $client->holder->aaaaa) : old('aaaaa') }}">
                    @if ($errors->has('aaaaa'))
                        <span class="help-block">
                            <strong>{{ $errors->first('aaaaa') }}</strong>
                        </span>
                    @endif
                </div>  --}}
                <div class="col-md-2 col-md-offset-10">
                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-fw fa-save"></i> Salvar</button>
                </div>
            </form>
        </div>
    </div>
@stop
@section('js')
    <script src="{{ asset('vendor/select2-4.0.5/dist/js/select2.min.js')}}"></script>
    <script>
        $(document).ready( function () {
            $('#media_id').select2({
                numberholder: "Selecione a mídia"
            });
            $('#movie_id').select2({
                numberholder: "Selecione o filme"
            });
        });
    </script>
@stop
