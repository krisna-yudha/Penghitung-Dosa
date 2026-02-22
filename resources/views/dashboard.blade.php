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
        
        /* Jumpscare styles */
        #jumpscare-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: #000;
            z-index: 9999;
            display: none;
            justify-content: center;
            align-items: center;
        }
        #jumpscare-container.active {
            display: flex;
            animation: flashBg 0.1s infinite;
        }
        #amba-img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            animation: jumpscareZoom 0.3s ease-out, shake 0.1s infinite;
        }
        @keyframes jumpscareZoom {
            0% { transform: scale(0.1) rotate(-10deg); }
            100% { transform: scale(1) rotate(0deg); }
        }
        @keyframes shake {
            0% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(-10px, 10px) rotate(-2deg); }
            50% { transform: translate(10px, -10px) rotate(2deg); }
            75% { transform: translate(-10px, -10px) rotate(-1deg); }
            100% { transform: translate(10px, 10px) rotate(1deg); }
        }
        @keyframes flashBg {
            0% { background: #000; }
            50% { background: #300; }
            100% { background: #000; }
        }
        
        /* Audio Control Button */
        #audio-control {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 45px;
            height: 45px;
            background: rgba(0, 255, 65, 0.2);
            border: 2px solid #00ff41;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            transition: all 0.3s;
        }
        #audio-control:hover {
            background: rgba(0, 255, 65, 0.4);
            transform: scale(1.1);
        }
        #audio-control svg {
            width: 24px;
            height: 24px;
            fill: #00ff41;
        }
        #audio-control.muted {
            background: rgba(255, 0, 0, 0.2);
            border-color: #ff0000;
        }
        #audio-control.muted svg {
            fill: #ff0000;
        }
    </style>
