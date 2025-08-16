@props([
    'videos' => collect(), // Collection Eloquent
    'title' => 'Galeri Video',
])

@php
    $videoItems = $videos->take(4);
@endphp

@if ($videoItems->count())
    <section class="w-full">
        {{-- <h2 class="text-lg sm:text-xl font-semibold mb-4">{{ $title }}</h2> --}}

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($videoItems as $index => $video)
                @php
                    $videoId = trim((string) $video->url);
                    $videoTitle = $video->title ?? 'Video ' . ($index + 1);

                    if ($videoId) {
                        $params = http_build_query([
                            'rel' => 0,
                            'modestbranding' => 1,
                            'playsinline' => 1,
                            'start' => 0, // Semua video mulai dari detik 0
                        ]);
                        $src = "https://www.youtube.com/embed/{$videoId}?{$params}";
                    } else {
                        $src = null;
                    }
                @endphp

                @if ($src)
                    <div class="bg-white rounded-lg border border-neutral-200 shadow-sm overflow-hidden">
                        {{-- Video container 16:9 --}}
                        <div class="relative w-full" style="padding-top: 56.25%;">
                            <iframe class="absolute inset-0 h-full w-full" src="{{ $src }}"
                                title="{{ $videoTitle }}"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin">
                            </iframe>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        {{-- @if ($videos->count() > 4)
            <div class="mt-4 text-center">
                <button
                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    Lihat Lebih Banyak Video
                </button>
            </div>
        @endif --}}
    </section>
@endif
