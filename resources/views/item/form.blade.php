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
    @isset($item)
        <h1>Modificar Item</h1>
    @else
        <h1>Adicionar Item</h1>
    @endisset
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
        <li><a href="{{ route('item.index') }}">Item</a></li>
        @isset($item)
            <li><a href="{{ route('item.index', $item->id) }}">Modificar</a></li>
        @else
            <li><a href="{{ route('item.index') }}">Adicionar</a></li>
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
            {{-- Formulário para adicionar ou modificar item --}}
            @isset($item)
            <form method="post" action="{{ route('item.edit', $item->id) }}" enctype="multipart/form-data">
                {{ method_field('PUT')}}
            @else
            <form method="post" action="{{ route('item.create') }}" enctype="multipart/form-data">
            @endisset
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('serial_number') ? 'has-error' : '' }}">
                    <label for="serial_number">Serial</label>
                    <input type="text" maxlength="20" class="form-control" id="serial_number" name="serial_number" placeholder="Número serial do item" value="{{ isset($item) ? old('serial_number', $item->serial_number) : old('serial_number') }}">
                    @if ($errors->has('serial_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('serial_number') }}</strong>
                        </span>
                    @endif
                 </div>
                 <div class="form-group {{ $errors->has('purchase_date') ? 'has-error' : '' }}">
                    <label for="purchase_date">Data da compra</label>
                    <div >
                        <input type="date" id="purchase_date" name="purchase_date" placeholder="Data da compra do item" value="{{ isset($item) ? old('purchase_date', $item->purchase_date) : old('purchase_date') }}">
                    </div>
                    @if ($errors->has('purchase_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('purchase_date') }}</strong>
                        </span>
                    @endif
                 </div>
                 <div class="form-group {{ $errors->has('movie_id') ? 'has-error' : '' }}">
                        <label for="movie_id">Filme</label>
                        <select name="movie_id" id="movie_id" class="campo_select2 form-control">
                            <option disabled selected value> -- selecione um filme -- </option>
                            @foreach ($movies as $m)
                            <option value="{{ $m->id }}"
                                {{ isset($item) &&  $item->movie_id == $m->id ? 'selected' : old('movie_id') == $m->id ? 'selected' : '' }}
                                >
                                {{ $m->title }}
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('movie_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('movie_id') }}</strong>
                            </span>
                        @endif
                     </div>
                 <div class="form-group {{ $errors->has('media_id') ? 'has-error' : '' }}">
                    <label for="media_id">Mídia</label>
                    <select name="media_id" id="media_id" class="campo_select2 form-control">
                        <option disabled selected value> -- selecione uma mídia -- </option>
                        @foreach ($medias as $me)
                        <option value="{{ $me->id }}"
                            {{ isset($item) &&  $item->media_id == $me->id ? 'selected' : old('media_id') == $me->id ? 'selected' : '' }}
                            >
                            {{ $me->description }}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('media_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('media_id') }}</strong>
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
            $('#media_id').select2({
                placeholder: "Selecione a mídia"
            });
            $('#movie_id').select2({
                placeholder: "Selecione o filme"
            });
        });
    </script>
@stop
