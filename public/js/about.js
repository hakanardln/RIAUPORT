document.addEventListener('DOMContentLoaded', function () {
    // Dropdown avatar
    const btn = document.getElementById('userMenuButton');
    const menu = document.getElementById('userMenu');

    if (btn && menu) {
        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            menu.classList.toggle('hidden');
        });

        document.addEventListener('click', function () {
            if (!menu.classList.contains('hidden')) {
                menu.classList.add('hidden');
            }
        });
    }

    // Navbar liquid highlight
    const nav = document.getElementById('mainNav');
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
    }
});
