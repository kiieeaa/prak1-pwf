<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dzakia Lailah Hamsa - PWF Premium</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=Plus+Jakarta+Sans:wght@700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #818cf8;
            --secondary: #c084fc;
            --accent: #f472b6;
            --bg: #030712;
            --card-bg: rgba(17, 24, 39, 0.4);
            --card-border: rgba(255, 255, 255, 0.08);
            --text-main: #f8fafc;
            --text-sub: #94a3b8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--bg);
            color: var(--text-main);
            font-family: 'Outfit', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            perspective: 1000px;
        }

        /* Animated Mesh Gradient Background */
        .mesh-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-color: var(--bg);
            background-image: 
                radial-gradient(at 0% 0%, hsla(253,16%,7%,1) 0, transparent 50%), 
                radial-gradient(at 50% 0%, hsla(225,39%,30%,1) 0, transparent 50%), 
                radial-gradient(at 100% 0%, hsla(339,49%,30%,1) 0, transparent 50%), 
                radial-gradient(at 100% 100%, hsla(250,100%,70%,1) 0, transparent 60%), 
                radial-gradient(at 0% 100%, hsla(320,80%,50%,1) 0, transparent 60%);
            background-size: 200% 200%;
            animation: mesh-move 15s ease infinite alternate;
        }

        @keyframes mesh-move {
            0% { background-position: 0% 0%; }
            100% { background-position: 100% 100%; }
        }

        /* Glass Container with 3D Effect */
        .card-wrapper {
            transition: transform 0.1s ease;
            transform-style: preserve-3d;
        }

        .premium-card {
            background: var(--card-bg);
            backdrop-filter: blur(32px) saturate(180%);
            -webkit-backdrop-filter: blur(32px) saturate(180%);
            border: 1px solid var(--card-border);
            border-radius: 40px;
            padding: 64px 48px;
            width: 90vw;
            max-width: 520px;
            position: relative;
            text-align: center;
            box-shadow: 
                0 0 0 1px rgba(255, 255, 255, 0.05) inset,
                0 10px 30px -10px rgba(0, 0, 0, 0.5),
                0 40px 80px -20px rgba(0, 0, 0, 0.6);
            overflow: hidden;
            animation: card-reveal 1.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes card-reveal {
            from { opacity: 0; transform: translateY(40px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .premium-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.03),
                transparent
            );
            transition: 0.5s;
        }

        .premium-card:hover::before {
            left: 100%;
        }

        /* User Header Section */
        .badge-container {
            margin-bottom: 32px;
            opacity: 0;
            animation: fade-up 0.8s ease forwards 0.3s;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(129, 140, 248, 0.12);
            color: var(--primary);
            padding: 8px 18px;
            border-radius: 100px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            border: 1px solid rgba(129, 140, 248, 0.2);
        }

        .status-dot {
            width: 6px;
            height: 6px;
            background: var(--primary);
            border-radius: 50%;
            box-shadow: 0 0 10px var(--primary);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.4; transform: scale(1.2); }
            100% { opacity: 1; transform: scale(1); }
        }

        h1 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 8px;
            letter-spacing: -0.04em;
            background: linear-gradient(135deg, #fff 0%, #cbd5e1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            opacity: 0;
            animation: fade-up 0.8s ease forwards 0.5s;
        }

        .nim-text {
            font-size: 22px;
            font-weight: 600;
            color: var(--secondary);
            margin-bottom: 40px;
            letter-spacing: 0.05em;
            opacity: 0;
            animation: fade-up 0.8s ease forwards 0.7s;
        }

        /* Content Section */
        .content-box {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 24px;
            margin-bottom: 40px;
            opacity: 0;
            animation: fade-up 0.8s ease forwards 0.9s;
        }

        p {
            color: var(--text-sub);
            font-size: 16px;
            line-height: 1.7;
            font-weight: 400;
        }

        b {
            color: var(--text-main);
            font-weight: 600;
        }

        /* Footer Section */
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            margin-bottom: 24px;
            opacity: 0;
            animation: fade-in 1s ease forwards 1.1s;
        }

        .footer {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            color: var(--text-sub);
            font-size: 14px;
            font-weight: 500;
            opacity: 0;
            animation: fade-in 1s ease forwards 1.3s;
        }

        .logo-cube {
            width: 24px;
            height: 24px;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(129, 140, 248, 0.3);
        }

        @keyframes fade-up {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fade-in {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Particles */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            background: #fff;
            border-radius: 50%;
            opacity: 0.15;
            filter: blur(1px);
        }
    </style>
</head>
<body>
    <div class="mesh-bg"></div>
    
    <div class="card-wrapper" id="cardWrapper">
        <div class="premium-card">
            <div class="particles" id="particles"></div>
            
            <div class="badge-container">
                <div class="status-badge">
                    <div class="status-dot"></div>
                    PWF Student Profile
                </div>
            </div>

            <h1>Dzakia Lailah Hamsa</h1>
            <div class="nim-text">20230140119</div>
            
            <div class="content-box">
                <p>
                    Embarking on the journey of<br>
                    <b>Framework Web Development</b><br>
                    Crafting digital experiences with Laravel.
                </p>
            </div>

            <div class="divider"></div>

            <div class="footer">
                <div class="logo-cube">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                        <polyline points="2 17 12 22 22 17"></polyline>
                        <polyline points="2 12 12 17 22 12"></polyline>
                    </svg>
                </div>
                Semester 6 • Yogyakarta 2026
            </div>
        </div>
    </div>

    <script>
        // 3D Tilt Effect
        const card = document.getElementById('cardWrapper');
        const sensitivity = 25;

        document.addEventListener('mousemove', (e) => {
            const x = (window.innerWidth / 2 - e.pageX) / sensitivity;
            const y = (window.innerHeight / 2 - e.pageY) / sensitivity;
            card.style.transform = `rotateY(${-x}deg) rotateX(${y}deg)`;
        });

        // Simple Random Particles
        const container = document.getElementById('particles');
        for (let i = 0; i < 20; i++) {
            const p = document.createElement('div');
            p.className = 'particle';
            const size = Math.random() * 4 + 1;
            p.style.width = `${size}px`;
            p.style.height = `${size}px`;
            p.style.left = `${Math.random() * 100}%`;
            p.style.top = `${Math.random() * 100}%`;
            p.style.animation = `fade-in ${Math.random() * 5 + 5}s linear infinite`;
            container.appendChild(p);
        }
    </script>
</body>
</html>
