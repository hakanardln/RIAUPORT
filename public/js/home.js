document.addEventListener('DOMContentLoaded', function () {
    // ================== SLIDESHOW HERO ==================
    const heroSection = document.querySelector('section.hero[data-frames]');
    const heroBg = document.getElementById('heroBg');

    if (heroSection && heroBg) {
        let frames = [];

        try {
            const raw = heroSection.dataset.frames || '[]';
            frames = JSON.parse(raw);
        } catch (e) {
            frames = [];
        }

        function makeBg(src) {
            return `
                linear-gradient(
                    to bottom,
                    rgba(15, 23, 42, 0.55),
                    rgba(15, 23, 42, 0.30),
                    rgba(15, 23, 42, 0.18)
                ),
                url('${src}')
            `;
        }

        if (frames.length > 0) {
            let index = 0;

            heroBg.style.backgroundImage = makeBg(frames[index]);

            setInterval(() => {
                heroBg.classList.add('fade');

                setTimeout(() => {
                    index = (index + 1) % frames.length;
                    heroBg.style.backgroundImage = makeBg(frames[index]);
                    heroBg.classList.remove('fade');
                }, 400);
            }, 4000);
        }
    }

    // ================== DROPDOWN AVATAR USER ==================
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

    // ================== NAVBAR LIQUID HIGHLIGHT ==================
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
