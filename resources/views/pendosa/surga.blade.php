<!DOCTYPE html>
<html>
<head>
    <title>Selamat Datang di Surga</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: linear-gradient(180deg, 
                #87CEEB 0%, 
                #B0E0E6 25%, 
                #FFD700 50%, 
                #FFA500 75%, 
                #FFB6C1 100%);
            font-family: 'Georgia', serif;
            overflow-x: hidden;
            animation: skyShift 15s ease-in-out infinite;
        }
        
        @keyframes skyShift {
            0%, 100% { 
                background: linear-gradient(180deg, #87CEEB 0%, #B0E0E6 25%, #FFD700 50%, #FFA500 75%, #FFB6C1 100%);
            }
            50% { 
                background: linear-gradient(180deg, #E0F6FF 0%, #FFE4B5 25%, #FFDAB9 50%, #FFB6C1 75%, #DDA0DD 100%);
            }
        }
        
        /* Clouds */
        .clouds {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }
        
        .cloud {
            position: absolute;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 100px;
            animation: floatCloud 20s linear infinite;
        }
        
        .cloud::before,
        .cloud::after {
            content: '';
            position: absolute;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 100px;
        }
        
        .cloud:nth-child(1) {
            width: 100px;
            height: 40px;
            top: 10%;
            left: -10%;
            animation-duration: 25s;
        }
        
        .cloud:nth-child(2) {
            width: 150px;
            height: 50px;
            top: 30%;
            left: -15%;
            animation-duration: 30s;
            animation-delay: 5s;
        }
        
        .cloud:nth-child(3) {
            width: 120px;
            height: 45px;
            top: 50%;
            left: -12%;
            animation-duration: 28s;
            animation-delay: 10s;
        }
        
        .cloud:nth-child(4) {
            width: 80px;
            height: 35px;
            top: 70%;
            left: -8%;
            animation-duration: 22s;
            animation-delay: 3s;
        }
        
        @keyframes floatCloud {
            0% { transform: translateX(0); }
            100% { transform: translateX(120vw); }
        }
        
        /* Stars */
        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }
        
        .star {
            position: absolute;
            width: 3px;
            height: 3px;
            background: white;
            border-radius: 50%;
            animation: twinkle 2s ease-in-out infinite;
        }
        
        @keyframes twinkle {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.5); }
        }
        
        /* Container */
        .heaven-container {
            position: relative;
            z-index: 10;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }
        
        .heaven-box {
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            border: 3px solid rgba(255, 215, 0, 0.6);
            border-radius: 30px;
            padding: 60px 50px;
            text-align: center;
            box-shadow: 0 0 50px rgba(255, 215, 0, 0.5),
                        0 0 100px rgba(255, 255, 255, 0.3),
                        inset 0 0 50px rgba(255, 255, 255, 0.2);
            animation: heavenFloat 4s ease-in-out infinite;
        }
        
        @keyframes heavenFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        h1 {
            color: #FFD700;
            font-size: 3.5em;
            margin-bottom: 30px;
            text-shadow: 0 0 20px rgba(255, 215, 0, 0.8),
                         0 0 40px rgba(255, 255, 255, 0.6),
                         2px 2px 10px rgba(0, 0, 0, 0.3);
            animation: titleGlow 3s ease-in-out infinite;
        }
        
        @keyframes titleGlow {
            0%, 100% { 
                text-shadow: 0 0 20px rgba(255, 215, 0, 0.8),
                            0 0 40px rgba(255, 255, 255, 0.6),
                            2px 2px 10px rgba(0, 0, 0, 0.3);
            }
            50% { 
                text-shadow: 0 0 40px rgba(255, 215, 0, 1),
                            0 0 80px rgba(255, 255, 255, 0.9),
                            2px 2px 10px rgba(0, 0, 0, 0.3);
            }
        }
        
        .heaven-text {
            color: #fff;
            font-size: 1.5em;
            margin: 25px 0;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
            line-height: 1.6;
        }
        
        .angel-emoji {
            font-size: 4em;
            animation: angelSpin 6s linear infinite;
            display: inline-block;
            margin: 20px 0;
        }
        
        @keyframes angelSpin {
            0% { transform: rotate(0deg) scale(1); }
            25% { transform: rotate(90deg) scale(1.2); }
            50% { transform: rotate(180deg) scale(1); }
            75% { transform: rotate(270deg) scale(1.2); }
            100% { transform: rotate(360deg) scale(1); }
        }
        
        .back-btn {
            display: inline-block;
            margin-top: 30px;
            padding: 15px 40px;
            background: linear-gradient(135deg, rgba(255,215,0,0.9), rgba(255,255,255,0.9));
            color: #000;
            border: 3px solid #FFD700;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.2em;
            box-shadow: 0 0 30px rgba(255, 215, 0, 0.8),
                        0 5px 15px rgba(0, 0, 0, 0.3);
            transition: all 0.3s;
        }
        
        .back-btn:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 0 50px rgba(255, 215, 0, 1),
                        0 10px 30px rgba(0, 0, 0, 0.4);
        }
        
        /* Light rays */
        .light-rays {
            position: fixed;
            top: -50%;
            left: 50%;
            transform: translateX(-50%);
            width: 200%;
            height: 200%;
            pointer-events: none;
            animation: rotateRays 30s linear infinite;
        }
        
        .ray {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 2px;
            height: 100%;
            background: linear-gradient(to bottom, 
                rgba(255, 255, 255, 0.8) 0%,
                rgba(255, 215, 0, 0.4) 50%,
                transparent 100%);
            transform-origin: top center;
        }
        
        .ray:nth-child(1) { transform: rotate(0deg); }
        .ray:nth-child(2) { transform: rotate(45deg); }
        .ray:nth-child(3) { transform: rotate(90deg); }
        .ray:nth-child(4) { transform: rotate(135deg); }
        .ray:nth-child(5) { transform: rotate(180deg); }
        .ray:nth-child(6) { transform: rotate(225deg); }
        .ray:nth-child(7) { transform: rotate(270deg); }
        .ray:nth-child(8) { transform: rotate(315deg); }
        
        @keyframes rotateRays {
            0% { transform: translateX(-50%) rotate(0deg); }
            100% { transform: translateX(-50%) rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Light rays -->
    <div class="light-rays">
        <div class="ray"></div>
        <div class="ray"></div>
        <div class="ray"></div>
        <div class="ray"></div>
        <div class="ray"></div>
        <div class="ray"></div>
        <div class="ray"></div>
        <div class="ray"></div>
    </div>
    
    <!-- Clouds -->
    <div class="clouds">
        <div class="cloud"></div>
        <div class="cloud"></div>
        <div class="cloud"></div>
        <div class="cloud"></div>
    </div>
    
    <!-- Stars -->
    <div class="stars" id="stars-container"></div>
    
    <div class="heaven-container">
        <div class="heaven-box">
            <h1>✨ Selamat Datang di Surga ✨</h1>
            <div class="angel-emoji">👼</div>
            <p class="heaven-text">
                Alhamdulillah, kamu telah sampai di tempat yang penuh cahaya dan kebahagiaan abadi!
            </p>
            <p class="heaven-text">
                Di sini tidak ada dosa, hanya kedamaian dan kebahagiaan tanpa batas. 🕊️
            </p>
            <p class="heaven-text">
                Semoga amal baikmu selalu bertambah! 🌟
            </p>
            <a href="{{ route('surga.game') }}" class="back-btn">Selanjutnya</a>
        </div>
    </div>
    
    <script>
        // Generate stars
        const starsContainer = document.getElementById('stars-container');
        for (let i = 0; i < 100; i++) {
            const star = document.createElement('div');
            star.className = 'star';
            star.style.left = Math.random() * 100 + '%';
            star.style.top = Math.random() * 100 + '%';
            star.style.animationDelay = Math.random() * 2 + 's';
            starsContainer.appendChild(star);
        }
    </script>
</body>
</html>
