@extends('layouts.app-guest')

@section('title', 'Foto Kegiatan - Diskominfo Kabupaten Penajam Paser Utara')

@section('content')

    {{-- Berita --}}
    <section>
        @php
            $title = 'Foto Kegiatan';
            $subtitle = 'Informasi terkini dari Dinas Komunikasi dan Informatika Kabupaten.';
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

                            <span class="ml-1 text-sm font-medium text-neutral-700">Foto</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="mb-10 flex items-end justify-between">
                <div class="">
                    <h2 class="text-2xl font-semibold tracking-tight sm:text-3xl text-emerald-600">Semua Foto</h2>
                    {{-- <p class="mt-2 text-neutral-600">Informasi kegiatan dan rilis resmi Diskominfo Kabupaten.</p> --}}
                </div>
                {{-- <a href="#"
                    class="hidden sm:inline-flex text-sm font-medium text-emerald-700 hover:underline hover:text-emerald-800">Lihat
                    semua →</a> --}}
            </div>

            <div class="">
                <x-photo-slider :photos="$photos" title="" />
            </div>
            <div class="mt-8">
                {{ $photos->links('vendor.pagination.tailwind') }}
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
