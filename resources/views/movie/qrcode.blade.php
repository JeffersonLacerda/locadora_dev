<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QRCodes Filmes</title>
    <style>
        #box_qr{
            display: inline-block;
            width: 200px;
            height: 250px;
            border: 1px solid black;
            text-align: center;
            vertical-align: top;
            margin: 5px;
        }
        h4,h5,h6{
            margin: 0;
        }
    </style>
</head>
<body>
    @foreach ($itens as $item)
    @php
        $cod = sprintf('%02d', $item->media_id) . sprintf('%08d', $item->movie_id);
    @endphp
        <div id="box_qr">
            {!! QrCode::size(150)->generate($cod); !!}
            <h4>{{ $item->movie->title }}</h4>
            <h5>{{ $item->media->description }} - {{ $item->movie->type->description }}</h5>
            <h6>{{ $cod }}</h6>
        </div>
    @endforeach
</body>
</html>
