@if (isset($movies) && $qtde > 0)
    <table id="tb_tmdb_filmes" class="table table-striped">
        <thead>
            <tr>
                <th style="text-align: center;">Título</th>
                <th style="text-align: center;">Título original</th>
                <th style="text-align: center;">Lançamento</th>
                <th style="text-align: center;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $m)
            <tr>
                <td>{{ $m->title }}</td>
                <td>{{ $m->original_title }}</td>
                <td>{{ $m->release_date }}</td>
                <td style="text-align: center;">
                    <div class="btn-group">
                    <abbr title="Importar"><a href="{{ route( 'movie.create_tmdb', $m->id) }}" class="btn btn-default btn-sm btn-importar" style="color: black"><i class="fas fa-file-import"></i></a></abbr>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else 
    <h3 style="color: #02B067;"> Nenhum filme foi localizado na base da TMDb com o título informado.</h3>
@endif