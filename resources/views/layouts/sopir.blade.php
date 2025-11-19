<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sopir | @yield('title')</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            text-decoration: none;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #eef5f9;
        }

        /* ============= SIDEBAR BARU ============ */
        .sidebar {
            width: 270px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 30px 22px;
            background: linear-gradient(to bottom, #B8E6F1 0%, #0E586D 100%);
            display: flex;
            flex-direction: column;
            color: white;
        }

        /* Logo */
        .logo {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo img {
            width: 150px;
            filter: drop-shadow(0px 0px 3px rgba(0, 0, 0, 0.2));
        }

        /* Menu Style */
        .menu {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .menu a {
            padding: 10px 16px;
            background: #ffffff;
            color: #0E586D;
            font-size: 15px;
            font-weight: 600;
            border-radius: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.2);
            transition: 0.25s;
        }

        .menu a:hover {
            transform: translateX(6px);
        }

        /* Active */
        .menu a.active {
            background: #f0f5f6;
            border: 2px solid #0E586D;
        }

        /* Bottom area */
        .bottom {
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Avatar */
        .avatar {
            width: 48px;
            height: 48px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0E586D;
            font-size: 22px;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.25);
        }

        /* Logout button */
        .btn-logout {
            padding: 10px 18px;
            border-radius: 14px;
            background: #ffffff;
            color: #0E586D;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.25);
            transition: 0.25s;
        }

        .btn-logout:hover {
            background: #e0f3f7;
        }


        /* ============= CONTENT ============ */
        .content {
            margin-left: 270px;
            padding: 35px;
        }

        .page-title {
            font-size: 30px;
            font-weight: 700;
            color: #0E586D;
            margin-bottom: 20px;
        }

        .card {
            background: #ffffff;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0px 5px 14px rgba(0, 0, 0, 0.08);
        }
    </style>

</head>

<body>

    <div class="layout">

        <div class="sidebar">

            <div class="logo">
                <img src="{{ asset('riauport-logo.jpg') }}" alt="Logo">
            </div>

            <div class="menu">
                <a href="#" class="active">🏠 Dashboard</a>
                <a href="#">🚗 Travel</a>
                <a href="#">📅 Jadwal</a>
                <a href="#">👤 Profil</a>
                <a href="#">🔔 Notifikasi</a>
                <a href="#">⚙️ Personalisasi</a>
                <a href="#">❓ Bantuan</a>
            </div>

            <div class="bottom">
                <div class="avatar">👤</div>
                <a href="#" class="btn-logout">⬅ Keluar</a>
            </div>

        </div>


        {{-- ================= CONTENT ================ --}}
        <div class="content">
            <div class="page-title">@yield('title')</div>

            @yield('content')
        </div>

    </div>

</body>

</html>
