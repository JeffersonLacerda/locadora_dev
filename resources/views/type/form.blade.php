@extends('adminlte::page')

@section('content_header')
    @isset($type)
        <h1>Modificar Tipo</h1>
    @else
        <h1>Adicionar Tipo</h1>
    @endisset
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
        <li><a href="{{ route('type.index') }}">Tipos</a></li>
        @isset($type)
            <li><a href="{{ route('type.index', $type->id) }}">Modificar</a></li>
        @else
            <li><a href="{{ route('type.index') }}">Adicionar</a></li>
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
            {{-- Formulário para adicionar ou modificar tipos --}}
            @isset($type)
            <form method="post" action="{{ route('type.edit', $type->id) }}" enctype="multipart/form-data">
                {{ method_field('PUT')}}
            @else
            <form method="post" action="{{ route('type.create') }}" enctype="multipart/form-data">
            @endisset
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">Descrição</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Descriçao do tipo" value="{{ isset($type) ? old('description', $type->description) : old('description') }}">
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                 </div>
                 <div class="form-group {{ $errors->has('return_deadline') ? 'has-error' : '' }}">
                    <label for="return_deadline">Prazo para devolução (Dias)</label>
                    <input type="number" class="form-control" id="return_deadline" name="return_deadline" placeholder="Informe em dias o prazo para devolução" value="{{ isset($type) ? old('return_deadline', $type->return_deadline) : old('return_deadline') }}">
                    @if ($errors->has('return_deadline'))
                        <span class="help-block">
                            <strong>{{ $errors->first('return_deadline') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('increase') ? 'has-error' : '' }}">
                    <label for="increase">Acréscimo ao valor de locação (%)</label>
                    <input type="number" step="0.01" class="form-control" id="increase" name="increase" placeholder="Informe o percentual de acréscimo no valor da locação" value="{{ isset($type) ? old('increase', $type->increase) : old('increase') }}">
                    @if ($errors->has('increase'))
                        <span class="help-block">
                            <strong>{{ $errors->first('increase') }}</strong>
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
