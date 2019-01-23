@extends('adminlte::page')

@section('content_header')
    @isset($user)
        <h1>Modificar Usuário</h1>
    @else
        <h1>Adicionar Usuário</h1>
    @endisset
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
        <li><a href="{{ route('user.index') }}">Usuário</a></li>
        @isset($user)
            <li><a href="{{ route('user.edit', $user->id) }}">Modificar</a></li>
        @else
            <li><a href="{{ route('user.index') }}">Adicionar</a></li>
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
            @isset($user)
            <form method="post" action="{{ route('user.edit', $user->id) }}" enctype="multipart/form-data">
                {{ method_field('PUT')}}
            @else
            <form method="post" action="{{ route('user.create') }}" enctype="multipart/form-data">
            @endisset
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Informe o nome completo" value="{{ isset($user) ? old('name', $user->name) : old('name') }}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                    <label for="user">Usuário</label>
                    <input type="text" class="form-control" id="user" name="user" placeholder="Informe o usuário para logar no sistema" value="{{ isset($user) ? old('user', $user->user) : old('user') }}">
                    @if ($errors->has('user'))
                        <span class="help-block">
                            <strong>{{ $errors->first('user') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Informe o endereço de e-mail" value="{{ isset($user) ? old('email', $user->email) : old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Senha de acesso ao sistema" value="{{ isset($user) ? old('password', $user->password) : old('password') }}">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                 </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password_confirmation">Confirme a senha</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirme a senha" value="{{ isset($user) ? old('password', $user->password) : old('password') }}">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('profile') ? 'has-error' : '' }}">
                    <label for="profile">Perfil</label>
                    <select name="profile" id="profile" class="form-control">
                        <option disabled selected value> -- selecione um perfil -- </option>
                        <option value='Administração'
                            {{ isset($user) &&  $user->profile == 'Administração' ? 'selected' : old('profile') == 'Administração' ? 'selected' : '' }}
                            >
                            Administração
                        </option>
                        <option value='Atendimento'
                            {{ isset($user) &&  $user->profile == 'Atendimento' ? 'selected' : old('profile') == 'Atendimento' ? 'selected' : '' }}
                            >
                            Atendimento
                        </option>
                    </select>
                    @if ($errors->has('profile'))
                        <span class="help-block">
                            <strong>{{ $errors->first('profile') }}</strong>
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
