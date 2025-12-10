<header class="site-header">
    <div class="navbar-container">
        <div class="glass-nav nav-content">
            {{-- LOGO --}}
            <div class="logo-section">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/riauport-white.png') }}" alt="RiauPort">
                </a>
            </div>

            {{-- MENU TENGAH --}}
            <nav id="mainNav" class="nav-links nav-menu">
                <div id="navHighlight" class="nav-highlight"></div>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('contact') }}">Contact</a>
                <a href="{{ route('about') }}">About</a>
            </nav>

            {{-- LOGIN / AVATAR KANAN --}}
            @guest
                <a href="{{ route('login') }}" class="glass-btn-login">
                    Login
                </a>
            @endguest

            @auth
                @php
                    $user = auth()->user();
                    $initials = collect(explode(' ', $user->name))
                        ->map(fn($p) => mb_substr($p, 0, 1))
                        ->join('');
                @endphp

                <div style="position: relative;">
                    <button id="userMenuButtonDesktop" class="avatar-btn">
                        {{ $initials }}
                    </button>

                    <div id="userMenuDesktop" class="user-dropdown hidden">
                        <div class="dropdown-label">Akun</div>
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