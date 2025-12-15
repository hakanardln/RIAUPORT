document.addEventListener('DOMContentLoaded', function () {
    // ================== TYPEWRITER ANIMATION ==================
    const typewriterElement = document.getElementById('typewriterText');

    if (typewriterElement) {
        const fullText = typewriterElement.getAttribute('data-text');
        const isMobile = window.innerWidth <= 767;

        if (isMobile) {
            typewriterElement.textContent = fullText;
            typewriterElement.classList.add('typing-complete');
        } else {
            let index = 0;
            typewriterElement.textContent = '';

            function typeWriter() {
                if (index < fullText.length) {
                    typewriterElement.textContent += fullText.charAt(index);
                    index++;
                    setTimeout(typeWriter, 80);
                } else {
                    typewriterElement.classList.add('typing-complete');
                }
            }

            setTimeout(typeWriter, 300);
        }
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

    // ================== SCROLL REVEAL ANIMATION UNTUK FITUR CARDS ==================
    const fiturCards = document.querySelectorAll('#fitur .grid > div');

    if (fiturCards.length > 0) {
        // Intersection Observer untuk detect scroll
        const observerOptions = {
            root: null, // viewport
            rootMargin: '0px 0px -100px 0px', // trigger sedikit sebelum masuk viewport
            threshold: 0.1 // minimal 10% terlihat
        };

        const cardObserver = new IntersectionObserver(function (entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Kartu MUNCUL saat masuk viewport
                    entry.target.classList.add('reveal');
                } else {
                    // Kartu HILANG saat keluar dari viewport
                    entry.target.classList.remove('reveal');
                }
            });
        }, observerOptions);

        // Observe setiap kartu
        fiturCards.forEach(card => {
            cardObserver.observe(card);
        });
    }

    // ================== TESTIMONI NAVIGATION WITH SLIDE ANIMATION ==================
    const testimonials = [
        {
            rating: 5,
            title: "Pelayanannya sangat membantu perjalanan saya",
            content: "Pemesanan travel jadi lebih mudah. Saya bisa melihat jadwal, harga, dan kontak sopir tanpa harus chat satu-satu. Sangat praktis untuk yang sering pulang-pergi Bengkalis - Pekanbaru.",
            name: "Anonymous",
            role: "Mahasiswa – Bengkalis",
            initials: "",
            gradient: "from-[#0E586D] to-[#5CBCCB]"
        },
        {
            rating: 5,
            title: "Sangat membantu mengelola armada travel",
            content: "Sebagai pemilik travel, saya bisa mengatur jadwal keberangkatan, melihat data penumpang, dan mengelola sopir di satu dashboard. Tidak perlu pakai catatan manual lagi.",
            name: "Budi Utama",
            role: "Owner Travel Riau Jaya",
            initials: "BU",
            gradient: "from-[#7BD1DF] to-[#0E586D]"
        },
        {
            rating: 5,
            title: "Lebih tenang karena dapat info sopir jelas",
            content: "Sebelum berangkat saya sudah tahu nama sopir, jenis mobil, dan nomor yang bisa dihubungi. Rasanya lebih aman apalagi kalau pulang malam.",
            name: "Raditya",
            role: "Karyawan – Pekanbaru",
            initials: "RA",
            gradient: "from-[#5CBCCB] to-[#0E586D]"
        },
        {
            rating: 5,
            title: "Antarmuka simpel, gampang dipahami orang tua",
            content: "Saya sering bantu orang tua pesan travel. Tampilan RiauPort sederhana, tombolnya jelas, jadi mereka pun bisa belajar pesan sendiri.",
            name: "Zahra",
            role: "Pengguna Rutin",
            initials: "SZ",
            gradient: "from-[#0E586D] to-[#7BD1DF]"
        },
        {
            rating: 5,
            title: "Harga transparan, tidak ada biaya tersembunyi",
            content: "Dulu saya sering kaget dengan biaya tambahan yang muncul saat booking. Di RiauPort semua harga jelas dari awal, jadi bisa budgeting dengan baik.",
            name: "Ahmad Rifai",
            role: "Pengusaha – Dumai",
            initials: "AR",
            gradient: "from-[#42C0DD] to-[#0E586D]"
        },
        {
            rating: 5,
            title: "Responsif dan cepat dalam memberikan solusi",
            content: "Pernah ada kendala di tengah perjalanan, langsung hubungi customer service dan masalah cepat diselesaikan. Pelayanan yang sangat memuaskan!",
            name: "Siti Nurhaliza",
            role: "Guru – Pekanbaru",
            initials: "SN",
            gradient: "from-[#7BD1DF] to-[#42C0DD]"
        },
        {
            rating: 5,
            title: "Pilihan travel yang beragam dan terpercaya",
            content: "Banyak pilihan travel dengan berbagai harga dan fasilitas. Semua sudah diverifikasi sehingga saya merasa aman dan nyaman dalam memilih.",
            name: "Dedi Firmansyah",
            role: "Freelancer – Bengkalis",
            initials: "DF",
            gradient: "from-[#0E586D] to-[#5CBCCB]"
        },
        {
            rating: 5,
            title: "Notifikasi real-time sangat membantu",
            content: "Setiap ada update jadwal atau perubahan, langsung dapat notifikasi. Jadi tidak perlu khawatir ketinggalan informasi penting.",
            name: "Linda Permata",
            role: "Wiraswasta – Pekanbaru",
            initials: "LP",
            gradient: "from-[#5CBCCB] to-[#7BD1DF]"
        }
    ];

    let currentPage = 0;
    const itemsPerPage = 4;
    const totalPages = Math.ceil(testimonials.length / itemsPerPage);
    let isAnimating = false; // Prevent spam clicking

    const testimoniGrid = document.querySelector('#ulasan .grid');
    const btnPrev = document.querySelector('#ulasan button:first-of-type');
    const btnNext = document.querySelector('#ulasan button:last-of-type');

    function generateStars(rating) {
        return '★'.repeat(rating);
    }

    function renderTestimonials(page, direction = 'none') {
        if (!testimoniGrid || isAnimating) return;

        const startIdx = page * itemsPerPage;
        const endIdx = startIdx + itemsPerPage;
        const currentTestimonials = testimonials.slice(startIdx, endIdx);

        // Jika ada animasi (next/prev), terapkan fade animation bergiliran
        if (direction === 'next' || direction === 'prev') {
            isAnimating = true;

            // Kartu lama fade out bergiliran
            testimoniGrid.classList.add('fade-out');

            // Tunggu sampai semua kartu fade out selesai (250ms + delay terakhir 180ms)
            setTimeout(() => {
                updateGridContent(currentTestimonials);
                testimoniGrid.classList.remove('fade-out');

                // Kartu baru fade in bergiliran
                testimoniGrid.classList.add('fade-in');

                // Tunggu sampai semua kartu fade in selesai (250ms + delay terakhir 180ms)
                setTimeout(() => {
                    testimoniGrid.classList.remove('fade-in');
                    isAnimating = false;
                }, 450);
            }, 450);

        } else {
            // Initial load tanpa animasi
            updateGridContent(currentTestimonials);
        }

        updateButtonStates();
        updateIndicators();
    }

    function updateGridContent(testimonials) {
        testimoniGrid.innerHTML = testimonials.map(testi => `
            <article class="group bg-white rounded-3xl shadow-sm border border-slate-100 p-6 flex flex-col h-full
                transition-all duration-300 ease-out
                hover:-translate-y-3 hover:shadow-xl hover:border-[#0E586D]/30">
                <div class="flex items-center gap-1 text-amber-400 text-sm mb-4">
                    ${generateStars(testi.rating).split('').map(star => `<span>${star}</span>`).join('')}
                </div>

                <h3 class="text-sm font-semibold text-slate-900 mb-2">
                    "${testi.title}"
                </h3>
                <p class="text-xs text-slate-500 leading-relaxed mb-6">
                    ${testi.content}
                </p>

                <div class="mt-auto pt-5 border-t border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold text-slate-900">${testi.name}</p>
                        <p class="text-[11px] text-slate-400">${testi.role}</p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr ${testi.gradient}
                        flex items-center justify-center text-white text-xs font-semibold
                        transition-all duration-300 group-hover:scale-105">
                        ${testi.initials}
                    </div>
                </div>
            </article>
        `).join('');
    }

    function updateButtonStates() {
        if (!btnPrev || !btnNext) return;

        if (currentPage === 0) {
            btnPrev.disabled = true;
            btnPrev.classList.add('opacity-50', 'cursor-not-allowed');
        } else {
            btnPrev.disabled = false;
            btnPrev.classList.remove('opacity-50', 'cursor-not-allowed');
        }

        if (currentPage === totalPages - 1) {
            btnNext.disabled = true;
            btnNext.classList.add('opacity-50', 'cursor-not-allowed');
        } else {
            btnNext.disabled = false;
            btnNext.classList.remove('opacity-50', 'cursor-not-allowed');
        }
    }

    // Event listener untuk tombol prev dengan animasi
    if (btnPrev) {
        btnPrev.addEventListener('click', function () {
            if (currentPage > 0 && !isAnimating) {
                currentPage--;
                renderTestimonials(currentPage, 'prev');

                setTimeout(() => {
                    document.querySelector('#ulasan').scrollIntoView({
                        behavior: 'smooth',
                        block: 'nearest'
                    });
                }, 100);
            }
        });
    }

    // Event listener untuk tombol next dengan animasi
    if (btnNext) {
        btnNext.addEventListener('click', function () {
            if (currentPage < totalPages - 1 && !isAnimating) {
                currentPage++;
                renderTestimonials(currentPage, 'next');

                setTimeout(() => {
                    document.querySelector('#ulasan').scrollIntoView({
                        behavior: 'smooth',
                        block: 'nearest'
                    });
                }, 100);
            }
        });
    }

    // Indicator dots
    const indicatorContainer = document.createElement('div');
    indicatorContainer.className = 'flex items-center justify-center gap-2 mt-8';
    indicatorContainer.id = 'testimoni-indicators';

    for (let i = 0; i < totalPages; i++) {
        const dot = document.createElement('button');
        dot.className = 'w-2 h-2 rounded-full transition-all duration-300';
        dot.style.backgroundColor = i === 0 ? '#0E586D' : '#CBD5E1';
        dot.setAttribute('aria-label', `Halaman ${i + 1}`);

        dot.addEventListener('click', function () {
            if (currentPage !== i && !isAnimating) {
                const direction = i > currentPage ? 'next' : 'prev';
                currentPage = i;
                renderTestimonials(currentPage, direction);
            }
        });
        indicatorContainer.appendChild(dot);
    }

    function updateIndicators() {
        const dots = indicatorContainer.querySelectorAll('button');
        dots.forEach((dot, idx) => {
            if (idx === currentPage) {
                dot.style.backgroundColor = '#0E586D';
                dot.style.width = '24px';
            } else {
                dot.style.backgroundColor = '#CBD5E1';
                dot.style.width = '8px';
            }
        });
    }

    const ulasanContainer = document.querySelector('#ulasan > div');
    if (ulasanContainer && !document.getElementById('testimoni-indicators')) {
        ulasanContainer.appendChild(indicatorContainer);
    }

    // Initial render tanpa animasi
    renderTestimonials(currentPage, 'none');

    // Keyboard navigation dengan animasi
    document.addEventListener('keydown', function (e) {
        if (isAnimating) return;

        const ulasanSection = document.querySelector('#ulasan');
        if (!ulasanSection) return;

        const rect = ulasanSection.getBoundingClientRect();
        const isInView = rect.top < window.innerHeight && rect.bottom > 0;

        if (isInView) {
            if (e.key === 'ArrowLeft' && currentPage > 0) {
                e.preventDefault();
                currentPage--;
                renderTestimonials(currentPage, 'prev');
            } else if (e.key === 'ArrowRight' && currentPage < totalPages - 1) {
                e.preventDefault();
                currentPage++;
                renderTestimonials(currentPage, 'next');
            }
        }
    });
});