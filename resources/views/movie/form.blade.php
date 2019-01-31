@extends('adminlte::page')

@section('css')
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
    @isset($movie)
        <h1>Modificar Filme</h1>
    @else
        <h1>Adicionar Filme</h1>
    @endisset
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
        <li><a href="{{ route('movie.index') }}">Filme</a></li>
        @isset($movie)
            <li><a href="{{ route('movie.index', $movie->id) }}">Modificar</a></li>
        @else
            <li><a href="{{ route('movie.index') }}">Adicionar</a></li>
        @endisset
    </ol>
@stop
@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-primary"><i class="fa fa-fw fa-arrow-left"></i> Voltar</a>
            @isset($movie)
            @else
            <div class="pull-right">
                <form id="formTmdb" class="form-inline" style="background-color: #081E25;  border-radius: 1em;">
                    <img src="{{ asset('img/tmdb.PNG')}}" style="height: 4em; margin-left: 1em;">
                    <div class="form-group">
                        {{-- <label for="exampleInputName2">Name</label> --}}
                        <input type="text" class="form-control" id="txtTmdb" name="txtTmdb" placeholder="Nome do filme">
                    </div>
                    <button id="searchTmdb" type="button" class="btn" style="background-color: #02B067; margin-right: 1em;"><i class="fa fa-fw fa-search"></i></button>
                </form>
                {{-- <a class="btn btn-primary" style="background-color: #081E25; border-color: #081E25; color: #02B067;"><i class="fa fa-fw fa-search"></i> <img src="{{ asset('img/tmdb.PNG')}}" style="height: 2em;"></a> --}}
            </div>
            @endisset
        </div>
        <div class="box-body">
            @if (session('erro'))
                <div class="alert alert-error alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="fas fa-exclamation-circle"></i> Erro: </h4>
                    <p>{{ session('erro') }}</p>
                </div>
            @endif
            {{-- Formulário para adicionar ou modificar filmes --}}
            @isset($movie)
            <form method="post" action="{{ route('movie.edit', $movie->id) }}" enctype="multipart/form-data">
                {{ method_field('PUT')}}
            @else
            <form method="post" action="{{ route('movie.create') }}" enctype="multipart/form-data">
            @endisset
            @php
                if (isset($movie_tmdb) && isset($credits_tmdb)){
                    $array['tmdb_id'] = $movie_tmdb->id;
                    $array['poster'] = 'http://image.tmdb.org/t/p/original' . $movie_tmdb->poster_path;
                    $array['title'] = $movie_tmdb->title;
                    $array['original_title'] = $movie_tmdb->original_title;
                    $array['genres'] = null;
                    $array['country'] = App\Services\Util::array_to_string($movie_tmdb->production_countries, 'iso_3166_1');
                    $array['year'] = substr($movie_tmdb->release_date, 0, 4) == "" ? "1970" : substr($movie_tmdb->release_date, 0, 4);
                    $array['duraction'] = $movie_tmdb->runtime;
                    $array['synopsis'] = addslashes($movie_tmdb->overview);
                    $array['cast'] = App\Services\Util::array_to_string($credits_tmdb->cast, 'name');
                    $array['direction'] = App\Services\Util::array_to_string($credits_tmdb->crew, 'name', ['job','Director']);
                    $now = Carbon\Carbon::now();
                    $release_date = Carbon\Carbon::createFromFormat('Y-m-d', $movie_tmdb->release_date);
                    if ($now->diffInDays($release_date) > 180){
                        $type_id = 1; // Catálogo
                    } else {
                        $type_id = 2; // Lançamento
                    }
                    $array['type_id'] = $type_id;

                    $movie = json_decode(json_encode($array));

                    $array_genres = array();
                    foreach ($movie_tmdb->genres as $genre) {
                        $g = \App\Models\Genre::where('tmdb_id', $genre->id)->first();
                        array_push($array_genres, $g);
                    }
                    $movie->genres = collect($array_genres);

                    /* dd($movie); */
                }
            @endphp

                {{ csrf_field() }}
                <input type="hidden" class="form-control" id="tmdb_id" name="tmdb_id" value="{{ isset($movie) ? old('tmdb_id', $movie->tmdb_id) : old('tmdb_id') }}">
                
                <div class="form-group {{ $errors->has('poster') ? 'has-error' : '' }}">
                    <label for="holder">Capa</label>
                    <br>
                    <div class="container">
                        <div class="row">
                            <div id="imgBackground" class="col-md-3 col-sm-6 col-xs-12" style="border: 0px solid black;">
                                <div id="image-holder"></div>
                                <img id="imgPreview" style="max-width: 100%" src="{{ isset($movie) ? old('poster', $movie->poster) : old('poster') }}">
                            </div>
                        </div>
                    </div>
                    <br>
                    <input id="filePoster" type="file" name="file" accept="image/*" style="display: none;">
                    <div class="input-group">
                        <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="far fa-image"></i> Escolher imagem
                        </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="thumbnail" value="{{ isset($movie) ? old('poster', $movie->poster) : old('poster') }}" disabled>
                    </div>
                    <input id="poster" type="hidden" name="poster" value="{{ isset($movie) ? old('poster', $movie->poster) : old('poster') }}">
                    @if ($errors->has('poster'))
                        <span class="help-block">
                            <strong>{{ $errors->first('poster') }}</strong>
                        </span>
                    @endif
                </div>
                <br>
                {{-- Imagem com laravel file manager --}}
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Informe o título" value="{{ isset($movie) ? old('title', $movie->title) : old('title') }}">
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                 </div>
                <div class="form-group {{ $errors->has('original_title') ? 'has-error' : '' }}">
                    <label for="original_title">Título original</label>
                    <input type="text" class="form-control" id="original_title" name="original_title" placeholder="Informe título original" value="{{ isset($movie) ? old('original_title', $movie->original_title) : old('original_title') }}">
                    @if ($errors->has('original_title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('original_title') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('genres') ? 'has-error' : '' }}">
                    <label for="genres">Gênero</label>
                    <select class="form-control select2" name="genres[]" id="selectGenres" multiple="multiple" style="width: 100%;">
                    @foreach($genres as $g)
                        <option value="{{ $g->id }}" 
                        @if( (isset($movie) && $movie->genres->contains($g)) || (old('genres') != null && in_array($g->id, old('genres')))  ) 
                            selected  
                        @endif>
                            {{ $g->description }} 
                        </option>
                    @endforeach
                    </select>
                    @if ($errors->has('genres'))
                        <span class="help-block">
                            <strong>{{ $errors->first('genres') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
                    <label for="country">País</label>
                    <select class="form-control select2" name="country[]" id="selectCountries" multiple="multiple" style="width: 100%;">
                    @foreach($countries as $c)
                        <option value="{{ $c->sigla2 }}" 
                        @if( (isset($movie) && in_array($c->sigla2 ,explode(", ", $movie->country))) || (old('country') != null && in_array($c->sigla2, old('country'))) ) 
                            selected  
                        @endif>
                            {{ $c->sigla2 }} - {{ $c->nome }} 
                        </option>
                    @endforeach
                    </select>
                    @if ($errors->has('country'))
                        <span class="help-block">
                            <strong>{{ $errors->first('country') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('year') ? 'has-error' : '' }}">
                    <label for="year">Ano</label>
                    <input type="text" class="form-control" id="year" name="year" placeholder="Informe o ano" value="{{ isset($movie) ? old('year', $movie->year) : old('year') }}">
                    @if ($errors->has('year'))
                        <span class="help-block">
                            <strong>{{ $errors->first('year') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('direction') ? 'has-error' : '' }}">
                    <label for="direction">Direção</label>
                    <textarea class="form-control" rows="5" id="direction" name="direction" placeholder="Informe a direção">{{ isset($movie) ? old('direction', $movie->direction) : old('direction') }}</textarea>
                    @if ($errors->has('direction'))
                        <span class="help-block">
                            <strong>{{ $errors->first('direction') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('cast') ? 'has-error' : '' }}">
                    <label for="cast">Elenco</label>
                    <textarea class="form-control" rows="5" id="cast" name="cast" placeholder="Informe o elenco">{{ isset($movie) ? old('cast', $movie->cast) : old('cast') }}</textarea>
                    @if ($errors->has('cast'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cast') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('synopsis') ? 'has-error' : '' }}">
                    <label for="synopsis">Sinopse</label>
                    <textarea class="form-control" rows="5" id="synopsis" name="synopsis" placeholder="Informe a sinopse">{{ isset($movie) ? old('synopsis', $movie->synopsis) : old('synopsis') }}</textarea>
                    @if ($errors->has('synopsis'))
                        <span class="help-block">
                            <strong>{{ $errors->first('synopsis') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('duraction') ? 'has-error' : '' }}">
                    <label for="duraction">Duração</label>
                    <input type="text" class="form-control" id="duraction" name="duraction" placeholder="Informe a duração" value="{{ isset($movie) ? old('duraction', $movie->duraction) : old('duraction') }}">
                    @if ($errors->has('duraction'))
                        <span class="help-block">
                            <strong>{{ $errors->first('duraction') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('type_id') ? 'has-error' : '' }}">
                    <label for="type_id">Tipo</label>
                    <select class="form-control select2" name="type_id" id="selectType" style="width: 100%;">
                        <option disabled selected value> -- selecione o tipo -- </option>
                    @foreach($types as $t)
                        <option value="{{ $t->id }}" 
                        @if( (isset($movie) && $movie->type_id == $t->id) ||  ($t->id == old('type_id')) ) 
                            selected  
                        @endif>
                            {{ $t->description }} 
                        </option>
                    @endforeach
                    </select>
                    @if ($errors->has('type_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('type_id') }}</strong>
                        </span>
                    @endif
                </div>
                {{-- <div class="form-group {{ $errors->has('distributor_id') ? 'has-error' : '' }}">
                    <label for="distributor_id">Distribuidora</label>
                    <select class="form-control select2" name="distributor_id" id="selectDistributor" style="width: 100%;">
                        <option disabled selected value> -- selecione uma distribuidora -- </option>
                    @foreach($distributors as $d)
                        <option value="{{ $d->id }}">
                            {{ $d->corporate_name }} 
                        </option>
                    @endforeach
                    </select>
                    @if ($errors->has('distributor_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('distributor_id') }}</strong>
                        </span>
                    @endif
                </div> --}}
                <div class="col-md-2 col-md-offset-10">
                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-fw fa-save"></i> Salvar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal listar filmes do TMDb -->
    <div class="modal fade" id="dialog_list_tmdb">
        <div class="modal-dialog" role="document" style="width:80vw;">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #081E25">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="color: #02B067;"><img src="{{ asset('img/tmdb.PNG')}}" style="height: 4em; margin-left: 1em;">  The Movie Database</h4>
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
    <script src="{{ asset('vendor/select2-4.0.5/dist/js/select2.min.js')}}"></script>
    <script>
        $(document).ready( function () {
            $('#selectCountries').select2({
                placeholder: "Selecione a nacionalidade"
            });
            $('#selectType').select2({
                placeholder: "Selecione o tipo"
            });
            $('#selectGenres').select2({
                placeholder: "Selecione os gêneros"
            });
            $('#lfm').click( function (){
                $('#filePoster').click();
            });
            $('form').on('change', '#filePoster', function(){
                $('#thumbnail').val($('#filePoster').val().replace(/C:\\fakepath\\/i, ""));
                $('#poster').val($('#filePoster').val().replace(/C:\\fakepath\\/i, ""));
            });
            //Atualizar imagem PREVIEW
            $("#filePoster").on('change', function () {
                if (typeof (FileReader) != "undefined") {
                    var image_holder = $("#image-holder");
                    image_holder.empty();
                    $('#imgPreview').hide();
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("<img />", {
                            "src": e.target.result,
                            "class": "thumb-image",
                            "style": "max-width: 100%; max-height: 100%;"
                        }).appendTo(image_holder);
                    }
                    image_holder.show();
                    reader.readAsDataURL($(this)[0].files[0]);
                } else{
                    alert("Este navegador nao suporta FileReader.");
                }
            });
            $('#image-holder').width($('#imgBackground').width());
            $("#formTmdb").on("click", "#searchTmdb", function() {
                var href = "{{ route('movie.tmdb_list', '') }}";
                var search = encodeURI($("#txtTmdb").val());
                var key = href + "/" + search;
                $("#dialog_list_tmdb .modal-body").load(key, function(){
                    $("#dialog_list_tmdb").modal({show:true});
                });
            });
        });
    </script>
@stop