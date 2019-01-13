@extends('adminlte::master')

@section('adminlte_css')
    <style>
        #title {
            background-color: black;
            color: white;
            padding: 1em;
        }
        h1 {
            text-align: center;
            margin: 0;
        }
        #icon {
            text-align: center;
            color: #C23321;
            font-size: 20em;
        }
    </style>
@stop

@section('body')
    <div id="title">
        <h1><i class="fas fa-chess-queen"></i> Locadora Imperial</h1>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="callout callout-danger">
                    <h4>403</h4>
                    <h2>Acesso Negado.</h2>
                </div>
            </div>
        </div>
    </div>
    <p id="icon"><i class="fas fa-ban"></i></p>
@stop