@props([
    // photos: [['src' => '/path.jpg', 'alt' => 'Teks alt', 'caption' => 'opsional'], ...]
    'photos' => [],
    'title' => 'Galeri Foto',
])

@php
    $items = array_slice($photos ?? [], 0, 8); // batasi 8
@endphp

@if (count($items))
    <section class="w-full">
        <div class="mb-4 flex items-center justify-between">
            <h2 class="text-lg sm:text-xl font-semibold">{{ $title }}</h2>
            <div class="flex gap-2">
                <button type="button"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-neutral-200 bg-white text-neutral-700 hover:bg-neutral-50 disabled:opacity-40"
                    aria-label="Sebelumnya" data-swiper-prev>
                    ‹
                </button>
                <button type="button"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-neutral-200 bg-white text-neutral-700 hover:bg-neutral-50 disabled:opacity-40"
                    aria-label="Berikutnya" data-swiper-next>
                    ›
                </button>
            </div>
        </div>

        <div class="swiper fade-edges" data-swiper-root>
            <div class="swiper-wrapper">
                @foreach ($items as $i => $p)
                    <div class="swiper-slide">
                        <figure class="rounded-lg border border-neutral-200 bg-white shadow-sm overflow-hidden">
                            <div class="relative w-full" style="padding-top: 66.6667%;"> 3:2
                                <img src="{{ $p['src'] ?? 'https://images.unsplash.com/photo-1520975916090-3105956dac38?q=80&w=1200&auto=format&fit=crop' }}"
                                    alt="{{ $p['alt'] ?? 'Foto galeri ' . ($i + 1) }}"
                                    class="absolute inset-0 h-full w-full object-cover" loading="lazy" />
                            </div>
                            @if (!empty($p['caption']))
                                <figcaption class="px-3 py-2 text-sm text-neutral-700">
                                    {{ $p['caption'] }}
                                </figcaption>
                            @endif
                        </figure>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
