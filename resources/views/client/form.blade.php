@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/select2-4.0.5/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-toggle-2.2.0/bootstrap-toggle.min.css')}}">
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
        <li><a href="{{ route('client.index') }}">Cliente</a></li>
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
            @isset($client)
            <div class="pull-right">
                <form action="{{ route('client.active', $client->id) }}" method="POST" id="active_form">
                    {{ csrf_field() }}
                    <input type="checkbox" name="active_field" id="active_field" data-toggle="toggle" data-on="Ativo" data-off="Inativo" @if($client->holder->active) checked @endif>
                </form>
            </div>
            @endisset
        </div>
        <div class="box-body">
            @if (session('erro'))
                <div class="alert alert-error alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="fas fa-exclamation-circle"></i> Erro: </h4>
                    <p>{{ session('erro') }}</p>
                </div>
            @endif
            <ul class="nav nav-pills nav-justified">
                <li class="active"><a data-toggle="tab" href="#titular">Titular</a></li>
                <li><a data-toggle="tab" href="#dependentes">Dependentes</a></li>
            </ul>
            <div class="tab-content">
                <div id="titular" class="tab-pane fade in active">
                    <br>
                    @include('client.include.holder')
                </div>
                <div id="dependentes" class="tab-pane fade">
                    <br>
                    @include('client.include.dependents_list')
                </div>
            </div>


        </div>
    </div>
@stop

