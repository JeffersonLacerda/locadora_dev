@extends('adminlte::page')

@section('css')
    <style>
        .cx4 {
            min-height: 13em;
        }
    </style>
@stop

@section('content_header')
    <h1>Pagamento</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
        <li><a href="{{ route('rental.index') }}">Locação</a></li>
        <li><a href="{{ route('rental.payment', $rental->id) }}">Pagamento</a></li>
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
                    <div class="col-md-3">
                        <div class="box box-default cx4">
                            <div class="box-body">
                                <h5 class="box-title"><i class="fas fa-user"></i> Cliente</h5>
                                <p>Nome: <b>{{ $rental->client->name }}</b></p>
                                <h5><i class="fas fa-user-plus"></i> Titular</h5>
                                <p>CPF: <b>{{ $rental->client->holder->cpf }}</b></p>
                                <p>Nome: <b>{{ $rental->client->holder->name }}</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box box-default info-row-up cx4">
                            <div class="box-body">
                                <h5 class="box-title"><i class="fas fa-hand-holding-usd"></i> Resumo:</h5>
                                <p>Qtd. Itens: <b>{{ $rental->items->count() }}</b></p>
                                <p>Valor Desconto: <b>R$ {{ number_format(($rental->items->sum('discount')), 2, ",", "") }}</b></p>
                                <p>Valor Multa: <b>R$ {{ number_format(($rental->items->sum('surcharge')), 2, ",", "") }}</b></p>
                                <p>Valor total: <b>R$ {{ number_format(($rental->items->sum('item_price') - $rental->items->sum('discount') + $rental->items->sum('surcharge')), 2, ",", "") }}</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box box-default cx4">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fas fa-credit-card"></i> Método de pagamento</h3>
                                <br><br>
                                <form action="{{ route('rental.payment', $rental->id) }}" method="post">
                                    @csrf
                                    <div class="form-group row {{ $errors->has('credit_card') ? 'has-error' : '' }}">
                                        <label for="credit_card" class="col-sm-4 col-form-label">Cartão de crédito</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="input-group-addon">R$</div>
                                                <input type="number" step=".01" class="form-control" id="credit_card" name="credit_card" value="{{ old('credit_card') }}">
                                            </div>
                                        </div>
                                        @if ($errors->has('credit_card'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('credit_card') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group row {{ $errors->has('debit_card') ? 'has-error' : '' }}">
                                        <label for="debit_card" class="col-sm-4 col-form-label">Cartão de débito</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="input-group-addon">R$</div>
                                                <input type="number" step=".01" class="form-control" id="debit_card" name="debit_card" value="{{ old('debit_card') }}">
                                            </div>
                                        </div>
                                        @if ($errors->has('debit_card'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('debit_card') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group row {{ $errors->has('cash') ? 'has-error' : '' }}">
                                        <label for="cash" class="col-sm-4 col-form-label">Dinheiro</label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group">
                                                <div class="input-group-addon">R$</div>
                                                <input type="number" step=".01" class="form-control" id="cash" name="cash" value="{{ old('cash') }}">
                                            </div>
                                        </div>
                                        @if ($errors->has('cash'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('cash') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <br>
                                    <button type="submit"class="btn btn-success btn-block"><i class="fa fa-fw fa-save"></i> Registrar Pagamento</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="tb_items" class="table table-striped">
                                <caption>Itens registrados:</caption>
                                <thead>
                                    <tr>
                                        <th>ENTREGUE</th>
                                        <th>TÍTULO</th>
                                        <th>TIPO</th>
                                        <th>MÍDIA</th>
                                        <th>VALOR</th>
                                        <th>DESCONTO</th>
                                        <th>MULTA</th>
                                        <th>VALOR FINAL</th>
                                        <th>DATA DE DEVOLUÇÃO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rental->items as $item)
                                    <tr>
                                        <td>
                                            @if (is_null($item->return_user))
                                            <span class="label bg-yellow">Pendente</span>
                                            @else
                                            <span class="label bg-green">Entregue</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->item->movie->title }}</td>
                                        <td>{{ $item->item->movie->type->description }}</td>
                                        <td>{{ $item->item->media->description }}</td>
                                        <td>R$ {{ number_format(( $item->item_price ), 2, ",", "") }}</td>
                                        <td>R$ {{ number_format(( $item->discount ), 2, ",", "") }}</td>
                                        <td>R$ {{ number_format(( $item->surcharge ), 2, ",", "") }}</td>
                                        <td>R$ {{ number_format(($item->item_price - $item->discount + $item->surcharge), 2, ",", "") }}</td>
                                        <td>{{  Carbon\Carbon::createFromFormat('Y-m-d', $item->expected_return_date)->format('d/m/Y') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{--  <button class="btn btn-success btn-block"><i class="fa fa-fw fa-save"></i> Registrar Reserva</button>  --}}
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
    </script>
@stop
