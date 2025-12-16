// ==========================================
// NAVBAR UNIVERSAL SCRIPT - NO ANIMATION
// ==========================================

document.addEventListener('DOMContentLoaded', function () {
    console.log('🚀 Navbar script initialized');

    // ================== DROPDOWN AVATAR USER ==================
    const userMenuButton = document.getElementById('userMenuButton');
    const userMenu = document.getElementById('userMenu');

    if (userMenuButton && userMenu) {
        console.log('✓ Dropdown elements found');

        // Toggle dropdown saat button diklik - LANGSUNG TANPA ANIMASI
        userMenuButton.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            const isShowing = userMenu.classList.contains('show');

            if (isShowing) {
                userMenu.classList.remove('show');
                console.log('✗ Dropdown closed');
            } else {
                userMenu.classList.add('show');
                console.log('✓ Dropdown opened');
            }
        });

        // Close dropdown saat klik di luar
        document.addEventListener('click', function (e) {
            if (userMenu.classList.contains('show') &&
                !userMenuButton.contains(e.target) &&
                !userMenu.contains(e.target)) {
                userMenu.classList.remove('show');
                console.log('✗ Dropdown closed (outside click)');
            }
        });

        // Close dropdown saat ESC ditekan
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && userMenu.classList.contains('show')) {
                userMenu.classList.remove('show');
                console.log('✗ Dropdown closed (ESC key)');
            }
        });

    } else {
        console.log('⚠ Dropdown elements NOT found (user might be guest)');
    }

    // ================== NAVBAR LIQUID HIGHLIGHT ==================
    const nav = document.querySelector('.nav-links.nav-menu');
    const highlight = document.getElementById('navHighlight');

    if (nav && highlight) {
        const links = nav.querySelectorAll('a');

        function moveHighlight(el) {
            const navRect = nav.getBoundingClientRect();
            const rect = el.getBoundingClientRect();
            const paddingX = 14;

            const width = rect.width + paddingX * 2;
            const left = rect.left - navRect.left - paddingX;

            highlight.style.width = `${width}px`;
            highlight.style.left = `${left}px`;
            highlight.style.opacity = '1';
        }

        links.forEach(link => {
            link.addEventListener('mouseenter', () => moveHighlight(link));
        });

        nav.addEventListener('mouseleave', () => {
            highlight.style.opacity = '0';
        });

        console.log('✓ Navbar highlight initialized');
    }

    console.log('✅ Navbar initialization complete');
});