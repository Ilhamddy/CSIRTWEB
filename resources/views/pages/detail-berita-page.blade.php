@extends('layouts.app-guest')

@section('title', 'Diskominfo Kabupaten Penajam Paser Utara')

@section('content')

    {{-- Berita --}}
    {{-- <section>
        @php
            $title = 'Berita Terbaru';
            $subtitle = 'Informasi terkini dari Dinas Komunikasi dan Informatika Kabupaten.';
        @endphp
        <x-banner-page :title="$title" :subtitle="$subtitle" />

    </section> --}}
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
                            <a href="{{ route('berita-page') }}"
                                class="inline-flex items-center text-sm font-medium text-emerald-600 hover:text-emerald-600">

                                <span class="ml-1">Berita</span>
                            </a>
                        </div>
                    </li>
                    <li> / </li>
                    <li>
                        <div class="flex items-center">

                            <span class="ml-1 text-sm font-medium text-neutral-700 line-clamp-2">{{ $post->title }}</span>
                        </div>
                    </li>
                </ol>
            </nav>


            <section class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                {{-- Detail Berita --}}
                <article class="bg-white shadow rounded-lg py-6 px-2 col-span-2">
                    <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
                    <p class="text-sm text-gray-500 mb-4">Dipublikasikan pada {{ $post->created_at->format('d M Y') }} oleh
                        {{ $post->user->name }}</p>
                    <div class="prose max-w-none">
                        {!! $post->content !!}
                    </div>
                    <x-share-article :post="$post" />
                    <div class="mt-6">
                        <a href="{{ route('berita-page') }}"
                            class="inline-flex items-center justify-center rounded-md text-emerald-600 px-5 py-3 text-sm font-medium underline hover:bg-emerald-700 hover:text-white focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/50">
                            Kembali ke Berita
                        </a>
                    </div>
                    {{-- Social Media Share Buttons --}}

                </article>
                <div class="col-span-1">
                    <h2 class="text-xl font-semibold mb-4">Berita Lainnya</h2>
                    <div class="space-y-4">
                        @foreach ($posts as $relatedPost)
                            @if ($relatedPost->id !== $post->id)
                                <x-card-post :post="$relatedPost" />
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>

            {{-- <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($berita as $post)
                    <x-card-post :post="$post" />
                @endforeach
            </div> --}}
            {{-- <div class="mt-6 text-center">
                <a href="{{ route('posts.index') }}"
                    class="inline-flex items-center justify-center rounded-md text-emerald-600 px-5 py-3 text-sm font-medium underline  hover:bg-emerald-700 hover:text-white focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/50">
                    Lihat Semua Berita
                </a>
            </div> --}}
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        function copyToClipboard(text, buttonElement) {
            navigator.clipboard.writeText(text).then(function() {
                // Tampilkan notifikasi berhasil
                const button = buttonElement;
                const originalText = button.innerHTML;
                button.innerHTML = `
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            Tersalin!
        `;
                button.classList.remove('bg-gray-600', 'hover:bg-gray-700');
                button.classList.add('bg-green-600', 'hover:bg-green-700');

                setTimeout(function() {
                    button.innerHTML = originalText;
                    button.classList.remove('bg-green-600', 'hover:bg-green-700');
                    button.classList.add('bg-gray-600', 'hover:bg-gray-700');
                }, 2000);
            }, function(err) {
                console.error('Could not copy text: ', err);
                alert('Gagal menyalin link. Silakan coba lagi.');
            });
        }
    </script>
@endpush
