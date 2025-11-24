<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - RiauPort</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        /* ===== Navbar Glass ===== */
        .site-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            width: 100%;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1.5rem 1rem;
        }

        .glass-nav {
            position: relative;
            overflow: hidden;
            border-radius: 24px;
            background: radial-gradient(circle at 0% 0%, rgba(255, 255, 255, 0.35), rgba(255, 255, 255, 0.08)),
                linear-gradient(135deg, rgba(255, 255, 255, 0.25), rgba(255, 255, 255, 0.05));
            box-shadow:
                0 18px 45px rgba(0, 0, 0, 0.25),
                0 8px 20px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(18px) saturate(180%);
            -webkit-backdrop-filter: blur(18px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.4);
            padding: 0.75rem 1.75rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Highlight yang bergerak untuk efek "liquid" */
        .glass-nav::before {
            content: "";
            position: absolute;
            inset: -40%;
            background:
                radial-gradient(circle at 10% 20%, rgba(255, 255, 255, 0.55) 0, transparent 55%),
                radial-gradient(circle at 80% 0%, rgba(126, 220, 255, 0.38) 0, transparent 60%),
                radial-gradient(circle at 20% 90%, rgba(14, 88, 109, 0.22) 0, transparent 60%);
            opacity: 0.9;
            mix-blend-mode: screen;
            animation: liquidMove 14s infinite alternate ease-in-out;
            pointer-events: none;
        }

        @keyframes liquidMove {
            0% {
                transform: translate3d(-8%, -4%, 0) scale(1);
            }

            50% {
                transform: translate3d(6%, 4%, 0) scale(1.05);
            }

            100% {
                transform: translate3d(-4%, 2%, 0) scale(1.02);
            }
        }

        .logo-container {
            display: flex;
            align-items: center;
            position: relative;
            z-index: 10;
        }

        .logo-container img {
            height: 5rem;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 2rem;
            font-weight: 600;
            font-size: 1.125rem;
            position: relative;
            z-index: 10;
        }

        .nav-menu a {
            color: #1e293b;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .nav-menu a:hover {
            color: #0e586d;
        }

        .nav-menu a.active {
            color: #0e586d;
        }

        /* Tombol login ikut nuansa glass */
        .glass-btn-login {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.55rem 2.4rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            color: #ffffff;
            background: radial-gradient(circle at 0% 0%, #42c0dd, #0e586d);
            box-shadow:
                0 10px 25px rgba(14, 88, 109, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.35);
            border: 1px solid rgba(5, 34, 49, 0.7);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease,
                filter 0.2s ease;
            text-decoration: none;
            position: relative;
            z-index: 10;
        }

        .glass-btn-login:hover {
            transform: translateY(-1px) scale(1.02);
            box-shadow:
                0 16px 35px rgba(14, 88, 109, 0.55),
                0 0 0 1px rgba(255, 255, 255, 0.5);
            filter: brightness(1.05);
        }

        .glass-btn-login:active {
            transform: translateY(1px) scale(0.99);
            box-shadow:
                0 6px 18px rgba(14, 88, 109, 0.45),
                0 0 0 1px rgba(255, 255, 255, 0.4);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 140px 150px 80px;
            min-height: 100vh;
            border-radius: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h1 {
            color: #0d9488;
            font-size: 2.5em;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .header h2 {
            color: #0d9488;
            font-size: 2em;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .header p {
            color: #666;
            font-size: 1.05em;
            line-height: 1.6;
            max-width: 700px;
            margin: 0 auto;
        }

        .alert {
            padding: 15px 20px;
            margin-bottom: 25px;
            border-radius: 5px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 0;
        }

        .form-group label {
            display: block;
            color: #333;
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 0.95em;
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1em;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-control:focus {
            outline: none;
            border-color: #0d9488;
            box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 180px;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875em;
            margin-top: 5px;
        }

        .submit-btn {
            display: block;
            width: 200px;
            margin: 30px auto 0;
            padding: 15px 30px;
            background-color: #0d9488;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1.05em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #0a7a6f;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(13, 148, 136, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            .glass-nav {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
            }

            .nav-menu {
                flex-direction: column;
                gap: 1rem;
                font-size: 1rem;
            }

            .logo-container img {
                height: 4rem;
            }

            .container {
                padding: 140px 20px 40px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .header h1 {
                font-size: 2em;
            }

            .header h2 {
                font-size: 1.6em;
            }

            .header p {
                font-size: 1em;
            }
        }
    </style>
</head>

<body>
    {{-- NAVBAR --}}
    <header class="site-header">
        <div class="nav-container">
            <div class="glass-nav">
                {{-- Logo --}}
                <div class="logo-container">
                    <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort">
                </div>

                {{-- Menu Navigation --}}
                <nav class="nav-menu">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ route('contact') }}" class="active">Contact</a>
                    <a href="{{ url('/#about') }}">About</a>
                </nav>

                {{-- Tombol Login --}}
                <a href="{{ route('login') }}" class="glass-btn-login">
                    Login
                </a>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="header">
            <h1>Hubungi RiauPort</h1>
            <h2>Kami siap membantu perjalananmu</h2>
            <p>
                Punya pertanyaan tentang RiauPort, ingin mendaftarkan layanan travel,
                atau butuh bantuan sebagai penumpang? Kirim pesanmu melalui formulir di bawah.
                Tim RiauPort akan menghubungi kamu secepat mungkin.
            </p>
        </div>

        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST">
            @csrf

            <div class="form-row">
                <div class="form-group">
                    <input type="text" name="first_name" class="form-control" placeholder="First name"
                        value="{{ old('first_name') }}" required>
                    @error('first_name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" name="last_name" class="form-control" placeholder="Last name"
                        value="{{ old('last_name') }}" required>
                    @error('last_name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email address"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="tel" name="phone" class="form-control" placeholder="Phone"
                        value="{{ old('phone') }}">
                    @error('phone')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <textarea name="message" class="form-control" placeholder="Message" required>{{ old('message') }}</textarea>
                @error('message')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="submit-btn">Submit Now</button>
        </form>
    </div>
</body>

</html>
