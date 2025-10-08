<header
        class="sticky top-0 z-40 w-full border-b border-neutral-200 bg-white/80 backdrop-blur supports-[backdrop-filter]:bg-white/60">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2 font-semibold tracking-tight">
                <span
                    class="inline-flex h-12 w-12 items-center justify-center rounded-xl bg-neutral-100 border-emerald-600 border mx-auto py-auto text-white  place-items-center text-sm font-bold">
                    <img src="{{ asset('img/landing/logo-ppu.png') }}" alt="Logo Penajam Paser Utara"
                        class="w-8 h-8 my-auto object-contain"></span>
                {{-- <span class="text-base sm:text-lg">CSIRT Diskominfo Kabupaten</span>
                <span class="sr-only">Beranda</span> --}}
            </a>

            {{-- Desktop Navigation with Submenus --}}
            <nav aria-label="Navigasi utama" class="hidden md:flex items-center gap-6 text-sm">
                {{-- Profil (Dropdown) --}}
                <a href="{{ route('landing-page') }}"
                    class="rounded-md px-2 py-2 cursor-pointer {{ Route::is('landing-page') ? 'text-emerald-600' : '' }} hover:text-emerald-600">Beranda</a>
                <div class="relative" data-dropdown>
                    <button type="button"
                        class="inline-flex items-center gap-1 cursor-pointer hover:text-emerald-600 focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/40 rounded"
                        data-dropdown-button aria-haspopup="true" aria-expanded="false">
                        <span>Profil</span>
                        <span class="transition-transform text-xs" data-caret>▾</span>
                    </button>
                    <div class="absolute left-0 top-full mt-0 w-64 rounded-lg border border-neutral-200 bg-white shadow-lg p-2 hidden"
                        role="menu" aria-label="Submenu Profil" data-dropdown-menu>
                        {{-- <a href="#tentang" role="menuitem"
                            class="block rounded-md px-3 py-2 hover:bg-neutral-200">Tentang Kami</a> --}}
                        <a href="{{ route('front.visi-misi.index') }}" role="menuitem"
                            class="block rounded-md px-3 py-2 hover:bg-neutral-200">Visi &
                            Misi</a>
                        <a href="{{ route('front.struktur-organisasi.index') }}" role="menuitem"
                            class="block rounded-md px-3 py-2 hover:bg-neutral-200">Struktur Organisasi</a>
                        <a href="{{ route('front.tupoksi.index') }}" role="menuitem"
                            class="block rounded-md px-3 py-2 hover:bg-neutral-200">Tupoksi</a>
                        <a href="#" role="menuitem"
                            class="block rounded-md px-3 py-2 hover:bg-neutral-200">Regulasi</a>
                    </div>
                </div>
                <a href="{{ route('berita-page') }}"
                    class="rounded-md px-2 py-2 cursor-pointer {{ Route::is('berita-page') ? 'text-emerald-600' : '' }} hover:text-emerald-600">Berita</a>

                {{-- Layanan (Dropdown) --}}
                <!-- <div class="relative" data-dropdown>
                    <button type="button"
                        class="inline-flex items-center gap-1 cursor-pointer {{ Request::is('layanan*') ? 'text-emerald-600' : '' }} hover:text-emerald-600 focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/40 rounded"
                        data-dropdown-button aria-haspopup="true" aria-expanded="false">
                        <span>Layanan</span>
                        <span class="transition-transform text-xs" data-caret>▾</span>
                    </button>
                    <div class="absolute left-0 top-full mt-0 w-72 rounded-lg border border-neutral-200 bg-white shadow-lg p-2 hidden"
                        role="menu" aria-label="Submenu Layanan" data-dropdown-menu>
                        @foreach ($menuLayanan as $layanan)
                            @php
                                $url = !empty($layanan->link)
                                    ? $layanan->link
                                    : route('front.layanan.show', $layanan->slug);
                            @endphp

                            <a href="{{ $url }}" role="menuitem"
                                class="block rounded-md px-3 py-2 hover:bg-neutral-200">
                                {{ $layanan->title }}
                            </a>
                        @endforeach
                        {{-- <a href="#layanan" role="menuitem"
                            class="block rounded-md px-3 py-2 hover:bg-neutral-50">Informasi Publik</a>
                        <a href="#layanan" role="menuitem"
                            class="block rounded-md px-3 py-2 hover:bg-neutral-50">Pengaduan Masyarakat</a>
                        <a href="#layanan" role="menuitem" class="block rounded-md px-3 py-2 hover:bg-neutral-50">Data &
                            Statistik</a>
                        <a href="#layanan" role="menuitem" class="block rounded-md px-3 py-2 hover:bg-neutral-50">Sistem
                            Informasi</a> --}}
                    </div>
                </div> -->

                {{-- Publikasi (Dropdown) --}}
                <div class="relative" data-dropdown>
                    <button type="button"
                        class="inline-flex items-center gap-1 cursor-pointer hover:text-emerald-600 focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/40 rounded"
                        data-dropdown-button aria-haspopup="true" aria-expanded="false">
                        <span>Informasi</span>
                        <span class="transition-transform text-xs" data-caret>▾</span>
                    </button>
                    <div class="absolute left-0 top-full mt-0 w-64 rounded-lg border border-neutral-200 bg-white shadow-lg p-2 hidden"
                        role="menu" aria-label="Submenu Publikasi" data-dropdown-menu>
                        <a href="#berita" role="menuitem" class="block rounded-md px-3 py-2 hover:bg-neutral-50">Menara
                            Telekomunikasi</a>
                        <a href="{{ route('front.agenda.index') }}" role="menuitem"
                            class="block rounded-md px-3 py-2 hover:bg-neutral-50">Agenda</a>
                        <a href="#" role="menuitem"
                            class="block rounded-md px-3 py-2 hover:bg-neutral-50">CCTV</a>
                    </div>
                </div>
                <!-- <div class="relative" data-dropdown>
                    <button type="button"
                        class="inline-flex items-center gap-1 cursor-pointer hover:text-emerald-600 focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/40 rounded"
                        data-dropdown-button aria-haspopup="true" aria-expanded="false">
                        <span>Publikasi</span>
                        <span class="transition-transform text-xs" data-caret>▾</span>
                    </button>
                    <div class="absolute left-0 top-full mt-0 w-64 rounded-lg border border-neutral-200 bg-white shadow-lg p-2 hidden"
                        role="menu" aria-label="Submenu Publikasi" data-dropdown-menu>
                        {{-- <a href="#berita" role="menuitem"
                            class="block rounded-md px-3 py-2 hover:bg-neutral-50">Berita</a> --}}
                        <a href="{{ route('front.agenda.index') }}" role="menuitem"
                            class="block rounded-md px-3 py-2 hover:bg-neutral-50">Agenda</a>
                        {{-- <a href="#" role="menuitem"
                            class="block rounded-md px-3 py-2 hover:bg-neutral-50">Galeri</a> --}}
                    </div>
                </div> -->

                <div class="relative" data-dropdown>
                    <button type="button"
                        class="inline-flex items-center gap-1 cursor-pointer {{ Request::is('foto*') || Request::is('video*') ? 'text-emerald-600' : '' }} hover:text-emerald-600 focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/40 rounded"
                        data-dropdown-button aria-haspopup="true" aria-expanded="false">
                        <span>Gallery</span>
                        <span class="transition-transform text-xs" data-caret>▾</span>
                    </button>
                    <div class="absolute left-0 top-full mt-0 w-64 rounded-lg border border-neutral-200 bg-white shadow-lg p-2 hidden"
                        role="menu" aria-label="Submenu Gallery" data-dropdown-menu>
                        <a href="{{ route('front.gallery.foto') }}" role="menuitem"
                            class="block rounded-md px-3 py-2 hover:bg-neutral-50">Foto</a>
                        <a href="{{ route('front.gallery.video') }}" role="menuitem"
                            class="block rounded-md px-3 py-2 hover:bg-neutral-50">Video</a>
                    </div>
                </div>
                 {{-- RFC --}}

                <a href="{{ route('front.rfc.index') }}"
                             class="hover:text-emerald-600 cursor-pointer {{ Route::is('front.contact.index') ? 'text-emerald-600' : '' }} focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/40 rounded">RFC 2350</a>


                {{-- Kontak (Single link) --}}
                <a href="{{ route('front.contact.index') }}"
                    class="hover:text-emerald-600 cursor-pointer {{ Route::is('front.contact.index') ? 'text-emerald-600' : '' }} focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/40 rounded">Kontak</a>
            </nav>

            {{-- CTA + Mobile Toggle --}}
            <div class="flex items-center gap-2">
                <a href="#layanan"
                    class="hidden sm:inline-flex   items-center rounded-md bg-[#0b1891ff] px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-emerald-700 focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/50 transition">
                    Layanan Publik
                </a>
                <button aria-label="Buka menu"
                    class="md:hidden inline-flex h-10 w-10 items-center justify-center rounded-md border border-neutral-200 hover:bg-neutral-50 focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/40"
                    data-toggle="mobile-menu">
                    <span class="i">≡</span>
                </button>
            </div>
        </div>

        {{-- Mobile Menu with Submenus --}}
        <div id="mobile-menu" class="md:hidden hidden border-t border-neutral-200 bg-white">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-3 flex flex-col gap-1 text-sm">
                {{-- Profil --}}
                <div class="py-1">
                    <button type="button"
                        class="w-full flex items-center justify-between rounded-md px-2 py-2 hover:bg-neutral-50"
                        data-submenu-toggle aria-expanded="false">
                        <span>Profil</span>
                        <span class="transition-transform text-xs" data-caret>▾</span>
                    </button>
                    <div class="pl-4 border-l border-neutral-200 ml-2 mt-1 space-y-1 hidden" data-submenu>
                        <a href="#tentang" class="block rounded-md px-2 py-2 hover:bg-neutral-50">Tentang Kami</a>
                        <a href="{{ route('front.visi-misi.index') }}"
                            class="block rounded-md px-2 py-2 hover:bg-neutral-50">Visi & Misi</a>
                        <a href="#" class="block rounded-md px-2 py-2 hover:bg-neutral-50">Struktur
                            Organisasi</a>
                        <a href="#" class="block rounded-md px-2 py-2 hover:bg-neutral-50">Regulasi</a>
                    </div>
                </div>

                {{-- Layanan --}}
                <div class="py-1">
                    <button type="button"
                        class="w-full flex items-center justify-between rounded-md px-2 py-2 hover:bg-neutral-50"
                        data-submenu-toggle aria-expanded="false">
                        <span>Layanan</span>
                        <span class="transition-transform text-xs" data-caret>▾</span>
                    </button>
                    <div class="pl-4 border-l border-neutral-200 ml-2 mt-1 space-y-1 hidden" data-submenu>
                        <a href="#layanan" class="block rounded-md px-2 py-2 hover:bg-neutral-50">Informasi Publik</a>
                        <a href="#layanan" class="block rounded-md px-2 py-2 hover:bg-neutral-50">Pengaduan
                            Masyarakat</a>
                        <a href="#layanan" class="block rounded-md px-2 py-2 hover:bg-neutral-50">Data & Statistik</a>
                        <a href="#layanan" class="block rounded-md px-2 py-2 hover:bg-neutral-50">Sistem Informasi</a>
                    </div>
                </div>

                {{-- Publikasi --}}
                <!-- <div class="py-1">
                    <button type="button"
                        class="w-full flex items-center justify-between rounded-md px-2 py-2 hover:bg-neutral-50"
                        data-submenu-toggle aria-expanded="false">
                        <span>Publikasi</span>
                        <span class="transition-transform text-xs" data-caret>▾</span>
                    </button>
                    <div class="pl-4 border-l border-neutral-200 ml-2 mt-1 space-y-1 hidden" data-submenu>
                        <a href="#berita" class="block rounded-md px-2 py-2 hover:bg-neutral-50">Berita</a>
                        <a href="{{ route('front.agenda.index') }}"
                            class="block rounded-md px-2 py-2 hover:bg-neutral-50">Agenda</a>
                        <a href="#" class="block rounded-md px-2 py-2 hover:bg-neutral-50">Galeri</a>
                    </div>
                </div> -->
                {{-- RFC --}}

                <a href="{{ route('front.rfc.index') }}"
                    class="rounded-md px-2 py-2 hover:bg-neutral-50">RFC 2350</a>
                {{-- Kontak --}}
                <a href="{{ route('front.contact.index') }}"
                    class="rounded-md px-2 py-2 hover:bg-neutral-50">Kontak</a>
            </div>
        </div>
    </header>