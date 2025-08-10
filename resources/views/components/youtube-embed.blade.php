@props([
    'videoId' => null, // contoh: dQw4w9WgXcQ
    'title' => 'Video',
    'start' => 0,
    // 'params' => 'rel=0&modestbranding=1' // opsional tambahan
])

@php
    $id = trim((string) $videoId);
    $params = http_build_query([
        'rel' => 0,
        'modestbranding' => 1,
        'playsinline' => 1,
        'start' => (int) $start,
    ]);
    $src = $id ? "https://www.youtube.com/embed/{$id}?{$params}" : null;
@endphp

@if ($src)
    <section class="w-full">
        <div class="mb-3">
            <h2 class="text-lg sm:text-xl font-semibold">{{ $title }}</h2>
        </div>
        <div class="relative w-full" style="padding-top: 56.25%;"> 16:9
            <iframe class="absolute inset-0 h-full w-full rounded-lg border border-neutral-200 shadow-sm"
                src="{{ $src }}" title="{{ $title }}"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
        </div>
    </section>
@endif
