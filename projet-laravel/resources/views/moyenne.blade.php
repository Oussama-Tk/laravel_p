<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <h2 style="text-align: center">Bulletin</h2>
    <h3>Nom Etudiant : </h3><span>{{ $nom }}</span>
    <h3>Moyenne : </h3><span>{{ $note }}</span>
    @if ($note >= 10)
        @php
            $decision = 'Admis'
        @endphp
    @elseif ($note < 10 && $note >= 7)
        @php
            $decision = 'rattrapage'
        @endphp
    @else
        @php
            $decision = 'non Admis'
        @endphp
    @endif
    <h3>Decision : </h3><span>{{ $decision }}</span>
</body>
</html>