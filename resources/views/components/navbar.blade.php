<header class="site-header">
    <div class="navbar-container">
        <div class="glass-nav nav-content">

            {{-- Logo --}}
            <div class="logo-section">
                <img src="{{ asset('images/riauport-white.png') }}" alt="RiauPort">
            </div>

            {{-- NAVIGATION --}}
            <nav id="mainNav" class="nav-menu nav-links">
                <div id="navHighlight" class="nav-highlight"></div>

                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('contact') }}">Contact</a>
                <a href="{{ route('about') }}">About</a>
            </nav>

            {{-- LOGIN / AVATAR --}}
            @guest
                <a href="{{ route('login') }}" class="glass-btn-login">Login</a>
            @endguest

            @auth
                @php
                    $user = auth()->user();
                    $initials = collect(explode(' ', $user->name))
                        ->map(fn($p) => mb_substr($p, 0, 1))
                        ->join('');
                @endphp

                <div class="relative">
                    <button id="userMenuButton" class="avatar-btn">
                        {{ $initials }}
                    </button>

                    <div id="userMenu" class="user-dropdown hidden">
                        <div class="dropdown-label">Akun</div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </div>
                </div>
            @endauth

        </div>
    </div>
</header>