
<div class="row">
    <div class="col-md-4">
        @if (isset($movie))
            <img src="{{ $movie->poster }}" alt="" style="width: 100%;">
        @endif
    </div>
    <div class="col-md-8">
        @if (isset($movie))
        <fieldset>
            <legend>Filme:</legend>
            <div class="form-group">
                <label style="font-weight: normal;">ID: </label>
                <strong style="font-size: 1.2em;">{{ str_pad($movie->id, 6, "0", STR_PAD_LEFT) }}</strong>
            </div>
            <div class="form-group">
                <label style="font-weight: normal;">Título: </label>
                <strong style="font-size: 1.2em;">{{ $movie->title }}</strong>
            </div>
            <div class="form-group">
                <label style="font-weight: normal;">Título original: </label>
                <strong style="font-size: 1.2em;">{{ $movie->original_title }}</strong>
            </div>
            <div class="form-group">
                <label style="font-weight: normal;">Sinopse: </label>
                <strong style="font-size: 1.2em;">{{ $movie->synopsis }}</strong>
            </div>
            <div class="form-group">
                <label style="font-weight: normal;">Duração: </label>
                <strong style="font-size: 1.2em;">{{ $movie->duraction }} min</strong>
            </div>
            <div class="form-group">
                <label style="font-weight: normal;">País: </label>
                <strong style="font-size: 1.2em;">{{ $movie->country }}</strong>
            </div>
            <div class="form-group">
                <label style="font-weight: normal;">Ano: </label>
                <strong style="font-size: 1.2em;">{{ $movie->year }}</strong>
            </div>
            <div class="form-group">
                <label style="font-weight: normal;">Direção: </label>
                <strong style="font-size: 1.2em;">{{ $movie->direction }}</strong>
            </div>
            <div class="form-group">
                <label style="font-weight: normal;">Elenco: </label>
                <strong style="font-size: 1.2em;">{{ $movie->cast }}</strong>
            </div>
            
        </fieldset>
        @endif
    </div>
</div>
