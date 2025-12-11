document.addEventListener('DOMContentLoaded', function () {
    // ================== TYPEWRITER ANIMATION ==================
    const typewriterElement = document.getElementById('typewriterText');

    if (typewriterElement) {
        const fullText = typewriterElement.getAttribute('data-text');
        let index = 0;

        // Kosongkan dulu
        typewriterElement.textContent = '';

        function typeWriter() {
            if (index < fullText.length) {
                typewriterElement.textContent += fullText.charAt(index);
                index++;
                setTimeout(typeWriter, 80); // Kecepatan ketik (80ms per karakter)
            } else {
                // Tambahkan class untuk cursor blink setelah selesai
                typewriterElement.classList.add('typing-complete');
            }
        }

        // Mulai animasi setelah delay 300ms
        setTimeout(typeWriter, 300);
    }

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

    // ================== DROPDOWN AVATAR USER DESKTOP ==================
    const btnDesktop = document.getElementById('userMenuButtonDesktop');
    const menuDesktop = document.getElementById('userMenuDesktop');

    if (btnDesktop && menuDesktop) {
        btnDesktop.addEventListener('click', function (e) {
            e.stopPropagation();
            menuDesktop.classList.toggle('hidden');
        });

        document.addEventListener('click', function () {
            if (!menuDesktop.classList.contains('hidden')) {
                menuDesktop.classList.add('hidden');
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