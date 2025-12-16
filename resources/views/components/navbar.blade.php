<header class="site-header">
    <div class="navbar-container">
        <div class="glass-nav nav-content">

            {{-- ================== LOGO ================== --}}
            <div class="logo-section">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/riauport-white.png') }}" alt="RiauPort">
                </a>
            </div>

            {{-- ================== MENU NAVIGATION ================== --}}
            <nav id="mainNav" class="nav-links nav-menu">
                <div id="navHighlight" class="nav-highlight"></div>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('contact') }}">Contact</a>
                <a href="{{ route('about') }}">About</a>
            </nav>

            {{-- ================== LOGIN / AVATAR ================== --}}
            @guest
                {{-- Tampilkan tombol login jika user belum login --}}
                <a href="{{ route('login') }}" class="glass-btn-login">
                    Login
                </a>
            @endguest

            @auth
                {{-- Tampilkan avatar jika user sudah login --}}
                @php
                    $user = auth()->user();
                    // Ambil inisial dari nama user
                    $initials = collect(explode(' ', $user->name))
                        ->map(fn($p) => mb_substr($p, 0, 1))
                        ->join('');
                @endphp

                <div class="avatar-wrapper-about">
                    {{-- Avatar Button - ID harus userMenuButton (bukan userMenuButtonDesktop) --}}
                    <button id="userMenuButton" class="avatar-btn" type="button">
                        {{ $initials }}
                    </button>

                    {{-- Dropdown Menu - ID harus userMenu (bukan userMenuDesktop) --}}
                    {{-- JANGAN tambahkan class 'hidden' di sini --}}
                    <div id="userMenu" class="user-dropdown">
                        <div class="dropdown-label">
                            Akun
                        </div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth

        </div>
    </div>
</header>
