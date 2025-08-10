@props([
    'videos' => [], // Array berisi data video
    'title' => 'Galeri Video',
])

@php
    // Pastikan videos adalah array dan ambil maksimal 4 video
    $videoItems = array_slice($videos ?? [], 0, 4);
@endphp

@if (!empty($videoItems))
    <section class="w-full">
        {{-- <div class="mb-4">
            <h2 class="text-lg sm:text-xl font-semibold">{{ $title }}</h2>
        </div> --}}

        {{-- Grid container: 2 kolom di semua ukuran layar --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($videoItems as $index => $video)
                @php
                    $videoId = trim((string) ($video['videoId'] ?? ''));
                    $videoTitle = $video['title'] ?? 'Video ' . ($index + 1);
                    $start = (int) ($video['start'] ?? 0);

                    if ($videoId) {
                        $params = http_build_query([
                            'rel' => 0,
                            'modestbranding' => 1,
                            'playsinline' => 1,
                            'start' => $start,
                        ]);
                        $src = "https://www.youtube.com/embed/{$videoId}?{$params}";
                    } else {
                        $src = null;
                    }
                @endphp

                @if ($src)
                    <div class="bg-white rounded-lg border border-neutral-200 shadow-sm overflow-hidden">
                        {{-- Video Title --}}
                        {{-- <div class="p-3 border-b border-neutral-100">
                            <h3 class="text-sm font-medium text-neutral-800 line-clamp-2">{{ $videoTitle }}</h3>
                        </div> --}}

                        {{-- Video Container --}}
                        <div class="relative w-full" style="padding-top: 56.25%;"> {{-- 16:9 Aspect Ratio --}}
                            <iframe class="absolute inset-0 h-full w-full" src="{{ $src }}"
                                title="{{ $videoTitle }}"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin">
                            </iframe>
                        </div>

                        {{-- Optional: Video Description --}}
                        {{-- @if (!empty($video['description']))
                            <div class="p-3 text-sm text-neutral-600">
                                {{ $video['description'] }}
                            </div>
                        @endif --}}
                    </div>
                @endif
            @endforeach
        </div>

        {{-- Optional: Show more button if there are more than 4 videos --}}
        @if (count($videos ?? []) > 4)
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
        @endif
    </section>
@endif
