@extends('layouts.app-guest')

@section('title', 'Struktur Organisasi - Diskominfo Kabupaten Penajam Paser Utara')

@section('content')

    {{-- Berita --}}
    <section>
        @php
            $title = 'Struktur Organisasi';
            $subtitle = 'Informasi terkini dari Dinas Komunikasi dan Informatika Kabupaten Penajam Paser Utara.';
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

                            <span class="ml-1 text-sm font-medium text-neutral-700">Struktur Organisasi</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="mb-10 flex items-end justify-between">
                <div class="">
                    <h2 class="text-2xl font-semibold tracking-tight sm:text-3xl text-emerald-600">Struktur Organisasi</h2>
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

                        <img src="{{ asset('storage/' . $profile->struktur_organisasi ?? '') }}"
                            alt="Struktur Organisasi Diskominfo" class="w-full h-auto rounded-2xl shadow-lg">

                        {{-- <div class="bg-white p-8 rounded-2xl shadow-lg border-1 border-emerald-200">
                            <h2 class="text-3xl font-bold mb-4 text-emerald-600 border-b border-emerald-200 pb-2">Struktur Organisasi</h2>
                            <p class="text-lg leading-relaxed">
                                {{ $profile->struktur ?? '' }}
                            </p>

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
