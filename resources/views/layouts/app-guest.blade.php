<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#040e69ff" />
    <meta name="description"
        content="Dinas Komunikasi dan Informatika Kabupaten - Transparan, responsif, dan inovatif." />
    <title>@yield('title', 'CSIRT Diskominfo Kabupaten')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />


    <!-- Tambahkan sebelum file CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.userway.org/widget.js" data-account="y4OupPNCiv"></script>
        <link rel="icon" type="image/png" href="{{ asset('img/landing/CSIRTLOGO.PNG') }}">
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
            border-top: 6px solid #040e69ff;
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
    @include('components.menu')

    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>

    <main id="content" class="relative">
        @yield('content')
    </main>

    <footer class="mt-8  ">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#0b1891ff" fill-opacity="1"
                d="M0,128L40,144C80,160,160,192,240,213.3C320,235,400,245,480,234.7C560,224,640,192,720,186.7C800,181,880,203,960,218.7C1040,235,1120,245,1200,240C1280,235,1360,213,1400,202.7L1440,192L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
            </path>
        </svg>
        <div class="bg-[#0b1891ff] -mt-2 lg:-mt-16">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-10 ">
                <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
                    <div class="space-y-1">
                        <p class="text-sm text-neutral-50 font-semibold">CSIRT Diskominfo Kabupaten</p>
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
                <div class="mt-6 text-xs text-neutral-100">© <span>{{ date('Y') }}</span> CSIRT Diskominfo Kabupaten.
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
