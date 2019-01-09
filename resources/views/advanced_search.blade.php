<div class="row">
    <div class="col-md-12">
        <h2>Busca avançada:</h2>
        <p>Você pode realizar consultas por título, título original, gênero, tipo de mídia disponível, elenco, direção, nacionalidade e lançamentos, bem como combinações dessas informações.</p>
        <form action="{{ route('advanced_search') }}" method="POST" id="formSearch">
            {{ csrf_field() }}
            {{-- Título --}}
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                {{-- <label for="title">Título:</label> --}}
                <input type="text" class="form-control" id="title" name="title" placeholder="Título" value="{{ isset($search) ? old('title', $search->title) : old('title') }}">
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
            {{-- Título original --}}
            <div class="form-group {{ $errors->has('original_title') ? 'has-error' : '' }}">
                {{-- <label for="original_title">Título:</label> --}}
                <input type="text" class="form-control" id="original_title" name="original_title" placeholder="Título original" value="{{ isset($search) ? old('original_title', $search->original_title) : old('original_title') }}">
                @if ($errors->has('original_title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('original_title') }}</strong>
                    </span>
                @endif
            </div>
            {{-- Gênero --}}
            <div class="form-group {{ $errors->has('genres') ? 'has-error' : '' }}">
                {{-- <label for="genres">Gênero:</label> --}}
                <select class="form-control" name="genres[]" id="selectGenres" multiple="multiple" style="width: 100%;">
                @foreach($genres as $g)
                    <option value="{{ $g->description }}">
                        {{ $g->description}} 
                    </option>
                @endforeach
                </select>
                @if ($errors->has('genres'))
                    <span class="help-block">
                        <strong>{{ $errors->first('genres') }}</strong>
                    </span>
                @endif
            </div>
            {{-- Mídia --}}
            <div class="form-group {{ $errors->has('medias') ? 'has-error' : '' }}">
                {{-- <label for="medias">Tipo de Mídia:</label> --}}
                <select class="form-control" name="medias[]" id="selectMedias" multiple="multiple" style="width: 100%;">
                @foreach($medias as $m)
                    <option value="{{ $m->id }}">
                        {{ $m->description}} 
                    </option>
                @endforeach
                </select>
                @if ($errors->has('medias'))
                    <span class="help-block">
                        <strong>{{ $errors->first('medias') }}</strong>
                    </span>
                @endif
            </div>
            {{-- Elenco --}}
            <div class="form-group {{ $errors->has('cast') ? 'has-error' : '' }}">
                {{-- <label for="cast">Elenco:</label> --}}
                <input type="text" class="form-control" id="cast" name="cast" placeholder="Elenco" value="{{ isset($search) ? old('cast', $search->cast) : old('cast') }}">
                @if ($errors->has('cast'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cast') }}</strong>
                    </span>
                @endif
            </div>
            {{-- Direção --}}
            <div class="form-group {{ $errors->has('direction') ? 'has-error' : '' }}">
                {{-- <label for="direction">Direção:</label> --}}
                <input type="text" class="form-control" id="direction" name="direction" placeholder="Direção" value="{{ isset($search) ? old('direction', $search->direction) : old('direction') }}">
                @if ($errors->has('direction'))
                    <span class="help-block">
                        <strong>{{ $errors->first('direction') }}</strong>
                    </span>
                @endif
            </div>
            {{-- Nacionalidade --}}
            <div class="form-group {{ $errors->has('countries') ? 'has-error' : '' }}">
                {{-- <label for="medias">Tipo de Mídia:</label> --}}
                <select class="form-control" name="countries[]" id="selectCountries" multiple="multiple" style="width: 100%;">
                @foreach($countries as $c)
                    <option value="{{ $c }}">
                        {{ $c }} 
                    </option>
                @endforeach
                </select>
                @if ($errors->has('countries'))
                    <span class="help-block">
                        <strong>{{ $errors->first('countries') }}</strong>
                    </span>
                @endif
            </div>
            {{-- Tipo --}}
            <div class="form-group {{ $errors->has('types') ? 'has-error' : '' }}">
                {{-- <label for="types">Tipo (Catálogo ou Lançamento):</label> --}}
                <select class="form-control" name="types[]" id="selectTypes" multiple="multiple" style="width: 100%;">
                @foreach($types as $t)
                    <option value="{{ $t->id }}">
                        {{ $t->description}} 
                    </option>
                @endforeach
                </select>
                @if ($errors->has('types'))
                    <span class="help-block">
                        <strong>{{ $errors->first('types') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-3 col-md-offset-2">
                <a class="form-control btn btn-primary" id="btnClear"><i class="fas fa-eraser"></i> &nbsp; &nbsp;Limpar</a>
            </div>
            <div class="col-md-3 col-md-offset-2">
                    <a class="form-control btn btn-success" id="btnAdvancedSearch"><i class="fas fa-search"></i> &nbsp; &nbsp;Buscar</a>
                </div>
        </form>
    </div>
</div>

<script> 
    $('#selectGenres').select2({
        placeholder: "Selecione o gênero"
    });
    $('#selectMedias').select2({
        placeholder: "Selecione o tipo de Mídia"
    });
    $('#selectCountries').select2({
        placeholder: "Selecione a nacionalidade"
    });
    $('#selectTypes').select2({
        placeholder: "Selecione o tipo (Catálogo ou Lançamento)"
    });
    $('#btnClear').click(function (){
        $('#formSearch')[0].reset();
        $('input[name="title"]').focus();
    });
    $('#btnAdvancedSearch').click(function (){
        $('#formSearch').submit();
    });
</script>