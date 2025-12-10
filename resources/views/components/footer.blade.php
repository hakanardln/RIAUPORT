<!-- ========== FOOTER ========== -->
<footer class="bg-white border-t border-gray-200 mt-0 w-full">
    <div class="w-full">
        <div class="max-w-7xl mx-auto px-6 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">

                <div class="lg:col-span-1">
                    <div class="mb-4">
                        <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort" class="h-16 mb-3">
                    </div>
                    <p class="text-gray-600 text-sm mb-6 leading-relaxed">
                        Platform terpadu untuk menemukan layanan travel terbaik di
                        Riau.
                        Menghubungkan penumpang dengan sopir travel terpercaya.
                    </p>
                    <div class="flex gap-4">
                        <a href="#"
                            class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-100 text-gray-600 hover:bg-[#3FA6C4] hover:text-white transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-100 text-gray-600 hover:bg-[#3FA6C4] hover:text-white transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-100 text-gray-600 hover:bg-[#3FA6C4] hover:text-white transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M7.8 2h8.4A4.8 4.8 0 0121 6.8v8.4A4.8 4.8 0 0116.2 20H7.8A4.8 4.8 0 013 15.2V6.8A4.8 4.8 0 017.8 2zm0 2A2.8 2.8 0 005 6.8v8.4A2.8 2.8 0 007.8 18h8.4a2.8 2.8 0 002.8-2.8V6.8A2.8 2.8 0 0016.2 4H7.8zm4.2 2.5a4.5 4.5 0 11-.001 9.001A4.5 4.5 0 0112 6.5zm4.75-2.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-gray-900 font-semibold text-base mb-4">Navigasi
                    </h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-[#3FA6C4]">Home</a>
                        </li>
                        <li><a href="{{ route('about') }}" class="text-gray-600 hover:text-[#3FA6C4]">Tentang
                                Kami</a></li>
                        <li><a href="#fitur" class="text-gray-600 hover:text-[#3FA6C4]">Fitur</a>
                        </li>
                        <li><a href="{{ route('contact') }}" class="text-gray-600 hover:text-[#3FA6C4]">Kontak</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-gray-900 font-semibold text-base mb-4">Layanan
                    </h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-[#3FA6C4]">Cari
                                Travel</a></li>
                        <li><a href="{{ route('register.sopir.show') }}"
                                class="text-gray-600 hover:text-[#3FA6C4]">Daftar
                                Sopir</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-[#3FA6C4]">Rute
                                Populer</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-[#3FA6C4]">FAQ</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-gray-900 font-semibold text-base mb-4">Hubungi
                        Kami</h3>
                    <ul class="space-y-3 text-sm">
                        <li class="text-gray-600 flex items-start gap-2">
                            <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Riau, Indonesia</span>
                        </li>
                        <li class="text-gray-600 flex items-center gap-2">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>info@riauport.com</span>
                        </li>
                        <li class="text-gray-600 flex items-center gap-2">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>+62 823-1141-2523</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-gray-600 text-sm text-center md:text-left">
                © 2025 RiauPort. All rights reserved.
            </p>
            <div class="flex items-center gap-6 text-sm">
                <a href="#" class="text-gray-600 hover:text-[#3FA6C4] transition-colors duration-200">
                    Syarat & Ketentuan
                </a>
                <span class="text-gray-400">·</span>
                <a href="#" class="text-gray-600 hover:text-[#3FA6C4] transition-colors duration-200">
                    Kebijakan Privasi
                </a>
            </div>
        </div>
    </div>
</footer>
