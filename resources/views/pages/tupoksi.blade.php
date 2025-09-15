@extends('layouts.app-guest')

@section('title', 'Tugas dan Fungsi - Diskominfo Kabupaten Penajam Paser Utara')

@section('content')

    {{-- Berita --}}
    <section>
        @php
            $title = 'Tugas dan Fungsi';
            $subtitle = 'Informasi terkini dari CSIRT Dinas Komunikasi dan Informatika Kabupaten Penajam Paser Utara.';
        @endphp
        <x-banner-page :title="$title" :subtitle="$subtitle" />

    </section>
    <section id="berita" class="py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            {{-- Breadcrumb --}}
            <nav class="flex items-center mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li>
                        <div class="flex items-center">
                            <a href="{{ route('home') }}"
                                class="inline-flex items-center text-sm font-medium text-emerald-600 hover:text-emerald-600">
                                <i class="fa-solid fa-house"></i>
                                <span class="ml-1">Beranda</span>
                            </a>
                        </div>
                    </li>
                    <li> / </li>
                    <li>
                        <div class="flex items-center">

                            <span class="ml-1 text-sm font-medium text-neutral-700">Tugas dan Fungsi</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="mb-10 flex items-end justify-between">
                <div class="">
                    <h2 class="text-2xl font-semibold tracking-tight sm:text-3xl text-emerald-600">Tugas dan Fungsi</h2>
                    {{-- <p class="mt-2 text-neutral-600">Informasi kegiatan dan rilis resmi Diskominfo Kabupaten.</p> --}}
                </div>
                {{-- <a href="#"
                    class="hidden sm:inline-flex text-sm font-medium text-emerald-700 hover:underline hover:text-emerald-800">Lihat
                    semua →</a> --}}
            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <div class="grid gap-6 col-span-3 lg:col-span-3">
                    {{-- Vsisi dan Misi --}}
                    <div class="grid gap-8  ">



                        {{-- MISI --}}
                        <div class="bg-white p-8 rounded-2xl shadow-lg border-1 border-emerald-200">
                            {{-- <h2 class="text-3xl font-bold mb-4 text-emerald-600 border-b border-emerald-200 pb-2">Tugas dan
                                Fungsi</h2> --}}
                            <ol class="list-decimal list-inside space-y-3 text-neutral-700 text-lg">
                                @php
                                    $tupoksi = $profile->sejarah ?? '';
                                    $tupoksiList = explode(';', $tupoksi);

                                @endphp
                                <div class="space-y-4">
                                    @foreach ($tupoksiList as $index => $item)
                                        <div class="flex items-start">
                                            {{-- Nomor bundar --}}
                                            <div
                                                class="flex items-center justify-center w-10 h-10 rounded-full bg-[#0b1891ff] text-white font-bold text-lg">
                                                {{ $index + 1 }}
                                            </div>

                                            {{-- Teks tupoksi --}}
                                            <div class="ml-4 text-neutral-700 text-lg">
                                                {{ $item }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                {{-- <li>Meningkatkan kualitas layanan informasi publik berbasis teknologi.</li>
                                <li>Mengembangkan infrastruktur komunikasi dan informatika yang merata dan berkelanjutan.
                                </li>
                                <li>Memperkuat literasi digital masyarakat untuk menghadapi era transformasi digital.</li>
                                <li>Menjamin keamanan dan kerahasiaan data serta informasi publik.</li> --}}
                            </ol>
                        </div>

                    </div>
                    {{-- Vsisi dan Misi --}}
                </div>
                {{-- <div class="mt-8">
                </div> --}}
            </div>
            {{-- <div class="mt-6 text-center">
                <a href="{{ route('posts.index') }}"
                    class="inline-flex items-center justify-center rounded-md text-emerald-600 px-5 py-3 text-sm font-medium underline  hover:bg-emerald-700 hover:text-white focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/50">
                    Lihat Semua Berita
                </a>
            </div> --}}
        </div>
    </section>

@endsection
