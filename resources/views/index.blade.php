@extends('template')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/DataTables/datatables.min.css')}} ">
    <link rel="stylesheet" href="{{ asset('vendor/icheck-1.0.2/skins/all.css')}} ">
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Consulta ao acervo</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            <form method="POST" action="{{ route('index') }}">
                    <p><input type="radio" name="search" value="1" checked>  Busca simplificada</p>
                    <p><input type="radio" name="search" value="2">  Busca avançada</p>
                    <div id="buscaSimples">
                        <div class="form-group {{ $errors->has('searchText') ? 'has-error' : '' }}">
                            <label for="searchText">Pesquisa:</label>
                            <input type="text" class="form-control" id="searchText" name="searchText" placeholder="" value="">
                            @if ($errors->has('searchText'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('searchText') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div id="buscaAvancada" style="display: none;">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title">Título:</label>
                            <input type="text" class="form-control" id="txtTitle" name="title" placeholder="Título" value="">
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('genre') ? 'has-error' : '' }}">
                                <label for="genre">Gênero:</label>
                                <input type="text" class="form-control" id="txtGenre" name="genre" placeholder="Gênero" value="">
                                @if ($errors->has('genre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('genre') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-fw fa-search"></i> Buscar</button>
                </form>
            </div>
            <div class="col-md-8">
                
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('vendor/icheck-1.0.2/icheck.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue'
            });
        });
        $("radio[name='searchText']").change( function (){
            if ($("radio[name='searchText']").val() == '1'){
                $("buscaSimples").hide();
                $("buscaAvancada").show();
            } else {
                $("buscaSimples").show();
                $("buscaAvancada").hide();
            }
        });
    </script>
@stop