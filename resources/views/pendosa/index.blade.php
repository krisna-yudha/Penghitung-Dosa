{{-- filepath: resources/views/pendosa/index.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Leaderboard Pendosa</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: url('https://imgx.sonora.id/crop/0x0:0x0/700x465/filters:format(webp):quality(50)/photo/2023/09/19/pengertian-nerakajpg-20230919124437.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #00ff41;
            text-align: center;
            margin-top: 40px;
            font-size: 2.5em;
            text-shadow: 0 0 10px #000, 0 0 20px #00ff41;
        }
        .nav {
            text-align: center;
            margin-top: 20px;
        }
        .nav a {
            display: inline-block;
            margin: 0 10px;
            padding: 12px 28px;
            background: rgba(0,0,0,0.7);
            color: #00ff41;
            border: 2px solid #00ff41;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1em;
            box-shadow: 0 0 10px #00ff41;
            transition: background 0.2s, color 0.2s;
            backdrop-filter: blur(2px);
        }
        .nav a:hover {
            background: #00ff41;
            color: #111;
        }
        table {
            margin: 40px auto;
            border-collapse: collapse;
            width: 70%;
            background: rgba(0,0,0,0.65);
            box-shadow: 0 0 20px #00ff41;
            border-radius: 15px;
            overflow: hidden;
            backdrop-filter: blur(2px);
        }
        th, td {
            padding: 14px 20px;
            border: 1px solid #00ff41;
            text-align: center;
            color: #fff;
            font-size: 1.1em;
        }
        th {
            background: rgba(0,255,65,0.85);
            color: #111;
            font-size: 1.2em;
        }
        tr:nth-child(even) {
            background: rgba(40,40,40,0.7);
        }
        tr:nth-child(odd) {
            background: rgba(20,20,20,0.7);
        }
    </style>
</head>
<body>
    <h1>Leaderboard Para Pendosa</h1>
    <div class="nav">
        <a href="{{ route('dashboard') }}">Kembali ke Dashboard</a>
        <a href="{{ route('pendosa.create') }}">Tambah Pendosa</a>
    </div>
    <table>
        <tr>
            <th>Peringkat</th>
            <th>Nama</th>
            <th>Dosa</th>
            <th>Jumlah Dosa</th>
        </tr>
        @foreach($pendosa as $i => $item)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->dosa }}</td>
            <td>{{ $item->jumlah_dosa }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>