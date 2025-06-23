<!DOCTYPE html>
<html>
<head>
    <title>Cek Dosa Teman</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: url('https://pict.sindonews.net/dyn/850/pena/news/2022/03/14/70/712715/urutan-namanama-neraka-berikut-calon-penghuninya-ytt.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        .overlay {
            min-height: 100vh;
            background: rgba(0,0,0,0.7);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .box {
            background: rgba(255,255,255,0.1);
            border: 2px solid #fff;
            border-radius: 10px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 0 20px #00ff41;
        }
        h1 {
            color: #fff;
            margin-bottom: 30px;
            font-size: 2.2em;
            text-shadow: 0 0 10px #00ff41;
        }
        label {
            color: #fff;
            font-size: 1.1em;
        }
        input[type="text"] {
            padding: 8px 10px;
            border-radius: 5px;
            border: 1px solid #00ff41;
            outline: none;
            width: 220px;
            margin-right: 10px;
            background: #222;
            color: #fff;
        }
        button {
            padding: 8px 18px;
            border-radius: 5px;
            border: none;
            background: #00ff41;
            color: #222;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }
        button:hover {
            background: #fff;
            color: #00ff41;
        }
        .result {
            margin-top: 25px;
            color: #fff;
            font-size: 1.2em;
            text-shadow: 0 0 5px #00ff41;
            font-weight: bold;
            border-top: 2px solid #fff;
            padding-top: 15px;
        }
        /* Animasi api */
        .fire-container {
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
            height: 120px;
            pointer-events: none;
            z-index: 1;
            display: flex;
            justify-content: center;
        }
        .fire {
            position: relative;
            width: 220px;
            height: 120px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }
        .flame {
            width: 40px;
            height: 100px;
            background: radial-gradient(ellipse at center, #ffec85 0%, #ffae34 40%, #ec760c 70%, #cd4606 100%);
            border-radius: 50% 50% 20% 20%;
            opacity: 0.7;
            animation: flameMove 1.2s infinite alternate;
            margin: 0 2px;
            filter: blur(1px);
        }
        .flame:nth-child(2) {
            height: 80px;
            animation-delay: 0.3s;
            opacity: 0.6;
        }
        .flame:nth-child(3) {
            height: 110px;
            animation-delay: 0.6s;
            opacity: 0.8;
        }
        .flame:nth-child(4) {
            height: 90px;
            animation-delay: 0.9s;
            opacity: 0.5;
        }
        .flame:nth-child(5) {
            height: 70px;
            animation-delay: 1.1s;
            opacity: 0.4;
        }
        @keyframes flameMove {
            0% { transform: scaleY(1) translateY(0); }
            100% { transform: scaleY(1.2) translateY(-20px); }
        }
    </style>
</head>
<body>
    <!-- Video background api neraka -->
    <video autoplay loop muted playsinline
        style="position:fixed;top:0;left:0;width:100vw;height:100vh;object-fit:cover;z-index:0;opacity:0.35;">
        <source src="{{ asset('api-neraka.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="overlay" style="position:relative;z-index:1;">
        <div class="box">
            <h1>Cek Dosa Teman</h1>
            <form id="cekForm" autocomplete="off">
                <label>Masukkan Nama Teman:</label>
                <input type="text" id="nama" name="nama" required autofocus>
                <button type="submit">Cek</button>
            </form>
            <div id="hasil" class="result" style="display:none;"></div>
            <div id="nav-index" style="display:none; margin-top:20px;">
                <a href="{{ route('pendosa.index') }}" style="background:#00ff41;color:#222;padding:10px 22px;border-radius:5px;text-decoration:none;font-weight:bold;transition:background 0.2s;">Lihat Leaderboard Pendosa</a>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('cekForm').addEventListener('submit', function(e) {
            e.preventDefault();
            var nama = document.getElementById('nama').value.trim();
            if(nama.length === 0) return;

            // List dosa
            var listDosa = [
                "zina", "judi", "pedofil", "suka maling", "mencuri", "sodom",
                "fandom gensin", "jadi wibu", "jadi anak skena", "makan babi","merodok teman", "amer enak", "jual sabu", "tolol", "makan buah zakar"
            ];
            // Pilih dosa random dari list
            var dosaRandom = listDosa[Math.floor(Math.random() * listDosa.length)];
            // Generate angka dosa random antara 1000 dan 99999
            var jumlahDosa = Math.floor(Math.random() * (99999 - 1000 + 1)) + 1000;

            fetch("{{ route('simpan.dosa') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    nama: nama,
                    dosa: dosaRandom,
                    jumlah_dosa: jumlahDosa
                })
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('hasil').style.display = 'block';
                document.getElementById('hasil').innerHTML =
                    'Dosa <strong>' + nama.toLowerCase() + '</strong> adalah <strong>' + dosaRandom + '</strong> sebanyak: <strong>' + jumlahDosa + '</strong>';
                document.getElementById('nav-index').style.display = 'block';
            });
        });
    </script>
</body>
</html>