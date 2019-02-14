@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/DataTables/datatables.min.css')}} ">
    <link rel="stylesheet" href="{{ asset('vendor/icheck-1.0.2/skins/all.css')}} ">
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
    <h1>Locação (Selecione o cliente)</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
        <li><a href="{{ route('rental.index') }}">Locações</a></li>
        <li><a href="{{ route('rental.client') }}">Selecionar o Cliente</a></li>
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
                    <div class="col-md-6 col-md-offset-3" style="text-align: center;">
                        <form id="form_clientID" method="get" action="{{ route('rental.items', '') }}">
                            {{-- {{ csrf_field() }} --}}
                            <div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
                                <label for="client_id">Cliente</label>
                                <select class="form-control select2" id="client_id" style="width: 100%;">
                                    <option disabled selected value> -- selecione o cliente -- </option>
                                @foreach($clients as $c)
                                    <option value="{{ $c->id }}">
                                        {{ $c->name }} 
                                    </option>
                                @endforeach
                                </select>
                            </div>
                            {{-- <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-arrow-right"></i> Próximo</button>
                            </div> --}}
                        </form>
                    </div>
                </div>
                <div class="row" style="text-align: center;">
                    <h3>OU</h3>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4" style="text-align: center;">
                        <form id="form_clientQR" method="get" action="{{ route('rental.items', '') }}">
                            {{-- {{ csrf_field() }} --}}
                            <div class="form-group {{ $errors->has('client_qrcode') ? 'has-error' : '' }}">
                                <label for="client_qrcode">
                                    <i id="img_qrcode" class="fas fa-qrcode"></i> Leitor de qrcode:
                                </label>
                                <canvas style="width: 100%;"></canvas>
                                {{-- <input type="hidden" name="client_qrcode" id="client_qrcode" > --}}
                                @if ($errors->has('client_qrcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('client_qrcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
@stop

@section('js')
    <script src="{{ asset('vendor/select2-4.0.5/dist/js/select2.min.js')}}"></script>
    <script src="{{ asset('vendor/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('vendor/icheck-1.0.2/icheck.js') }}"></script>
    <script src="{{ asset('vendor/webcodecamjs/js/qrcodelib.js') }}"></script>
    <script src="{{ asset('vendor/webcodecamjs/js/webcodecamjs.js') }}"></script>
    {{-- <script src="{{ asset('vendor/webcodecamjs/js/webcodecamjquery.js') }}"></script> --}}
    <script>
        $(document).ready( function () {

            var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
            var arg = {
                resultFunction: function(result) {
                    /* $('#client_qrcode').val(result.code); */
                    var rota = "{{ route('rental.items', '') }}/" + result.code * 1;
                    $('#form_clientQR').attr('action', rota);
                    $('#form_clientQR').submit();
                    /* alert(result.code); */
                }
            };
            new WebCodeCamJS("canvas").init(arg).play();
    
            $('#client_id').select2({
                placeholder: "Selecione o cliente"
            });

            $('#client_id').change(function (){
                var rota = "{{ route('rental.items', '') }}/" + $('#client_id').val();
                $('#form_clientID').attr('action', rota);
                $('#form_clientID').submit();
            });
        });
    </script>
@stop
