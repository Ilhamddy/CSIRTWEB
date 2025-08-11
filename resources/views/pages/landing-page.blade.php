@extends('layouts.app-guest')

@section('title', 'Diskominfo Kabupaten Penajam Paser Utara')

@section('content')
    {{-- Hero --}}
    <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-8 pb-2 sm:py-24 ">
        <div class="swiper mySwiper rounded-2xl">
            <div class="swiper-wrapper rounded-2xl">
                <div class="swiper-slide">
                    <img src="{{ asset('img/landing/banner-kominfo.jpg') }}" alt=""
                        class="w-full lg:h-[500px] rounded-2xl object-cover">
                </div>
                <div class="swiper-slide"><img src="{{ asset('img/landing/banner-kominfo-2.jpg') }}" alt=""
                        class="w-full lg:h-[500px] object-cover rounded-2xl"></div>
                <div class="swiper-slide"><img src="{{ asset('img/landing/banner-kominfo.jpg') }}" alt=""
                        class="w-full lg:h-[500px] rounded-2xl object-cover">
                </div>
            </div>

            <!-- Navigasi & Pagination -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>

    </section>
    <section class="relative overflow-hidden">

        <div class="absolute inset-0 -z-10 bg-[radial-gradient(ellipse_at_top,rgba(16,185,129,0.08),transparent_60%)]">
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8 sm:py-24">
            {{-- <h2 class="mx-auto text-center text-2xl font-semibold tracking-tight text-emerald-600 mb-8 sm:text-3xl">About Us --}}
            </h2>
            <div class="grid gap-10 lg:grid-cols-2 lg:items-center">
                <div class="space-y-6">
                    <p
                        class="inline-flex items-center rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-xs font-medium text-emerald-700">
                        Layanan Informasi Publik
                    </p>
                    <h1 class="text-3xl font-bold tracking-tight sm:text-4xl lg:text-5xl">
                        Dinas Komunikasi dan Informatika Kabupaten Penajam Paser Utara
                    </h1>
                    <p class="max-w-2xl text-neutral-600 text-base sm:text-lg">
                        Mewujudkan tata kelola pemerintahan digital yang transparan, akuntabel, dan berorientasi pada
                        pelayanan publik.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="#layanan"
                            class="inline-flex items-center justify-center rounded-md bg-emerald-600 px-5 py-3 text-sm font-medium text-white shadow-sm hover:bg-emerald-700 focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/50">
                            Jelajahi Layanan
                        </a>
                        <a href="#kontak"
                            class="inline-flex items-center justify-center rounded-md border border-neutral-200 bg-white px-5 py-3 text-sm font-medium hover:bg-neutral-50 focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/40">
                            Hubungi Kami
                        </a>
                    </div>
                    <div class="flex flex-wrap items-center gap-6 pt-2 text-sm text-neutral-600">
                        <div class="flex items-center gap-2">
                            <span class="inline-block h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                            Respon cepat
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="inline-block h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                            Transparan
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="inline-block h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                            Terpercaya
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="aspect-[16/10] w-full rounded-xl border border-neutral-200 bg-white shadow-sm">
                        <div class="h-full w-full grid place-items-center p-6 text-center">
                            <div>
                                <div
                                    class="mx-auto mb-4 h-12 w-12 rounded-lg bg-emerald-100 text-emerald-700 grid place-items-center text-lg font-bold">
                                    DK</div>
                                <p class="text-neutral-800 font-medium">Portal Informasi dan Layanan Digital</p>
                                <p class="text-neutral-600 text-sm mt-1">Akses data, dokumen, dan pengaduan secara daring.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="pointer-events-none absolute -right-4 -bottom-4 h-28 w-28 rounded-xl bg-emerald-100/60 blur-0">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Layanan --}}
    <section id="layanan" class="py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-10 flex items-end justify-between">
                <div>
                    <h2 class="text-2xl font-semibold tracking-tight sm:text-3xl text-emerald-600">Layanan Utama</h2>
                    <p class="mt-2 text-neutral-600">Kemudahan akses layanan informasi publik secara terpadu.</p>
                </div>
                <a href="#"
                    class="hidden sm:inline-flex text-sm font-medium text-emerald-700 hover:underline hover:text-emerald-800">Lihat
                    semua →</a>
            </div>
            <div class="grid gap-4 sm:gap-6 md:grid-cols-2 lg:grid-cols-3">
                {{-- Card --}}
                <a href="#"
                    class="group rounded-xl border border-neutral-200 bg-white p-5 shadow-sm hover:shadow-md transition focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/40">
                    <div
                        class="mb-3 inline-flex h-10 w-10 items-center justify-center rounded-md bg-emerald-100 text-emerald-700 font-semibold">
                        IP</div>
                    <h3 class="text-base font-semibold">Informasi Publik</h3>
                    <p class="mt-1 text-sm text-neutral-600">Dokumen, data, dan keterbukaan informasi untuk masyarakat.</p>
                    <span class="mt-3 inline-flex text-sm font-medium text-emerald-700 group-hover:underline">Akses layanan
                        →</span>
                </a>

                <a href="#"
                    class="group rounded-xl border border-neutral-200 bg-white p-5 shadow-sm hover:shadow-md transition focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/40">
                    <div
                        class="mb-3 inline-flex h-10 w-10 items-center justify-center rounded-md bg-emerald-100 text-emerald-700 font-semibold">
                        PG</div>
                    <h3 class="text-base font-semibold">Pengaduan Masyarakat</h3>
                    <p class="mt-1 text-sm text-neutral-600">Sampaikan aduan dan aspirasi Anda secara mudah dan cepat.</p>
                    <span class="mt-3 inline-flex text-sm font-medium text-emerald-700 group-hover:underline">Sampaikan
                        aduan →</span>
                </a>

                <a href="#"
                    class="group rounded-xl border border-neutral-200 bg-white p-5 shadow-sm hover:shadow-md transition focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/40">
                    <div
                        class="mb-3 inline-flex h-10 w-10 items-center justify-center rounded-md bg-emerald-100 text-emerald-700 font-semibold">
                        SI</div>
                    <h3 class="text-base font-semibold">Layanan Sistem Informasi</h3>
                    <p class="mt-1 text-sm text-neutral-600">Permohonan integrasi, perbaikan, dan pengembangan SI.</p>
                    <span class="mt-3 inline-flex text-sm font-medium text-emerald-700 group-hover:underline">Ajukan
                        permohonan →</span>
                </a>

                <a href="#"
                    class="group rounded-xl border border-neutral-200 bg-white p-5 shadow-sm hover:shadow-md transition focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/40">
                    <div
                        class="mb-3 inline-flex h-10 w-10 items-center justify-center rounded-md bg-emerald-100 text-emerald-700 font-semibold">
                        PP</div>
                    <h3 class="text-base font-semibold">Publikasi & Pers</h3>
                    <p class="mt-1 text-sm text-neutral-600">Rilis berita, agenda, dan dokumentasi kegiatan pemerintah.</p>
                    <span class="mt-3 inline-flex text-sm font-medium text-emerald-700 group-hover:underline">Lihat
                        publikasi →</span>
                </a>

                <a href="#"
                    class="group rounded-xl border border-neutral-200 bg-white p-5 shadow-sm hover:shadow-md transition focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/40">
                    <div
                        class="mb-3 inline-flex h-10 w-10 items-center justify-center rounded-md bg-emerald-100 text-emerald-700 font-semibold">
                        DS</div>
                    <h3 class="text-base font-semibold">Data & Statistik</h3>
                    <p class="mt-1 text-sm text-neutral-600">Statistik, dashboard, dan data sektoral kabupaten.</p>
                    <span class="mt-3 inline-flex text-sm font-medium text-emerald-700 group-hover:underline">Lihat data
                        →</span>
                </a>

                <a href="#"
                    class="group rounded-xl border border-neutral-200 bg-white p-5 shadow-sm hover:shadow-md transition focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/40">
                    <div
                        class="mb-3 inline-flex h-10 w-10 items-center justify-center rounded-md bg-emerald-100 text-emerald-700 font-semibold">
                        TI</div>
                    <h3 class="text-base font-semibold">TIK Pemerintah</h3>
                    <p class="mt-1 text-sm text-neutral-600">Infrastruktur TIK, domain, email dinas, dan keamanan siber.</p>
                    <span class="mt-3 inline-flex text-sm font-medium text-emerald-700 group-hover:underline">Pelajari
                        →</span>
                </a>
            </div>
        </div>
    </section>

    {{-- Tentang --}}
    {{-- <section id="tentang" class="py-16 sm:py-20 bg-neutral-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-2 lg:items-center">
                <div class="space-y-4">
                    <h2 class="text-2xl font-semibold tracking-tight sm:text-3xl">Tentang Diskominfo</h2>
                    <p class="text-neutral-700">
                        Diskominfo berperan strategis dalam pengelolaan informasi publik, layanan komunikasi pemerintahan,
                        serta
                        penyelenggaraan infrastruktur dan keamanan TIK daerah.
                    </p>
                    <ul class="mt-2 space-y-2 text-neutral-700">
                        <li class="flex gap-2"><span class="text-emerald-600">•</span><span>Transparansi dan keterbukaan
                                informasi.</span></li>
                        <li class="flex gap-2"><span class="text-emerald-600">•</span><span>Pelayanan pengaduan yang
                                responsif.</span></li>
                        <li class="flex gap-2"><span class="text-emerald-600">•</span><span>Penguatan transformasi digital
                                pemerintah.</span></li>
                    </ul>
                </div>
                <div class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm">
                    <dl class="grid grid-cols-2 gap-6">
                        <div>
                            <dt class="text-sm text-neutral-600">Portal terintegrasi</dt>
                            <dd class="text-3xl font-semibold">24/7</dd>
                        </div>
                        <div>
                            <dt class="text-sm text-neutral-600">Waktu respons rata-rata</dt>
                            <dd class="text-3xl font-semibold">
                                < 24 jam</dd>
                        </div>
                        <div>
                            <dt class="text-sm text-neutral-600">Layanan aktif</dt>
                            <dd class="text-3xl font-semibold">30+</dd>
                        </div>
                        <div>
                            <dt class="text-sm text-neutral-600">Kepuasan pengguna</dt>
                            <dd class="text-3xl font-semibold">96%</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- Berita --}}
    <section id="berita" class="py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mb-10 flex items-end justify-between">
                <div class="">
                    <h2 class="text-2xl font-semibold tracking-tight sm:text-3xl text-emerald-600">Berita Terbaru</h2>
                    <p class="mt-2 text-neutral-600">Informasi kegiatan dan rilis resmi Diskominfo Kabupaten.</p>
                </div>
                <a href="#"
                    class="hidden sm:inline-flex text-sm font-medium text-emerald-700 hover:underline hover:text-emerald-800">Lihat
                    semua →</a>
            </div>
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($berita as $post)
                    <x-card-post :post="$post" />
                @endforeach
            </div>
            {{-- <div class="mt-6 text-center">
                <a href="{{ route('posts.index') }}"
                    class="inline-flex items-center justify-center rounded-md text-emerald-600 px-5 py-3 text-sm font-medium underline  hover:bg-emerald-700 hover:text-white focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/50">
                    Lihat Semua Berita
                </a>
            </div> --}}
        </div>
    </section>

    {{-- Galeri Foto --}}
    <section>
        {{-- @php
            $photos = [
                [
                    'src' =>
                        'https://images.unsplash.com/photo-1545315176-107735a5d211?q=80&w=1200&auto=format&fit=crop',
                    'alt' => 'Kegiatan 1',
                    'caption' => 'Rapat koordinasi',
                ],
                [
                    'src' =>
                        'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1200&auto=format&fit=crop',
                    'alt' => 'Kegiatan 2',
                    'caption' => 'Konferensi pers',
                ],
                [
                    'src' =>
                        'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?q=80&w=1200&auto=format&fit=crop',
                    'alt' => 'Kegiatan 3',
                    'caption' => 'Pelayanan publik',
                ],
                [
                    'src' =>
                        'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=1200&auto=format&fit=crop',
                    'alt' => 'Kegiatan 4',
                    'caption' => 'Sosialisasi',
                ],
                [
                    'src' =>
                        'https://images.unsplash.com/photo-1560264251-0bd3e9c9a2d5?q=80&w=1200&auto=format&fit=crop',
                    'alt' => 'Kegiatan 5',
                    'caption' => 'Pelatihan TIK',
                ],
                [
                    'src' =>
                        'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=1200&auto=format&fit=crop',
                    'alt' => 'Kegiatan 6',
                    'caption' => 'Kunjungan kerja',
                ],
                [
                    'src' =>
                        'https://images.unsplash.com/photo-1521791055366-0d553872125f?q=80&w=1200&auto=format&fit=crop',
                    'alt' => 'Kegiatan 7',
                    'caption' => 'Diskusi publik',
                ],
                [
                    'src' =>
                        'https://images.unsplash.com/photo-1511561411317-51f8ce4cd6f1?q=80&w=1200&auto=format&fit=crop',
                    'alt' => 'Kegiatan 8',
                    'caption' => 'Penandatanganan',
                ],
                [
                    'src' =>
                        'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?q=80&w=1200&auto=format&fit=crop',
                    'alt' => 'Kegiatan 9',
                    'caption' => 'Tambahan (tidak ditampilkan karena >8)',
                ],
            ];
        @endphp --}}

        <section class="py-16 sm:py-20">

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-8">

                <div class="mb-10 flex items-end justify-between">
                    <div class="">
                        <h2 class="text-2xl font-semibold tracking-tight sm:text-3xl text-emerald-600">Foto Terbaru</h2>
                        <p class="mt-2 text-neutral-600">Foto kegiatan dan rilis resmi Diskominfo Kabupaten Penajam Paser
                            Utara.</p>
                    </div>
                    <a href="{{ route('berita-page') }}"
                        class="hidden sm:inline-flex text-sm font-medium text-emerald-700 hover:underline hover:text-emerald-800">Lihat
                        semua →</a>
                </div>
                <x-photo-slider :photos="$photos" title="Galeri Kegiatan" />
                {{-- <x-photo-swiper :photos="$photos" title="Galeri Kegiatan" /> --}}
                {{-- <div class="mt-6 text-center">
                    <a href="{{ route('posts.index') }}"
                        class="inline-flex items-center justify-center rounded-md text-emerald-600 px-5 py-3 text-sm font-medium underline  hover:bg-emerald-700 hover:text-white focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/50">
                        Lihat Semua Foto
                    </a>
                </div> --}}

                {{-- <x-youtube-embed video-id="19g66ezsKAg" title="Profil Diskominfo" /> --}}
            </div>
        </section>
    </section>

    {{-- Galeri Video --}}
    <section>


        <section class="py-16 sm:py-20">

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-8">

                <div class="mb-10 flex items-end justify-between">
                    <div class="">
                        <h2 class="text-2xl font-semibold tracking-tight sm:text-3xl text-emerald-600">Video Terbaru</h2>
                        <p class="mt-2 text-neutral-600">Foto kegiatan dan rilis resmi Diskominfo Kabupaten Penajam Paser
                            Utara.</p>
                    </div>
                    <a href="#"
                        class="hidden sm:inline-flex text-sm font-medium text-emerald-700 hover:underline hover:text-emerald-800">Lihat
                        semua →</a>
                </div>
                <x-video-gallery title="Video Kegiatan" :videos="$videos" />

            </div>
        </section>
    </section>

    {{-- Kontak --}}
    {{-- <section id="kontak" class="py-16 sm:py-20 bg-neutral-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-2">
                <div>
                    <h2 class="text-2xl font-semibold tracking-tight sm:text-3xl">Kontak Kami</h2>
                    <p class="mt-2 text-neutral-700">Silakan hubungi kami untuk pertanyaan, masukan, atau kerja sama.</p>
                    <div class="mt-6 space-y-2 text-neutral-800">
                        <p class="text-sm"><span class="font-medium">Alamat:</span> Jl. Contoh No. 123, Kabupaten</p>
                        <p class="text-sm"><span class="font-medium">Email:</span> diskominfo@kab.go.id</p>
                        <p class="text-sm"><span class="font-medium">Telepon:</span> (021) 123456</p>
                    </div>
                </div>
                <form action="#" method="post" class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm">
                    @csrf
                    <div class="grid gap-4">
                        <div>
                            <label for="nama" class="mb-1 block text-sm font-medium">Nama</label>
                            <input id="nama" name="nama" type="text"
                                class="block w-full rounded-md border-neutral-200 focus:border-emerald-500 focus:ring-emerald-500"
                                placeholder="Nama lengkap" />
                        </div>
                        <div>
                            <label for="email" class="mb-1 block text-sm font-medium">Email</label>
                            <input id="email" name="email" type="email"
                                class="block w-full rounded-md border-neutral-200 focus:border-emerald-500 focus:ring-emerald-500"
                                placeholder="nama@email.com" />
                        </div>
                        <div>
                            <label for="pesan" class="mb-1 block text-sm font-medium">Pesan</label>
                            <textarea id="pesan" name="pesan" rows="4"
                                class="block w-full rounded-md border-neutral-200 focus:border-emerald-500 focus:ring-emerald-500"
                                placeholder="Tulis pesan Anda"></textarea>
                        </div>
                        <button type="submit"
                            class="inline-flex items-center justify-center rounded-md bg-emerald-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-emerald-700 focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/50">
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section> --}}
@endsection
