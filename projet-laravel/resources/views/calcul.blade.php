<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

    @if ($nombre <= 10  )
        @php
            $prix = 0.5 ;
        @endphp
    @elseif ($nombre > 10 && $nombre <= 20)
        @php
            $prix = 0.4 ;
        @endphp
    @else
        @php
            $prix = 0.3 ;
        @endphp
    @endif

    <h2>le prix du copie est :<span> {{ $prix }}</span></h2>
</body>
</html>