</head>
<body>
    <!-- Audio Control Button -->
    <button id="audio-control" title="Toggle Audio">
        <svg id="audio-icon-on" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/>
        </svg>
        <svg id="audio-icon-off" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display:none;">
            <path d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z"/>
        </svg>
    </button>

    <!-- Jumpscare Container -->
    <div id="jumpscare-container">
        <img id="amba-img" src="{{ asset('amba.jpg') }}" alt="Jumpscare">
    </div>
    <audio id="jumpscare-audio" preload="auto">
        <source src="{{ asset('jumpscare.mp3') }}" type="audio/mpeg">
    </audio>

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

            // List dosa yang akan dipilih secara acak
            var listDosa = [
                "zina", "judi", "pedofil", "suka maling", "mencuri", "sodom",
                "fandom gensin", "jadi wibu", "Membangun tambang", "Memalsukan Ijazah", 
                "jadi anak skena", "makan babi", "merodok teman", "amer enak", "jual sabu", 
                "tolol", "makan buah zakar", "korupsi", "menipu rakyat", "berbohong", 
                "riba", "fitnah", "ghibah", "hasad", "takabur", "sombong", "kikir", 
                "boros", "mabuk", "narkoba", "bunuh diri", "membunuh", "aniaya", 
                "dzalim", "ingkar janji", "khianat", "durhaka ke ortu", "putus silaturahim",
                "sakiti hati ibu", "bohong ke guru", "bolos sekolah", "nyontek ujian",
                "plagiat tugas", "skip sholat", "tinggalkan puasa", "makan siang ramadan",
                "pacaran", "khalwat", "pegang tangan lawan jenis", "cipok di publik",
                "toxik player", "flamers dota", "cheater pubg", "hacker valorant",
                "smurf account", "griefing", "afk ranked", "feeding intentional",
                "spam chat", "bacot di vc", "rusuh di discord", "ngata-ngatain ibu orang",
                "ngetroll joki", "scam trading", "nge-ngab", "rasis", "body shaming",
                "bikin hoax", "sebar berita palsu", "nge-ghosting", "PHP-in orang",
                "nolak dikasih makan", "buang makanan", "makan sambil berdiri",
                "makan gak bilang bismillah", "gak cuci tangan", "siram kucing",
                "tendang anjing", "buang sampah sembarangan", "bakar hutan",
                "polusi sungai", "nyalain ac pintu terbuka", "buang racun ke laut",
                "bunuh hewan langka", "nyiksa binatang", "ngerusak terumbu karang",
                "nebang pohon sembarangan", "males nyumbang", "pelit sedekah",
                "gak mau zakat", "gak pernah infak", "perhitungan banget",
                "nuntut balik hadiah", "ngomel dikasih rejeki", "gak syukur nikmat",
                "nyawit tengah malem", "kanarazu katsu addict", "makan indomie pake nasi",
                "ngopi pake gula 10 sendok", "minum aqua galon langsung", "nyium bantal orang",
                "ngupil di depan umum", "kentut di lift", "gak flush toilet",
                "nyanyi di kamar mandi jam 3 pagi", "teriak random di jalan",
                "kepoin mantan tiap hari", "stalk ig crush 52 minggu ke belakang",
                "nge-skip intro anime", "spoiler ending film", "baca komik dari kanan",
                "makan pake tangan kiri", "tidur jam 5 pagi tiap hari",
                "gak pernah ganti sprei", "nyimpen piring kotor seminggu",
                "make kaos kaki bolong", "celana dalem seminggu gak ganti", "jomok"
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
    
    <!-- Jumpscare Script -->
    <script>
        let inactivityTimer;
        let jumpscareActive = false;
        let loopJumpscare = false;
        let audioMuted = false;
        let audioPlayed = false;
        const INACTIVITY_TIME = 5000; // 5 detik
        const JUMPSCARE_DURATION = 10000; // 10 detik
        const AUDIO_DELAY = 3000; // Audio delay 3 detik setelah gambar
        
        // Audio Control Toggle
        document.getElementById('audio-control').addEventListener('click', function() {
            audioMuted = !audioMuted;
            const btn = this;
            const iconOn = document.getElementById('audio-icon-on');
            const iconOff = document.getElementById('audio-icon-off');
            
            if (audioMuted) {
                btn.classList.add('muted');
                iconOn.style.display = 'none';
                iconOff.style.display = 'block';
                document.getElementById('jumpscare-audio').pause();
            } else {
                btn.classList.remove('muted');
                iconOn.style.display = 'block';
                iconOff.style.display = 'none';
            }
        });

        function resetTimer() {
            clearTimeout(inactivityTimer);
            loopJumpscare = false;
            jumpscareActive = false;
            audioPlayed = false;
            
            const container = document.getElementById('jumpscare-container');
            const audio = document.getElementById('jumpscare-audio');
            container.classList.remove('active');
            audio.pause();
            audio.currentTime = 0;
            
            inactivityTimer = setTimeout(startJumpscareLoop, INACTIVITY_TIME);
        }

        function startJumpscareLoop() {
            loopJumpscare = true;
            showJumpscare();
        }

        function showJumpscare() {
            if (!loopJumpscare) return;
            
            jumpscareActive = true;
            const container = document.getElementById('jumpscare-container');
            const audio = document.getElementById('jumpscare-audio');
            
            // Play audio dulu (hanya sekali)
            if (!audioPlayed && !audioMuted) {
                audio.currentTime = 0;
                audio.volume = 1.0;
                audio.play().catch(err => {
                    console.log('Audio play failed:', err);
                });
                audioPlayed = true;
            }
            
            // Tampilkan gambar setelah delay 3 detik
            setTimeout(() => {
                if (loopJumpscare) {
                    container.classList.add('active');
                }
            }, AUDIO_DELAY);

            // Setelah 10 detik, hide lalu show lagi jika masih loop
            setTimeout(() => {
                container.classList.remove('active');
                
                // Jeda 500ms lalu tampilkan lagi jika masih loop
                setTimeout(() => {
                    if (loopJumpscare) {
                        showJumpscare();
                    }
                }, 500);
            }, JUMPSCARE_DURATION);
        }

        // Event listeners untuk reset timer dan stop loop
        const events = ['mousedown', 'mousemove', 'keypress', 'scroll', 'touchstart', 'click', 'input'];
        
        events.forEach(event => {
            document.addEventListener(event, resetTimer, true);
        });

        // Start timer ketika halaman dimuat
        resetTimer();
        
        // Enable audio on first user interaction (browser policy)
        document.addEventListener('click', function enableAudio() {
            const audio = document.getElementById('jumpscare-audio');
            audio.load();
        }, { once: true });
    </script>
</body>
</html>