@extends('adminlte::page')

@section('content_header')
    @isset($genre)
        <h1>Modificar Gênero</h1>
    @else
        <h1>Adicionar Gênero</h1>
    @endisset
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
        <li><a href="{{ route('genre.index') }}">Gêneros</a></li>
        @isset($genre)
            <li><a href="{{ route('genre.index', $genre->id) }}">Modificar</a></li>
        @else
            <li><a href="{{ route('genre.index') }}">Adicionar</a></li>
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
            {{-- Formulário para adicionar ou modificar gêneros --}}
            @isset($genre)
            <form method="post" action="{{ route('genre.edit', $genre->id) }}" enctype="multipart/form-data">
                {{ method_field('PUT')}}
            @else
            <form method="post" action="{{ route('genre.create') }}" enctype="multipart/form-data">
            @endisset
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">Descrição</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Descriçao do gênero" value="{{ isset($genre) ? old('description', $genre->description) : old('description') }}">
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
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
