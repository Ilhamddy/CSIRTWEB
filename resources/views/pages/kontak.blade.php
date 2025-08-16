@extends('layouts.app-guest')

@section('title', 'Kontak - Diskominfo Kabupaten')

@section('content')
    {{-- Hero Section --}}
    {{-- <section class="relative bg-gradient-to-br from-emerald-50 to-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16 sm:py-20">
            <div class="text-center">
                <h1 class="text-3xl font-bold tracking-tight sm:text-4xl lg:text-5xl">
                    Hubungi Kami
                </h1>
                <p class="mt-4 max-w-2xl mx-auto text-neutral-600 text-base sm:text-lg">
                    Kami siap membantu Anda. Sampaikan pertanyaan, saran, atau pengaduan melalui formulir di bawah ini.
                </p>
            </div>
        </div>
    </section> --}}
    <section>
        @php
            $title = 'Hubungi Kami';
            $subtitle =
                'Kami siap membantu Anda. Sampaikan pertanyaan, saran, atau pengaduan melalui formulir di bawah ini.';
        @endphp
        <x-banner-page :title="$title" :subtitle="$subtitle" />

    </section>

    {{-- Main Content --}}
    <section class="py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2">

                {{-- Contact Form --}}
                <div class="space-y-6">
                    <div class="rounded-xl border border-neutral-200 bg-white overflow-hidden shadow-sm">
                        <div class="p-4 border-b border-neutral-200">
                            <h3 class="text-lg font-semibold">Lokasi Kami</h3>
                            <p class="text-sm text-neutral-600 mt-1">Klik dan seret untuk menjelajahi peta</p>
                        </div>
                        {{-- <div id="map" class="h-80 w-full" data-lat="-6.2088" data-lng="106.8456"></div> --}}
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d498.5969643657732!2d116.728431!3d-1.309877!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df13eeb6d604aa5%3A0xd209707fe85ebb08!2sDinas%20Komunikasi%20dan%20Informatika%20Kab.%20Penajam%20Paser%20Utara!5e0!3m2!1sen!2sid!4v1755320497366!5m2!1sen!2sid"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    {{-- <div>
                        <h2 class="text-2xl font-semibold">Kirim Pesan</h2>
                        <p class="mt-2 text-neutral-600">Isi formulir berikut dan kami akan merespons secepatnya.</p>
                    </div>

                    @if (session('success'))
                        <div class="rounded-lg bg-emerald-50 border border-emerald-200 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <span
                                        class="inline-block h-5 w-5 rounded-full bg-emerald-500 text-white text-xs grid place-items-center">✓</span>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-emerald-800">{{ session('success') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('kontak.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid gap-6 sm:grid-cols-2">
                            <div>
                                <label for="nama" class="block text-sm font-medium text-neutral-700 mb-2">
                                    Nama Lengkap <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                                    class="block w-full rounded-lg border-neutral-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 @error('nama') border-red-300 @enderror"
                                    placeholder="Masukkan nama lengkap" />
                                @error('nama')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-neutral-700 mb-2">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                    class="block w-full rounded-lg border-neutral-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 @error('email') border-red-300 @enderror"
                                    placeholder="nama@email.com" />
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="subjek" class="block text-sm font-medium text-neutral-700 mb-2">
                                Subjek <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="subjek" name="subjek" value="{{ old('subjek') }}" required
                                class="block w-full rounded-lg border-neutral-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 @error('subjek') border-red-300 @enderror"
                                placeholder="Topik pesan Anda" />
                            @error('subjek')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="pesan" class="block text-sm font-medium text-neutral-700 mb-2">
                                Pesan <span class="text-red-500">*</span>
                            </label>
                            <textarea id="pesan" name="pesan" rows="6" required
                                class="block w-full rounded-lg border-neutral-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 @error('pesan') border-red-300 @enderror"
                                placeholder="Tulis pesan Anda di sini...">{{ old('pesan') }}</textarea>
                            @error('pesan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-full sm:w-auto inline-flex items-center justify-center rounded-lg bg-emerald-600 px-6 py-3 text-sm font-medium text-white shadow-sm hover:bg-emerald-700 focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/50 transition">
                            <span>Kirim Pesan</span>
                            <span class="ml-2">→</span>
                        </button>
                    </form> --}}
                </div>

                {{-- Contact Info & Map --}}
                <div class="space-y-8">
                    {{-- Contact Information --}}
                    <div class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm">
                        <h3 class="text-lg font-semibold mb-4">Informasi Kontak</h3>
                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 mt-1">
                                    <div
                                        class="h-5 w-5 rounded bg-emerald-100 text-emerald-700 text-xs grid place-items-center font-semibold">
                                        📍</div>
                                </div>
                                <div>
                                    <p class="font-medium text-neutral-900">Alamat</p>
                                    <p class="text-sm text-neutral-600">{{ $contact->address }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 mt-1">
                                    <div
                                        class="h-5 w-5 rounded bg-emerald-100 text-emerald-700 text-xs grid place-items-center font-semibold">
                                        📞</div>
                                </div>
                                <div>
                                    <p class="font-medium text-neutral-900">Telepon</p>
                                    <p class="text-sm text-neutral-600">{{ $contact->phone }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 mt-1">
                                    <div
                                        class="h-5 w-5 rounded bg-emerald-100 text-emerald-700 text-xs grid place-items-center font-semibold">
                                        ✉️</div>
                                </div>
                                <div>
                                    <p class="font-medium text-neutral-900">Email</p>
                                    <p class="text-sm text-neutral-600">{{ $contact->email }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 mt-1">
                                    <div
                                        class="h-5 w-5 rounded bg-emerald-100 text-emerald-700 text-xs grid place-items-center font-semibold">
                                        🕒</div>
                                </div>
                                <div>
                                    <p class="font-medium text-neutral-900">Jam Operasional</p>
                                    <p class="text-sm text-neutral-600">
                                        Senin - Jumat: 08:00 - 16:00<br>
                                        Sabtu - Minggu: Tutup
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Map --}}


                    {{-- Quick Links --}}
                    <div class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm">
                        <h3 class="text-lg font-semibold mb-4">Tautan Cepat</h3>
                        <div class="grid gap-3 sm:grid-cols-2">
                            <a href="#"
                                class="inline-flex items-center gap-2 text-sm text-emerald-700 hover:text-emerald-800">
                                <span>📋</span>
                                <span>Formulir Pengaduan</span>
                            </a>
                            <a href="#"
                                class="inline-flex items-center gap-2 text-sm text-emerald-700 hover:text-emerald-800">
                                <span>📄</span>
                                <span>Permohonan Informasi</span>
                            </a>
                            <a href="#"
                                class="inline-flex items-center gap-2 text-sm text-emerald-700 hover:text-emerald-800">
                                <span>📊</span>
                                <span>Laporan Kinerja</span>
                            </a>
                            <a href="#"
                                class="inline-flex items-center gap-2 text-sm text-emerald-700 hover:text-emerald-800">
                                <span>📞</span>
                                <span>Call Center</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <section class="py-16 sm:py-20 bg-neutral-50">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-2xl font-semibold">Pertanyaan Umum</h2>
                <p class="mt-2 text-neutral-600">Jawaban untuk pertanyaan yang sering diajukan</p>
            </div>

            <div class="space-y-4">
                <details class="group rounded-lg border border-neutral-200 bg-white">
                    <summary class="flex cursor-pointer items-center justify-between p-4 font-medium">
                        <span>Bagaimana cara mengajukan permohonan informasi publik?</span>
                        <span class="transition group-open:rotate-180">▼</span>
                    </summary>
                    <div class="px-4 pb-4 text-sm text-neutral-600">
                        Anda dapat mengajukan permohonan informasi publik melalui formulir online di website kami, datang
                        langsung ke kantor, atau mengirim surat resmi ke alamat kami.
                    </div>
                </details>

                <details class="group rounded-lg border border-neutral-200 bg-white">
                    <summary class="flex cursor-pointer items-center justify-between p-4 font-medium">
                        <span>Berapa lama waktu respons untuk pengaduan?</span>
                        <span class="transition group-open:rotate-180">▼</span>
                    </summary>
                    <div class="px-4 pb-4 text-sm text-neutral-600">
                        Kami berkomitmen merespons setiap pengaduan dalam waktu maksimal 1x24 jam untuk konfirmasi
                        penerimaan, dan penyelesaian dalam 7-14 hari kerja tergantung kompleksitas masalah.
                    </div>
                </details>

                <details class="group rounded-lg border border-neutral-200 bg-white">
                    <summary class="flex cursor-pointer items-center justify-between p-4 font-medium">
                        <span>Apakah layanan konsultasi TIK gratis?</span>
                        <span class="transition group-open:rotate-180">▼</span>
                    </summary>
                    <div class="px-4 pb-4 text-sm text-neutral-600">
                        Ya, layanan konsultasi TIK untuk instansi pemerintah daerah dan masyarakat umum disediakan secara
                        gratis. Silakan hubungi kami untuk membuat janji konsultasi.
                    </div>
                </details>
            </div>
        </div>
    </section>

    {{-- Load Leaflet CSS & JS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
@endsection
