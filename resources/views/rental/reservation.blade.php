@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/DataTables/datatables.min.css')}} ">
    <link rel="stylesheet" href="{{ asset('vendor/select2-4.0.5/dist/css/select2.min.css')}}">
    <style>
        .cx4 {
            min-height: 200px;
        }
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

        /* .select2-search, .select2-search--inline{
            width: 300px!important;
        } */

        .select2-search, .select2-search--inline{
            width: 100% !important;
        }

        /* .select2-results,.select2-container{
            max-height: 100px;
        } */

        a {
            cursor: pointer;
        }

        .select2-container--default .select2-selection--single, .select2-selection .select2-selection--single{
            padding: 3px !important;
        }

    </style>
@stop

@section('content_header')
    <h1>Reserva</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
        <li><a href="{{ route('rental.index') }}">Locação</a></li>
        <li><a href="{{ route('rental.reservation') }}">Reserva</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">

        </div>
        <div class="box-body" style="min-height: 70vh">
            @if ($errors->any())
                <div class="alert alert-error alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="fas fa-exclamation-circle"></i> Erro: </h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="box box-default cx4">
                            <div class="box-body">
                                <h5 class="box-title"><i class="fas fa-user"></i> Cliente</h5>
                                <p>Nome: <b>Maria Josefa dos Santos</b></p>
                                <h5><i class="fas fa-user-plus"></i> Titular</h5>
                                <p>CPF: <b>41687141444</b></p>
                                <p>Nome: <b>Maria Josefa dos Santos</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box box-default cx4">
                            <div class="box-header with-border">
                                <h3 class="box-title">
                                    <i class="fas fa-keyboard"></i> Entrada
                                </h3>
                                <div class="box-tools pull-right">
                                    {{-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button> --}}
                                </div>
                            </div>
                            <div class="box-body">
                                <form id="form_addItem">
                                    <div class="form-group">
                                        <label for="item">Escolha um Item:</label>
                                        <select class="form-control select2" name="item" id="item" style="width: 100%;">
                                            <option disabled selected value> -- selecione um item -- </option>
                                            @foreach($items as $i)
                                                <option value="{{ sprintf('%02d', $i->media_id) }}{{ sprintf('%08d', $i->movie_id) }}">
                                                    ({{$i->media->description}}) {{ $i->movie->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('item'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('item') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box box-default cx4">
                            <div class="box-header with-border">
                                <h3 class="box-title">
                                    <i class="fas fa-qrcode"></i> QR code
                                </h3>
                                <div class="box-tools pull-right">
                                    {{-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button> --}}
                                </div>
                            </div>
                            <div class="box-body" style="text-align: center">
                                <canvas style="width: 50%;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="tb_items" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>TÍTULO</th>
                                        <th>TIPO</th>
                                        <th>MÍDIA</th>
                                        <th>STATUS</th>
                                        <th>PREVISÃO DE DISPONIBILIDADE</th>
                                        <th>AÇÕES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Bohemian Rhapsody</td>
                                        <td>Lançamento</td>
                                        <td>Blu-Ray</td>
                                        <td><span class="label bg-red">Expirado</span></td>
                                        <td>15/02/2019</td>
                                        <td><div class="btn-group"><abbr title="Alterar"><a cod="67" class="btn btn-default btn-sm btn_editar" style="color: black"><i class="fas fa-edit"></i></a></abbr><abbr title="Remover"><a cod="67" class="btn btn-default btn-sm btn_remover" style="color: red"><i class="fas fa-times"></i></a></abbr></div></td>
                                    </tr>
                                    <tr>
                                        <td>Robin Hood - A Origem</td>
                                        <td>Lançamento</td>
                                        <td>Blu-Ray</td>
                                        <td><span class="label bg-green">Disponível</span></td>
                                        <td>18/02/2019</td>
                                        <td><div class="btn-group"><abbr title="Alterar"><a cod="75" class="btn btn-default btn-sm btn_editar" style="color: black"><i class="fas fa-edit"></i></a></abbr><abbr title="Remover"><a cod="75" class="btn btn-default btn-sm btn_remover" style="color: red"><i class="fas fa-times"></i></a></abbr></div></td>
                                    </tr>
                                    <tr>
                                        <td>Missão Impossível - Efeito Fallout</td>
                                        <td>Lançamento</td>
                                        <td>HD-DVD</td>
                                        <td><span class="label bg-yellow">Aguardando</span></td>
                                        <td>22/02/2019</td>
                                        <td><div class="btn-group"><abbr title="Alterar"><a cod="106" class="btn btn-default btn-sm btn_editar" style="color: black"><i class="fas fa-edit"></i></a></abbr><abbr title="Remover"><a cod="106" class="btn btn-default btn-sm btn_remover" style="color: red"><i class="fas fa-times"></i></a></abbr></div></td>
                                    </tr>
                                    <tr>
                                        <td>Os Incríveis 2</td>
                                        <td>Catálogo</td>
                                        <td>Blu-Ray</td>
                                        <td><span class="label bg-yellow">Aguardando</span></td>
                                        <td>25/02/2019</td>
                                        <td><div class="btn-group"><abbr title="Alterar"><a cod="115" class="btn btn-default btn-sm btn_editar" style="color: black"><i class="fas fa-edit"></i></a></abbr><abbr title="Remover"><a cod="115" class="btn btn-default btn-sm btn_remover" style="color: red"><i class="fas fa-times"></i></a></abbr></div></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-success btn-block"><i class="fa fa-fw fa-save"></i> Registrar Reserva</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="dialog_del">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Cancelar a reserva?</h4>
                </div>
                <div class="modal-body">
                <p>Tem certeza que deseja Cancelar a reserva?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="delete-btn">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor/select2-4.0.5/dist/js/select2.min.js')}}"></script>
    <script src="{{ asset('vendor/webcodecamjs/js/qrcodelib.js') }}"></script>
    <script src="{{ asset('vendor/webcodecamjs/js/webcodecamjs.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('.btn_remover').on('click', function(e){
                $('#dialog_del').modal();
            });
            var arg = {
                resultFunction: function(result) {
                    console.log("Item adicionado "+result.code);
                }
            };
            new WebCodeCamJS("canvas").init(arg).play();
        });
    </script>
@stop
