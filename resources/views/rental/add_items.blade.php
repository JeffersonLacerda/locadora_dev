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
                                <p>Nome: <b>{{ $client->name }}</b></p>
                                <h5><i class="fas fa-user-plus"></i> Titular</h5>
                                <p>CPF: <b>{{ $client->holder->cpf }}</b></p>
                                <p>Nome: <b>{{ $client->holder->name }}</b></p>
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
                            <form method="post" action="{{ route('rental.save') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" id="client_id" name="client_id" value="{{ $client->id }}">
                                <input type="hidden" id="data_items" name="data_items" value="">
                                <div class="col-md-2 col-md-offset-10">
                                    <button type="submit" class="btn btn-success btn-block" disabled><i class="fa fa-fw fa-save"></i> Registrar locação</button>
                                </div>
                            </form>
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
        var myMap = new Map();

        function refreshTable(myMap){
            $('#tb_items tbody').html('');
            if(myMap.size > 0){
                $('button[type="submit"]').removeAttr("disabled");
            } else {
                $('button[type="submit"]').attr("disabled", true);
            }
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
                linha += "<td>";
                    linha += "<div class='btn-group'>";
                    linha += "<abbr title='Alterar'><a cod='" + value.data.id + "' class='btn btn-default btn-sm btn_editar' style='color: black'><i class='fas fa-edit'></i></a></abbr>";
                    linha += "<abbr title='Remover'><a cod='" + value.data.id + "' class='btn btn-default btn-sm btn_remover' style='color: red'><i class='fas fa-times'></i></a></abbr>";
                    linha += "<td>";
                    linha += "</div>";
                linha += "</td>";
                linha += "</tr>";
                $('#tb_items tbody').append(linha);
                /* $('#item').select2('open'); */
            }
        }

        function addItem(code, op){
            var rota = "{{ route('rental.add_qrcode', '') }}/" + code;
            $.get(rota, function(data, status){
                if (status == 'success'){
                    var response = $.parseJSON(data);
                    if (response.status == "Available"){
                        if (!myMap.has(response.data.id)){
                            myMap.set(response.data.id, response);
                            console.log(response.data.id);
                            console.log(response);
                            refreshTable(myMap);
                        }
                        if (op){
                            $('#item').select2('open');
                        }
                    } else if(response.status == "Not Found") {
                        alert("Item não cadastrado!");
                    } else {
                        alert("Item indisponível no momento.");
                    }

                }
            });
        }

        $(document).ready( function () {
            var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
            var arg = {
                resultFunction: function(result) {
                    addItem(result.code, false);
                }
            };
            new WebCodeCamJS("canvas").init(arg).play();
            
            $('#item').select2({
                placeholder: "Selecione um item"
            });

            $('#item').change(function (){
                var code = $('#item').val();
                addItem(code, true);
                /* $('#item').select2('open'); */
                /* $('#item .select2-search__field').val('');
                $('#item').focus(); */
            });

            $('#tb_items').on( "click", ".btn_remover", function() {
                var key = $(this).attr('cod') * 1;
                console.log(key);
                console.log(myMap.size);
                console.log(myMap.delete(key));
                console.log(myMap.size);
                refreshTable(myMap);
            });
            
            $('button[type=submit]').click(function(){
                var data_items = [];
                var json = '';
                for (var value of myMap.values()) {
                    data_items.push(JSON.stringify(value));
                }
                json = JSON.stringify(data_items);
                $('#data_items').val(json);
            });

        });
    </script>
@stop
