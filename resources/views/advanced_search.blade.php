<div class="row">
    <div class="col-md-12">
        <h2>Busca avançada:</h2>
        <p>Você pode realizar consultas por título, título original, gênero, tipo de mídia disponível, elenco, direção, nacionalidade e lançamentos, bem como combinações dessas informações.</p>
        @if(isset($items))
            <form action="{{ route('search') }}" method="POST" id="formSearch">
        @else
            <form action="{{ route('index') }}" method="POST" id="formSearch">
        @endif
            {{ csrf_field() }}
            {{-- Título --}}
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                {{-- <label for="title">Título:</label> --}}
                <input type="text" class="form-control" id="title" name="title" placeholder="Título" value="{{ array_key_exists('Titulo', $search) ? old('title', $search['Titulo']) : old('title') }}">
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
            {{-- Título original --}}
            <div class="form-group {{ $errors->has('original_title') ? 'has-error' : '' }}">
                {{-- <label for="original_title">Título:</label> --}}
                <input type="text" class="form-control" id="original_title" name="original_title" placeholder="Título original" value="{{ array_key_exists('Titulo original', $search) ? old('original_title', $search['Titulo original']) : old('original_title') }}">
                @if ($errors->has('original_title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('original_title') }}</strong>
                    </span>
                @endif
            </div>
            {{-- Gênero --}}
            <div class="form-group {{ $errors->has('genres') ? 'has-error' : '' }}">
                {{-- <label for="genres">Gênero:</label> --}}
                <select class="form-control select2" name="genres[]" id="selectGenres" multiple="multiple" style="width: 100%;">
                @foreach($genres as $g)
                    <option value="{{ $g->description }}" 
                        @if(array_key_exists('Gênero', $search))
                            @if(in_array($g->description, explode('|', $search['Gênero'])))
                                selected
                            @endif
                        @endif
                        >
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
                <select class="form-control select2" name="medias[]" id="selectMedias" multiple="multiple" style="width: 100%;">
                @foreach($medias as $m)
                    <option value="{{ $m->description }}"
                        @if(array_key_exists('Mídia', $search))
                            @if(in_array($m->description, explode('|', $search['Mídia'])))
                                selected
                            @endif
                        @endif
                        >
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
                <input type="text" class="form-control" id="cast" name="cast" placeholder="Elenco" value="{{ array_key_exists('Elenco', $search) ? old('cast', $search['Elenco']) : old('cast') }}">
                @if ($errors->has('cast'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cast') }}</strong>
                    </span>
                @endif
            </div>
            {{-- Direção --}}
            <div class="form-group {{ $errors->has('direction') ? 'has-error' : '' }}">
                {{-- <label for="direction">Direção:</label> --}}
                <input type="text" class="form-control" id="direction" name="direction" placeholder="Direção" value="{{ array_key_exists('Direção', $search) ? old('direction', $search['Direção']) : old('direction') }}">
                @if ($errors->has('direction'))
                    <span class="help-block">
                        <strong>{{ $errors->first('direction') }}</strong>
                    </span>
                @endif
            </div>
            {{-- Nacionalidade --}}
            <div class="form-group {{ $errors->has('countries') ? 'has-error' : '' }}">
                {{-- <label for="medias">Tipo de Mídia:</label> --}}
                <select class="form-control select2" name="countries[]" id="selectCountries" multiple="multiple" style="width: 100%;">
                @foreach($countries as $c)
                    <option value="{{ $c }}"
                    @if(array_key_exists('Nacionalidade', $search))
                        @if(in_array($c, explode('|', $search['Nacionalidade'])))
                            selected
                        @endif
                    @endif
                    >
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
                <select class="form-control select2" name="types[]" id="selectTypes" multiple="multiple" style="width: 100%;">
                @foreach($types as $t)
                    <option value="{{ $t->description }}"
                        @if(array_key_exists('Tipo', $search))
                            @if(in_array($t->description, explode('|', $search['Tipo'])))
                                selected
                            @endif
                        @endif
                        >
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