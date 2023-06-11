<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Licznik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Witaj, {{ $user->login }}</h1>
    <p>KM: {{ $user->km }}</p>

    <h2>Mecze Ruchu:</h2>
    <table>
        <thead>
        <tr>
            <th>Data</th>
            <th>Wynik</th>
            <th>KM</th>
            <th>Link</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user->meczRuches as $meczRuch)
            <tr>
                <td>{{ $meczRuch->data_mr }}</td>
                <td>{{ $meczRuch->wynik_mr }}</td>
                <td>{{ $meczRuch->km_mr }}</td>
                <td><a href="{{ $meczRuch->link_mr }}" target="_blank">{{ $meczRuch->link_mr }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2>Mecz Widzews:</h2>
    <table>
        <thead>
        <tr>
            <th>Link</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user->meczWidzews as $meczWidzew)
            <tr>
                <td>{{ $meczWidzew->sha1Link }}</td>
                <td>{{ $meczWidzew->data_pr }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2>Matches:</h2>
    <table>
        <thead>
        <tr>
            <th>Match Date</th>
            <th>Team 1</th>
            <th>Team 2</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user->matches as $match)
            <tr>
                <td>{{ $match->match_date }}</td>
                <td>{{ $match->team1->name }}</td> <!-- Accessing the team1 name -->
                <td>{{ $match->team2->name }}</td> <!-- Accessing the team2 name -->
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
</body>
</html>
