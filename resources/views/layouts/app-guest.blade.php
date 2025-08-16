<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#10b981" />
    <meta name="description"
        content="Dinas Komunikasi dan Informatika Kabupaten - Transparan, responsif, dan inovatif." />
    <title>@yield('title', 'Diskominfo Kabupaten')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />


    <!-- Tambahkan sebelum file CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.userway.org/widget.js" data-account="y4OupPNCiv"></script>


    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('style')
    <style>
        /* Preloader full screen */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        /* Animasi loading (spinner) */
        .spinner {
            border: 6px solid #f3f3f3;
            border-top: 6px solid #009966;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 0.5s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="min-h-dvh bg-white text-neutral-900 antialiased">
    <header
        class="sticky top-0 z-40 w-full border-b border-neutral-200 bg-white/80 backdrop-blur supports-[backdrop-filter]:bg-white/60">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2 font-semibold tracking-tight">
                <span
                    class="inline-flex h-12 w-12 items-center justify-center rounded-xl bg-neutral-100 border-emerald-600 border mx-auto py-auto text-white  place-items-center text-sm font-bold">
                    <img src="{{ asset('img/landing/logo-ppu.png') }}" alt="Logo Penajam Paser Utara"
                        class="w-8 h-8 my-auto object-contain"></span>
                {{-- <span class="text-base sm:text-lg">Diskominfo Kabupaten</span>
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
                <div class="relative" data-dropdown>
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
                </div>

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
                <div class="relative" data-dropdown>
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
                </div>

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

                {{-- Kontak (Single link) --}}
                <a href="{{ route('front.contact.index') }}"
                    class="hover:text-emerald-600 cursor-pointer {{ Route::is('front.contact.index') ? 'text-emerald-600' : '' }} focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/40 rounded">Kontak</a>
            </nav>

            {{-- CTA + Mobile Toggle --}}
            <div class="flex items-center gap-2">
                <a href="#layanan"
                    class="hidden sm:inline-flex   items-center rounded-md bg-emerald-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-emerald-700 focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/50 transition">
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
                <div class="py-1">
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
                </div>

                {{-- Kontak --}}
                <a href="{{ route('front.contact.index') }}"
                    class="rounded-md px-2 py-2 hover:bg-neutral-50">Kontak</a>
            </div>
        </div>
    </header>

    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>

    <main id="content" class="relative">
        @yield('content')
    </main>

    <footer class="mt-8  ">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#009966" fill-opacity="1"
                d="M0,128L40,144C80,160,160,192,240,213.3C320,235,400,245,480,234.7C560,224,640,192,720,186.7C800,181,880,203,960,218.7C1040,235,1120,245,1200,240C1280,235,1360,213,1400,202.7L1440,192L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
            </path>
        </svg>
        <div class="bg-emerald-600 -mt-2 lg:-mt-16">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-10 ">
                <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
                    <div class="space-y-1">
                        <p class="text-sm text-neutral-50 font-semibold">Diskominfo Kabupaten</p>
                        <p class="text-sm text-neutral-100">Transparan, responsif, dan inovatif dalam pelayanan
                            informasi.
                        </p>
                    </div>
                    <div class="flex items-center gap-4 text-sm text-neutral-100">
                        <a href="#kontak" class="hover:text-emerald-700">Kontak</a>
                        <span aria-hidden="true">•</span>
                        <a href="#" class="hover:text-emerald-700">Kebijakan Privasi</a>
                        <span aria-hidden="true">•</span>
                        <a href="#" class="hover:text-emerald-700">Syarat Layanan</a>
                    </div>
                </div>
                <div class="mt-6 text-xs text-neutral-100">© <span>{{ date('Y') }}</span> Diskominfo Kabupaten.
                    Seluruh
                    hak cipta.</div>
            </div>
        </div>
    </footer>

    @stack('scripts')
    <script>
        // Hilangkan preloader setelah halaman selesai dimuat
        window.addEventListener('load', () => {
            document.getElementById('preloader').style.display = 'none';
        });

        // Jika ingin muncul saat klik link (pindah halaman)
        document.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', e => {
                if (link.target !== "_blank" && link.href) {
                    document.getElementById('preloader').style.display = 'flex';
                }
            });
        });
    </script>
</body>

</html>
