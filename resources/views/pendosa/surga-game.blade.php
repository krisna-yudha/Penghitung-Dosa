<!DOCTYPE html>
<html>
<head>
    <title>Permainan Masuk Surga</title>
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
            overflow: hidden;
            animation: skyShift 15s ease-in-out infinite;
            position: relative;
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
            z-index: 1;
        }
        
        .cloud {
            position: absolute;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 100px;
            width: 100px;
            height: 40px;
            animation: floatCloud 20s linear infinite;
        }
        
        .cloud:nth-child(1) {
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
            top: 60%;
            left: -12%;
            animation-duration: 28s;
            animation-delay: 10s;
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
            z-index: 1;
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
        
        /* Game Container */
        .game-container {
            position: relative;
            z-index: 10;
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        h1 {
            color: #FFD700;
            font-size: 3em;
            margin-bottom: 20px;
            text-align: center;
            text-shadow: 3px 3px 0px rgba(0, 0, 0, 0.8),
                         -1px -1px 0px rgba(0, 0, 0, 0.8),
                         1px -1px 0px rgba(0, 0, 0, 0.8),
                         -1px 1px 0px rgba(0, 0, 0, 0.8),
                         0 0 20px rgba(255, 215, 0, 0.8),
                         0 0 40px rgba(255, 255, 255, 0.6);
            animation: titleGlow 3s ease-in-out infinite;
            padding: 0 20px;
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
        
        .counter {
            color: #000;
            font-size: 1.5em;
            margin-bottom: 30px;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.5);
            background: rgba(255, 215, 0, 0.85);
            padding: 10px 30px;
            border-radius: 20px;
            border: 3px solid rgba(255, 215, 0, 1);
        }
        
        .play-area {
            position: relative;
            width: 80vw;
            height: 60vh;
            max-width: 1200px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 3px solid rgba(255, 215, 0, 0.5);
            border-radius: 30px;
            box-shadow: 0 0 50px rgba(255, 215, 0, 0.3);
            pointer-events: none;
        }
        
        #heaven-btn {
            position: fixed;
            padding: 20px 40px;
            background: linear-gradient(135deg, rgba(255,215,0,0.95), rgba(255,255,255,0.95));
            color: #000;
            border: 3px solid #FFD700;
            border-radius: 50px;
            font-weight: bold;
            font-size: 1.3em;
            cursor: pointer;
            box-shadow: 0 0 30px rgba(255, 215, 0, 0.8),
                        0 5px 15px rgba(0, 0, 0, 0.3);
            transition: all 0.15s;
            white-space: nowrap;
            animation: btnPulse 2s ease-in-out infinite;
            pointer-events: auto;
            z-index: 100;
        }
        
        @keyframes btnPulse {
            0%, 100% { 
                transform: scale(1);
                box-shadow: 0 0 30px rgba(255, 215, 0, 0.8), 0 5px 15px rgba(0, 0, 0, 0.3);
            }
            50% { 
                transform: scale(1.05);
                box-shadow: 0 0 50px rgba(255, 215, 0, 1), 0 5px 20px rgba(0, 0, 0, 0.4);
            }
        }
        
        #heaven-btn:hover {
            transform: scale(1.08);
            box-shadow: 0 0 50px rgba(255, 215, 0, 1),
                        0 10px 30px rgba(0, 0, 0, 0.4);
        }
        
        #heaven-btn.moving {
            animation: none;
            transition: all 0.15s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }
        
        .success-message {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            background: rgba(255, 255, 255, 0.95);
            padding: 40px 60px;
            border-radius: 30px;
            border: 4px solid #FFD700;
            box-shadow: 0 0 100px rgba(255, 215, 0, 0.8);
            text-align: center;
            max-width: 90%;
        }
        
        .success-message h2 {
            color: #FFD700;
            font-size: 2.5em;
            margin-bottom: 20px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
        }
        
        .success-message p {
            color: #333;
            font-size: 1.3em;
            margin-bottom: 20px;
        }
        
        .qris-image {
            max-width: 300px;
            width: 100%;
            border: 3px solid #FFD700;
            border-radius: 15px;
            margin: 20px auto;
            display: block;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .final-btn {
            display: inline-block;
            padding: 15px 40px;
            background: linear-gradient(135deg, #FFD700, #FFA500);
            color: #000;
            border: 3px solid #FFD700;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.2em;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            transition: all 0.3s;
        }
        
        .final-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
        }
    </style>
</head>
<body>
    <!-- Clouds -->
    <div class="clouds">
        <div class="cloud"></div>
        <div class="cloud"></div>
        <div class="cloud"></div>
    </div>
    
    <!-- Stars -->
    <div class="stars" id="stars-container"></div>
    
    <div class="game-container">
        <h1>🌟 Mau Masuk Surga? Tekan Tombol Ini! 🌟</h1>
        <div class="counter">Percobaan: <span id="click-count">0</span> / 5</div>
        
        <div class="play-area" id="play-area">
            <button id="heaven-btn">✨ Masuk Surga ✨</button>
        </div>
    </div>
    
    <div class="success-message" id="success-message">
        <h2>💰 Bayar Dulu Bos! 💰</h2>
        <p>Mau masuk surga? Scan QRIS ini dulu ya! 😄</p>
        <img src="{{ asset('qris.jpeg') }}" alt="QRIS Payment" class="qris-image">
        <a href="{{ route('pendosa.index') }}" class="final-btn">Kembali ke Leaderboard</a>
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
        
        // Game Logic
        const btn = document.getElementById('heaven-btn');
        const playArea = document.getElementById('play-area');
        const clickCountSpan = document.getElementById('click-count');
        const successMessage = document.getElementById('success-message');
        let clickCount = 0;
        const maxClicks = 5;
        
        // Initialize button position (center)
        function initButtonPosition() {
            const btnRect = btn.getBoundingClientRect();
            
            btn.style.left = (window.innerWidth / 2 - btnRect.width / 2) + 'px';
            btn.style.top = (window.innerHeight / 2 - btnRect.height / 2) + 'px';
        }
        
        // Move button to random position
        function moveButton() {
            const btnRect = btn.getBoundingClientRect();
            
            // Add more padding to keep button fully visible
            const padding = 50;
            const maxX = window.innerWidth - btnRect.width - padding;
            const maxY = window.innerHeight - btnRect.height - padding;
            
            // Ensure minimum padding from edges
            const minX = padding;
            const minY = padding;
            
            const randomX = minX + (Math.random() * (maxX - minX));
            const randomY = minY + (Math.random() * (maxY - minY));
            
            btn.classList.add('moving');
            btn.style.left = randomX + 'px';
            btn.style.top = randomY + 'px';
            
            setTimeout(() => {
                btn.classList.remove('moving');
            }, 150);
        }
        
        // Button click handler
        btn.addEventListener('click', function(e) {
            if (clickCount < maxClicks) {
                clickCount++;
                clickCountSpan.textContent = clickCount;
                
                if (clickCount < maxClicks) {
                    // Move button
                    moveButton();
                } else {
                    // Success!
                    successMessage.style.display = 'block';
                }
            }
        });
        
        // Initialize
        window.addEventListener('load', function() {
            initButtonPosition();
        });
        
        // Handle window resize
        window.addEventListener('resize', function() {
            if (clickCount === 0) {
                initButtonPosition();
            }
        });
    </script>
</body>
</html>
