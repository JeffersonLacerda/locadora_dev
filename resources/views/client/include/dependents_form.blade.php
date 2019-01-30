@extends('adminlte::page')

@section('content_header')
    @isset($dependent)
        <h1>Modificar Dependente</h1>
    @else
        <h1>Adicionar Dependente</h1>
    @endisset
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
        <li><a href="{{ route('client.index') }}">Dependente</a></li>
        @isset($dependent)
            <li><a href="{{ route('dependent.edit', $dependent->id) }}">Modificar</a></li>
        @else
            <li><a href="{{ route('client.index') }}">Adicionar</a></li>
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
            {{-- Formulário para adicionar ou modificar dependentes --}}
            @isset($dependent)
            <form method="post" action="{{ route('dependent.edit', $dependent->id) }}" enctype="multipart/form-data">
                {{ method_field('PUT')}}
            @else
            <form method="post" action="{{ route('dependent.create', $id) }}" enctype="multipart/form-data">
            @endisset
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Informe o nome" value="{{ isset($dependent) ? old('name', $dependent->name) : old('name') }}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Informe o email" value="{{ isset($dependent) ? old('email', $dependent->email) : old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('birth_date') ? 'has-error' : '' }}">
                    <label for="birth_date">Data de Nascimento</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="Data de nascimento" value="{{ isset($dependent) ? old('birth_date', $dependent->birth_date) : old('birth_date') }}">
                    @if ($errors->has('birth_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('birth_date') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                    <label for="gender">Gênero</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="Não informado" @if((isset($dependent) && $dependent->gender == "Nãoinformado") || old('gender') == "Nãoinformado")) selected @endif>Não informado</option>
                        <option value="Masculino" @if((isset($dependent) && $dependent->gender == "Masculino") || old('gender') == "Masculino")) selected @endif>Masculino</option>
                        <option value="Feminino" @if((isset($dependent) && $dependent->gender == "Feminino") || old('gender') == "Feminino")) selected @endif>Ferminino</option>
                    </select>
                    @if ($errors->has('gender'))
                        <span class="help-block">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                    @endif
                </div>
                <input type="hidden" name="holder_id" value="{{ $id }}">
                <input type="hidden" name="type" value="Dependente">
                <div class="col-md-2 col-md-offset-10">
                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-fw fa-save"></i> Salvar</button>
                </div>
            </form>
        </div>
    </div>
@stop
