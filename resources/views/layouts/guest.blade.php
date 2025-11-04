<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Login')</title>
    {{-- Tailwind via CDN (cukup untuk halaman ini) --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Palet mirip contoh */
        :root {
            --primary: #0e6372;
            /* teal gelap untuk judul & tombol */
            --primary-50: #e7f7fb;
            /* latar panel kiri */
            --primary-100: #ccecf3;
            --shadow: #2b55614d;
            /* bayangan lembut */
        }

        .soft-card {
            box-shadow: 0 10px 24px rgba(0, 0, 0, .06), 0 6px 12px rgba(0, 0, 0, .04);
        }

        .right-card {
            box-shadow: 12px 12px 0 var(--shadow);
        }

        .pill-btn {
            border-radius: 9999px;
        }

        .input {
            @apply w-full rounded-xl px-4 py-3 bg-gray-100/70 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[color:var(--primary)] placeholder-gray-400;
        }
    </style>
</head>

<body class="min-h-screen bg-gray-100">
    <div class="max-w-[1150px] mx-auto py-10 px-4">
        @yield('content')
    </div>
</body>

</html>
