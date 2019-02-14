@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/DataTables/datatables.min.css')}} ">
    <link rel="stylesheet" href="{{ asset('vendor/icheck-1.0.2/skins/all.css')}} ">
@stop

@section('content_header')
    <h1>Locações</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
        <li><a href="{{ route('rental.index') }}">Locações</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{ route('rental.client') }}" class="btn btn-primary"><i class="fas fa-sign-out-alt"></i> Realizar locação</a>
        </div>
        <div class="box-body" style="min-height: 70vh">
            @if (session('erro'))
                <div class="alert alert-error alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="fas fa-exclamation-circle"></i> Erro: </h4>
                    <p>{{ session('erro') }}</p>
                </div>
            @endif
            <table class="table table-striped table-remove-modal">
                <thead>
                    <tr>
                        <th style="text-align: center;">Cliente</th>
                        <th style="text-align: center;">Titular</th>
                        <th style="text-align: center;">Qtde Itens</th>
                        <th style="text-align: center;">Valor</th>
                        <th style="text-align: center;">Valor Pago</th>
                        <th style="text-align: center;">Data de devolução</th>
                        <th style="text-align: center;">Situação</th>
                        <th style="text-align: center; min-width: 10em;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rentals as $r)
                    <tr>
                        <td>{{ $r->client->name }}</td>
                        <td>{{ $r->client->holder->name }}</td>
                        <td>{{ $r->items->count() }}</td>
                        <td>R$ {{ number_format(($r->items->sum('item_price') - $r->items->sum('discount') + $r->items->sum('surcharge')), 2, ",", "") }}</td>
                        <td>R$ {{ number_format(0, 2, ",", "") }}</td>
                        <td>{{  Carbon\Carbon::createFromFormat('Y-m-d', $r->items->max('expected_return_date'))->format('d/m/Y') }}</td>
                        <td>
                            @switch($r->status)
                                @case('Concluída')
                                    <span class="label bg-green">
                                    @break
                                @case('Pendente')
                                    <span class="label bg-yellow">
                                    @break
                                @case('Em atraso')
                                    <span class="label bg-orange-active">
                                    @break
                                @case('Cancelada')
                                    <span class="label bg-red">
                                    @break
                            @endswitch
                                {{ $r->status }}
                            </span>
                        </td>
                        <td style="text-align: center;">
                            <form action="{{ route('rental.cancel', $r->id) }}" class="form-inline" method="POST" >
                                {{ csrf_field() }}
                                {{ method_field('PUT')}}
                                <div class="btn-group">
                                    <abbr title="Registrar Pagamentos"><a class="btn btn-default btn-sm" style="color: darkgreen"><i class="fas fa-dollar-sign"></i></a></abbr>
                                    <abbr title="Registrar Devoluções"><a class="btn btn-default btn-sm" style="color: darkblue"><i class="fas fa-sign-in-alt"></i></a></abbr>
                                    <abbr title="Modificar locação"><a href="{{ route('rental.edit', $r->id) }}" class="btn btn-default btn-sm" style="color: black"><i class="fas fa-edit"></i></a></abbr>
                                    <abbr title="Cancelar locação"><button type="submit" class="btn btn-default btn-sm form-delete" style="color: darkred"><i class="fas fa-ban"></i></button></abbr>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="dialog_del">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Cancelar a locação?</h4>
                </div>
                <div class="modal-body">
                <p>Tem certeza que deseja Cancelar a locação?</p>
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
    <script src="{{ asset('vendor/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('vendor/icheck-1.0.2/icheck.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('.table').DataTable({
                language: {
                    "decimal":        "",
                    "emptyTable":     "Nenhuma locação cadastrada.",
                    "info":           "Exibindo _START_ até _END_ de _TOTAL_ locações.",
                    "infoEmpty":      "Nenhum mídia para exibir.",
                    "infoFiltered":   "(filtrado de _MAX_ total de locações.)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Exibindo _MENU_ locações.",
                    "loadingRecords": "Carregando...",
                    "processing":     "Processando...",
                    "search":         "Buscar:",
                    "zeroRecords":    "A busca não encontrou resultados",
                    "paginate": {
                        "first":      "Primeiro",
                        "last":       "Último",
                        "next":       "Próximo",
                        "previous":   "Anterior"
                    },
                },
                pageLength: 10,
                "bLengthChange" : true,
                "order": [[ 0, "asc" ]],

            });
        });
        $('.table-remove-modal').on('click', '.form-delete', function(e){
            e.preventDefault();
            var $form = $(this).parents("form");
            $('#dialog_del').modal()
                .on('click', '#delete-btn', function(){
                    $form.submit();
                });
        });
    </script>
@stop
