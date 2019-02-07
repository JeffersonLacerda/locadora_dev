<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carteira de identificação</title>
    <style>
        body{
            font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
        }
        #identity_card{
            display: block;
            margin-bottom: 10px;
            width: 19.2cm;
            height: 6cm;
            border: 1px solid black;
            overflow: hidden;
            text-align: left;
            background-image: url("{{ asset('img/carteira_modelo.png') }}");
            background-repeat: no-repeat;
            background-size: 100%;
        }
        #ic_lados{
            display: inline-block;
            margin: 0;
            padding: 0;
            width: 49%;
            height: 100%;
            text-align: center;
            vertical-align: top;

        }
        h2,h4{
            margin: 10px 0 0 0;

        }
    </style>
</head>
<body>
    @foreach ($clients as $client)
    <div id="identity_card">
        <div id="ic_lados">
            <h2>{{ env('APP_NAME') }}</h2>
            <h4>Carteira de Identificação</h4><br>
            <p>Nome: <b>{{ $client->name }}</b></p>
            <h5>
                @if($client->type == 'Titular')
                    Titular da conta
                @else
                    Dependente
                @endif
            </h5>
            <h6>Cliente desde: {{ Carbon\Carbon::parse($client->created_at)->format('d/m/Y') }}</h6>
        </div>
        <div id="ic_lados" style="margin-top: 5%;">
                {!! QrCode::size(150)->generate(sprintf('%010d', $client->id)); !!}
                <br>{{ sprintf('%010d', $client->id) }}
        </div>
    </div>
    @endforeach
</body>
</html>
