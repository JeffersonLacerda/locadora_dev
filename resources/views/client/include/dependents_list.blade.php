@isset($client)
    <div class="box-header">
        <a href="{{ route('dependent.create',$client->holder->id ) }}" class="btn btn-primary"><i class="fas fa-male"></i> Adicionar Dependente</a>
    </div>

<table class="table table-striped table-remove-modal">
        <thead>
            <tr>
                <th style="text-align: center;">Nome</th>
                <th style="text-align: center;">E-mail</th>
                <th style="text-align: center;">Data Nascimento</th>
                <th style="text-align: center;">Gênero</th>
                <th style="text-align: center;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($client->holder->dependents->where('type','Dependente') as $c)
            <tr>
                <td>{{ $c->name }}</td>
                <td>{{ $c->email }}</td>
                <td>{{ date('d/m/Y', strtotime($c->birth_date)) }}</td>
                <td>{{ $c->gender }}</td>
                <td style="text-align: center;">
                    <form action="{{ route('client.destroy', $c->id) }}" class="form-inline" method="POST" >
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                        <div class="btn-group">
                            <abbr title="Modificar dependente"><a href="{{ route('dependent.edit', $c->id) }}" class="btn btn-default btn-sm" style="color: darkgreen"><i class="fas fa-edit"></i></a></abbr>
                            <abbr title="Remover dependente"><button type="submit" class="btn btn-default btn-sm form-delete"><i class="fas fa-trash-alt" style="color: darkred"></i></button></abbr>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Modal -->
    <div class="modal fade" id="dialog_del">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Remover o dependente?</h4>
                </div>
                <div class="modal-body">
                <p>Tem certeza que deseja remover o dependente?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="delete-btn">Confirmar</button>
                </div>
            </div>
        </div>
</div>
@section('js')
    <script src="{{ asset('vendor/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('vendor/icheck-1.0.2/icheck.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-toggle-2.2.0/bootstrap-toggle.min.js')}}"></script>
    <script>
        $(document).ready( function () {
            $('#active_field').change(function(){
                $('#active_form').submit();
            });
            $('.table').DataTable({
                language: {
                    "decimal":        "",
                    "emptyTable":     "Nenhum dependente cadastrado.",
                    "info":           "Exibindo _START_ até _END_ de _TOTAL_ dependentes.",
                    "infoEmpty":      "Nenhum dependente para exibir.",
                    "infoFiltered":   "(filtrado de _MAX_ total de dependentes.)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Exibindo _MENU_ dependentes.",
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
@endisset
@empty($client)
<h3>Primeiro efetue o cadastro do titular.</h3>
@endempty

