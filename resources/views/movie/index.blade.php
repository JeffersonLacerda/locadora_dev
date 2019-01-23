@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/DataTables/datatables.min.css')}} ">
    <link rel="stylesheet" href="{{ asset('vendor/icheck-1.0.2/skins/all.css')}} ">
@stop

@section('content_header')
    <h1>Filmes</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
        <li><a href="{{ route('type.index') }}">Filmes</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{ route('movie.create') }}" class="btn btn-primary"><i class="fa fa-fw fa-film"></i> Adicionar Filme</a>
        </div>
        <div class="box-body" style="min-height: 70vh">
            @if (session('erro'))
                <div class="alert alert-error alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="fas fa-exclamation-circle"></i> Erro: </h4>
                    <p>{{ session('erro') }}</p>
                </div>
            @endif
            <table id="tb_filmes" class="table table-striped table-remove-modal">
                <thead>
                    <tr>
                        <th style="text-align: center;">Título</th>
                        <th style="text-align: center;">Título original</th>
                        <th style="text-align: center;">Gênero</th>
                        <th style="text-align: center;">Ano</th>
                        <th style="text-align: center;">Tipo</th>
                        <th style="text-align: center;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $m)
                    <tr>
                        <td>{{ $m->title }}</td>
                        <td>{{ $m->original_title }}</td>
                        <td>{{ $m->available_genres }}</td>
                        <td>{{ $m->year }}</td>
                        <td>{{ $m->available_type }}</td>
                        <td style="text-align: center;">
                            <form action="{{ route('movie.destroy', $m->id) }}" class="form-inline" method="POST" >
                                {{ csrf_field() }}
                                {{ method_field('DELETE')}}
                                <div class="btn-group">
                                    <abbr title="Detalhes"><a a chave="{{ route('movie_details', $m->id) }}" class="btn btn-default btn-sm btn-exibir" style="color: black"><i class="fas fa-list-alt"></i></a></abbr>
                                    <abbr title="Modificar filme"><a href="{{ route('movie.edit', $m->id) }}" class="btn btn-default btn-sm" style="color: darkgreen"><i class="fas fa-edit"></i></a></abbr>
                                    <abbr title="Remover filme"><button type="submit" class="btn btn-default btn-sm form-delete"><i class="fas fa-trash-alt" style="color: darkred"></i></button></abbr>
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
                    <h4 class="modal-title">Remover o Filme?</h4>
                </div>
                <div class="modal-body">
                <p>Tem certeza que deseja remover este filme?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="delete-btn">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal exibir filme-->
    <div class="modal fade" id="dialog_exibir">
        <div class="modal-dialog" role="document" style="width:80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                
                </div>
                <div class="modal-footer">
                    <a class="btn btn-danger" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> Fechar</a>
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
                    "emptyTable":     "Nenhum filme cadastrado.",
                    "info":           "Exibindo _START_ até _END_ de _TOTAL_ filmes.",
                    "infoEmpty":      "Nenhum filme para exibir.",
                    "infoFiltered":   "(filtrado de _MAX_ total de filmes.)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Exibindo _MENU_ filmes.",
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
                "columnDefs": [ 
                    { targets: [1], visible: false, searchable: true },
                    { targets: [5], orderable: false} 
                ]
            });

            $("#tb_filmes").on("click", ".btn-exibir", function() {
                var key = $(this).attr('chave');
                $("#dialog_exibir .modal-body").load(key, function(){
                    $("#dialog_exibir").modal({show:true});
                });
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
