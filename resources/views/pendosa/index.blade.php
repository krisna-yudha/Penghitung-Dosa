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
        
        /* Heaven Button Special Styles */
        .heaven-btn {
            background: linear-gradient(135deg, rgba(135,206,250,0.8), rgba(255,215,0,0.8)) !important;
            color: #fff !important;
            border: 2px solid gold !important;
            box-shadow: 0 0 20px rgba(255,215,0,0.8), 0 0 40px rgba(135,206,250,0.6) !important;
            animation: heavenGlow 2s ease-in-out infinite;
            position: relative;
            overflow: visible;
            padding: 12px 28px !important;
        }
        
        .heaven-btn::before {
            content: '✨';
            position: absolute;
            top: -10px;
            left: -10px;
            font-size: 20px;
            animation: sparkle 3s linear infinite;
        }
        
        .heaven-btn::after {
            content: '✨';
            position: absolute;
            bottom: -10px;
            right: -10px;
            font-size: 20px;
            animation: sparkle 3s linear infinite 1.5s;
        }
        
        .heaven-btn:hover {
            background: linear-gradient(135deg, rgba(255,255,255,0.95), rgba(255,215,0,0.95)) !important;
            color: #000 !important;
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 0 30px rgba(255,215,0,1), 0 0 60px rgba(135,206,250,1), 0 10px 30px rgba(255,255,255,0.5) !important;
            animation: heavenGlow 0.5s ease-in-out infinite, float 2s ease-in-out infinite;
        }
        
        .heaven-btn:active {
            transform: translateY(-2px) scale(1.02);
            animation: heavenBurst 0.6s ease-out;
        }
        
        @keyframes heavenGlow {
            0%, 100% { 
                box-shadow: 0 0 20px rgba(255,215,0,0.8), 0 0 40px rgba(135,206,250,0.6);
            }
            50% { 
                box-shadow: 0 0 30px rgba(255,215,0,1), 0 0 60px rgba(135,206,250,0.9);
            }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(-5px) scale(1.05); }
            50% { transform: translateY(-10px) scale(1.08); }
        }
        
        @keyframes sparkle {
            0% { transform: rotate(0deg) scale(1); opacity: 1; }
            50% { transform: rotate(180deg) scale(1.5); opacity: 0.5; }
            100% { transform: rotate(360deg) scale(1); opacity: 1; }
        }
        
        @keyframes heavenBurst {
            0% { 
                box-shadow: 0 0 30px rgba(255,215,0,1), 0 0 60px rgba(135,206,250,1);
            }
            50% { 
                box-shadow: 0 0 100px rgba(255,255,255,1), 0 0 150px rgba(255,215,0,1), 0 0 200px rgba(135,206,250,1);
            }
            100% { 
                box-shadow: 0 0 30px rgba(255,215,0,1), 0 0 60px rgba(135,206,250,1);
            }
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
        
        /* Search Box */
        .search-container {
            text-align: center;
            margin: 30px auto;
            max-width: 600px;
        }
        
        .search-form {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        
        .search-input {
            flex: 1;
            padding: 12px 20px;
            border: 2px solid #00ff41;
            border-radius: 8px;
            background: rgba(0,0,0,0.7);
            color: #00ff41;
            font-size: 1.1em;
            outline: none;
            backdrop-filter: blur(2px);
        }
        
        .search-input::placeholder {
            color: rgba(0,255,65,0.5);
        }
        
        .search-input:focus {
            box-shadow: 0 0 15px #00ff41;
        }
        
        .search-btn {
            padding: 12px 30px;
            background: #00ff41;
            color: #111;
            border: 2px solid #00ff41;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1.1em;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .search-btn:hover {
            background: transparent;
            color: #00ff41;
        }
        
        .clear-btn {
            padding: 12px 25px;
            background: rgba(255,0,0,0.7);
            color: #fff;
            border: 2px solid #ff0000;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1.1em;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.2s;
        }
        
        .clear-btn:hover {
            background: #ff0000;
        }
    </style>
</head>
<body>
    <h1>Leaderboard </h1>
    <div class="nav">
        <a href="{{ route('dashboard') }}">Kembali ke Dashboard</a>
        <a href="{{ route('surga') }}" class="heaven-btn">Ingin Masuk Surga?</a>
    </div>
    
    <!-- Search Box -->
    <div class="search-container">
        <form method="GET" action="{{ route('pendosa.index') }}" class="search-form">
            <input 
                type="text" 
                name="search" 
                class="search-input" 
                placeholder="Cari nama pendosa..." 
                value="{{ request('search') }}"
                autocomplete="off"
            >
            <button type="submit" class="search-btn">🔍 Cari</button>
            @if(request('search'))
                <a href="{{ route('pendosa.index') }}" class="clear-btn">✖ Clear</a>
            @endif
        </form>
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