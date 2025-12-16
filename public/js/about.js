document.addEventListener('DOMContentLoaded', function () {
    console.log('About.js loaded!'); // Debug log

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

    // Animasi fade-in untuk kartu team
    const teamCards = document.querySelectorAll('.team-modern-card');
    console.log('Team cards found:', teamCards.length); // Debug log

    if (teamCards.length > 0) {
        const observerOptions = {
            threshold: 0.15,
            rootMargin: '0px'
        };

        const observer = new IntersectionObserver(function (entries) {
            entries.forEach((entry) => {
                console.log('Card observed:', entry.isIntersecting); // Debug log
                if (entry.isIntersecting) {
                    const index = Array.from(teamCards).indexOf(entry.target);
                    setTimeout(() => {
                        entry.target.classList.add('card-visible');
                        console.log('Card visible class added'); // Debug log
                    }, index * 150);
                }
            });
        }, observerOptions);

        teamCards.forEach(card => {
            observer.observe(card);
        });
    }
});