<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dzakia Lailah Hamsa - PWF Student Profile</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background: radial-gradient(circle at top left, #2d1b4e 0%, #1a1a2e 50%, #0f0c29 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            overflow: hidden;
            color: white;
        }

        .ambient-light {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
            background: 
                radial-gradient(circle at 20% 30%, rgba(108, 92, 231, 0.15) 0%, transparent 40%),
                radial-gradient(circle at 80% 70%, rgba(255, 121, 198, 0.1) 0%, transparent 40%);
        }

        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            background: white;
            border-radius: 50%;
            opacity: 0.3;
            animation: float 20s infinite linear;
        }

        @keyframes float {
            0% { transform: translateY(0) translateX(0); opacity: 0; }
            50% { opacity: 0.5; }
            100% { transform: translateY(-100vh) translateX(20px); opacity: 0; }
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 40px;
            padding: 60px 40px;
            width: 100%;
            max-width: 500px;
            text-align: center;
            position: relative;
            z-index: 10;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .badge {
            background: rgba(108, 92, 231, 0.2);
            border: 1px solid rgba(108, 92, 231, 0.3);
            color: #a29bfe;
            padding: 6px 20px;
            border-radius: 100px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            display: inline-block;
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        .student-name {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 5px;
            letter-spacing: -1px;
        }

        .student-id {
            font-size: 24px;
            font-weight: 600;
            color: #b39ddb;
            margin-bottom: 40px;
        }

        .description-box {
            background: rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 40px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .description-box p {
            font-size: 16px;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.7);
            margin: 0;
        }

        .description-box strong {
            color: white;
            font-weight: 600;
        }

        .footer-info {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 14px;
        }

        .footer-icon {
            width: 24px;
            height: 24px;
            background: #6c5ce7;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 15px rgba(108, 92, 231, 0.4);
        }

        .footer-icon svg {
            width: 14px;
            height: 14px;
            fill: white;
        }
    </style>
</head>
<body>
    <div class="ambient-light"></div>
    
    <!-- Particles -->
    <div class="particles">
        <script>
            for (let i = 0; i < 20; i++) {
                const p = document.createElement('div');
                p.className = 'particle';
                const size = Math.random() * 4 + 2 + 'px';
                p.style.width = size;
                p.style.height = size;
                p.style.left = Math.random() * 100 + '%';
                p.style.top = Math.random() * 100 + '%';
                p.style.animationDelay = Math.random() * 10 + 's';
                p.style.animationDuration = Math.random() * 10 + 10 + 's';
                document.querySelector('.particles').appendChild(p);
            }
        </script>
    </div>

    <!-- Auth Navigation -->
    <div class="fixed top-0 right-0 p-6 text-right z-50">
        @if (Route::has('login'))
            <div class="space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-300 hover:text-white transition focus:outline focus:outline-2 focus:rounded-sm focus:outline-[#6c5ce7]">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-6 py-2 rounded-full border border-white/20 bg-white/5 font-semibold text-white hover:bg-white/10 transition backdrop-blur-sm">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-6 py-2 rounded-full bg-[#6c5ce7] font-semibold text-white hover:bg-[#5b4cc4] transition shadow-lg shadow-[#6c5ce7]/20">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <div class="glass-card">
        <div class="badge">
            <span class="flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-[#a29bfe]"></span>
                PWF Student Profile
            </span>
        </div>

        <h1 class="student-name">Dzakia Lailah Hamsa</h1>
        <p class="student-id">20230140119</p>

        <div class="description-box">
            <p>
                Embarking on the journey of<br>
                <strong>Framework Web Development</strong><br>
                Crafting digital experiences with Laravel.
            </p>
        </div>

        <div class="footer-info">
            <div class="footer-icon">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
            </div>
            <span>Semester 6 • Yogyakarta 2026</span>
        </div>
    </div>
</body>
</html>
