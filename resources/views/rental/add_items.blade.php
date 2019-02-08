@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/DataTables/datatables.min.css')}} ">
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

        /* .select2-search, .select2-search--inline{
            width: 300px!important;
        } */

        .select2-search, .select2-search--inline{
            width: 100% !important;
        }


        a {
            cursor: pointer;
        }

        .select2-container--default .select2-selection--single, .select2-selection .select2-selection--single{
            padding: 3px !important;
        }
    
    </style>
@stop

@section('content_header')
    <h1>Locação (Selecione os filmes)</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
        <li><a href="{{ route('rental.client') }}">Locação</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            
        </div>
        <div class="box-body" style="min-height: 70vh">
            @if (session('erro'))
                <div class="alert alert-error alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="fas fa-exclamation-circle"></i> Erro: </h4>
                    <p>{{ session('erro') }}</p>
                </div>
            @endif
            <div class="container-fluid">
                <div class="row">
                    {{-- <div class="col-md-4">
                    </div> --}}
                    
                    <div class="col-md-6">
                        <div class="box box-widget widget-user-2">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header">
                                <div class="widget-user-image">
                                    <img class="img-circle" src="{{ asset('img/usuario.jpg') }}">
                                </div>
                                <!-- /.widget-user-image -->
                                <h3 class="widget-user-username">{{ $client->name }}</h3>
                                <h5 class="widget-user-desc">Número de identificação: {{ sprintf('%010d', $client->id) }}</h5>
                            </div>
                            <div class="box-footer no-padding">
                                <ul class="nav nav-stacked">
                                <li>Titular<span class="pull-right">{{ $client->holder->cpf }} - {{ $client->holder->name }}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @php
                        if (isset($client_qrcode)){
                            $display_qr = 'block';
                            $display_id = 'none';
                        } else {
                            $display_qr = 'none';
                            $display_id = 'block';
                        }
                    @endphp
                    <div class="col-md-6" style="text-align: center;">
                        <h3 style="display: {{ $display_id }}">Adicinar um Item:</h3>
                        <form id="form_addItem">
                            <div class="form-group" style="display: {{ $display_id }};">
                                <label for="item">Escolha um Item:</label>
                                <select class="form-control select2" name="item" id="item" style="width: 100%;">
                                    <option disabled selected value> -- selecione um item -- </option>
                                    @foreach($items as $i)
                                        <option value="{{ $i->id }}">
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
                            <div class="form-group" style="display: {{ $display_qr }};">
                                <label class="col-md-12">
                                    <i class="fas fa-qrcode"></i> Leitor de qrcode:
                                </label>
                                <div class="col-md-6 col-md-offset-3" style="text-align: center;">
                                    <canvas style="width: 100%;"></canvas>
                                </div>
                            </div>
                            
                            {{-- <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-arrow-right"></i> Próximo</button>
                            </div> --}}
                            <input type="hidden" name="type" value="id">
                            
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="tb_items" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>TÍTULO</th>
                                        <th>TIPO</th>
                                        <th>PRAZO</th>
                                        <th>MÍDIA</th>
                                        <th>VALOR</th>
                                        <th>DESCONTO</th>
                                        <th>PRORROGAÇÃO</th>
                                        <th>DATA DE DEVOLUÇÃO</th>
                                        <th>TOTAL</th>
                                        <th>AÇÕES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
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
        function refreshTable(myMap){
            $('#tb_items tbody').html('');
            for (var value of myMap.values()) {
                var linha = "";
                var total = value.data.price - value.data.discount;
                //Calcular data de devolução
                var prazo = value.data.return_deadline + value.data.return_deadline_extension;
                var data_de_devolucao = value.data.return_date;
                var rota = "{{ route('rental.return_date', '') }}/" + prazo;
                if (value.data.return_deadline_extension != 0){
                    $.get(rota, function(data, status){
                        if (status == 'success'){
                            data_de_devolucao = data;
                        }
                    });
                }
                //---------------------------
                linha += "<tr>";
                linha += "<td>" + value.data.title + "</td>";
                linha += "<td>" + value.data.type + "</td>";
                linha += "<td>" + value.data.return_deadline + "</td>";
                linha += "<td>" + value.data.media + "</td>";
                linha += "<td>" + value.data.price.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }) + "</td>";
                linha += "<td>" + value.data.discount.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }) + "</td>";
                linha += "<td>" + value.data.return_deadline_extension + "</td>";
                linha += "<td>" + data_de_devolucao + "</td>";
                linha += "<td>" + total.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }) + "</td>";
                linha += "<td></td>";
                linha += "</tr>";
                $('#tb_items tbody').append(linha);
            }
        }
        $(document).ready( function () {
            var myMap = new Map();
            var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
            var arg = {
                resultFunction: function(result) {
                    var rota = "{{ route('rental.add_qrcode', '') }}/" + result.code;
                    $.get(rota, function(data, status){
                        if (status == 'success'){
                            var response = $.parseJSON(data);
                            if (response.status == "Available"){
                                if (!myMap.has(response.data.id)){
                                    myMap.set(response.data.id, response);
                                    console.log(response.data.id);
                                    refreshTable(myMap);
                                }
                            } else if(response.status == "Not Found") {
                                alert("Item não cadastrado!");
                            } else {
                                alert("Item indisponível no momento.");
                            }

                        }
                    });
                }
            };
            new WebCodeCamJS("canvas").init(arg).play();
            
            $('#item').select2({
                placeholder: "Selecione um item"
            });
            
        });
    </script>
@stop
