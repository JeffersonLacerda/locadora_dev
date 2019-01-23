@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/select2-4.0.5/dist/css/select2.min.css')}}">
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #367FA9;
            border-color: #000;
            padding: 1px 10px;
            color: #fff;
            cursor: pointer;
        }
        .select2 input {
            width: 100% !important;
        }

        .select2-search, .select2-search--inline{
            width: 300px!important;
        }

        a {
            cursor: pointer;
        }
    </style>
@stop

@section('content_header')
    @isset($movie)
        <h1>Modificar Filme</h1>
    @else
        <h1>Adicionar Filme</h1>
    @endisset
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
        <li><a href="{{ route('movie.index') }}">Filme</a></li>
        @isset($movie)
            <li><a href="{{ route('movie.index', $movie->id) }}">Modificar</a></li>
        @else
            <li><a href="{{ route('movie.index') }}">Adicionar</a></li>
        @endisset
    </ol>
@stop
@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-primary"><i class="fa fa-fw fa-arrow-left"></i> Voltar</a>
            <div class="pull-right">
                <a class="btn btn-primary" style="background-color: #081E25; border-color: #081E25; color: #02B067;"><i class="fa fa-fw fa-search"></i> <img src="{{ asset('img/tmdb.PNG')}}" style="height: 2em;"></a>
            </div>
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
            @isset($movie)
            <form method="post" action="{{ route('movie.edit', $movie->id) }}" enctype="multipart/form-data">
                {{ method_field('PUT')}}
            @else
            <form method="post" action="{{ route('movie.create') }}" enctype="multipart/form-data">
            @endisset
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('tmdb_id') ? 'has-error' : '' }}">
                    <label for="tmdb_id">código TMDb:</label>
                    <input type="text" class="form-control" id="tmdb_id" name="tmdb_id" placeholder="Informe o código do filme conforme a THE MOVIE DB (https://www.themoviedb.org/)" value="{{ isset($movie) ? old('tmdb_id', $movie->tmdb_id) : old('tmdb_id') }}">
                    @if ($errors->has('tmdb_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tmdb_id') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Informe o título" value="{{ isset($movie) ? old('title', $movie->title) : old('title') }}">
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                 </div>
                <div class="form-group {{ $errors->has('original_title') ? 'has-error' : '' }}">
                    <label for="original_title">Título original</label>
                    <input type="text" class="form-control" id="original_title" name="original_title" placeholder="Informe título original" value="{{ isset($movie) ? old('original_title', $movie->original_title) : old('original_title') }}">
                    @if ($errors->has('original_title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('original_title') }}</strong>
                        </span>
                    @endif
                 </div>
                 <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
                    <label for="country">País</label>
                    <select class="form-control select2" name="country[]" id="selectCountries" multiple="multiple" style="width: 100%;">
                    @foreach($countries as $c)
                        <option value="{{ $c->sigla2 }}">
                            {{ $c->sigla2 }} - {{ $c->nome }} 
                        </option>
                    @endforeach
                    @if ($errors->has('country'))
                        <span class="help-block">
                            <strong>{{ $errors->first('country') }}</strong>
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

@section('js')
    <script src="{{ asset('vendor/select2-4.0.5/dist/js/select2.min.js')}}"></script>
    <script>
        $(document).ready( function () {
            $('#selectCountries').select2({
                placeholder: "Selecione a nacionalidade"
            });
        });
    </script>
@stop