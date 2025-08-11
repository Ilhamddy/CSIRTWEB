@props([
    'photos' => collect(),
    'title' => 'Galeri Foto',
])

@php
    // Ambil hanya maksimal 8 foto
    $items = $photos->take(8);
@endphp

@if ($items->count())
    <section x-data="{ lightboxOpen: false, lightboxImage: '' }" class="w-full">
        {{-- Judul Galeri --}}
        <h2 class="text-2xl font-bold mb-6">{{ $title }}</h2>

        <div class="relative" data-slider>
            <div class="no-scrollbar overflow-x-auto scroll-smooth snap-x snap-mandatory" tabindex="0"
                aria-label="Galeri foto" data-slider-viewport>
                <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3" data-slider-track>
                    @foreach ($items as $idx => $p)
                        <li class="snap-start shrink-0 group">
                            <figure
                                class="rounded-lg border relative border-neutral-200 bg-white shadow-sm overflow-hidden cursor-pointer"
                                @click="lightboxImage='{{ asset('storage/' . $p->image_path) }}'; lightboxOpen=true">

                                {{-- Rasio 3:2 untuk gambar --}}
                                <div class="relative w-full" style="padding-top: 66.6667%;">
                                    <img src="{{ asset('storage/' . $p->image_path) }}"
                                        alt="{{ $p->title ?? 'Foto galeri ' . ($idx + 1) }}"
                                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
                                        loading="lazy" />

                                    {{-- Efek cahaya --}}
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700 ease-out">
                                    </div>
                                </div>

                                {{-- Caption tampil saat hover --}}
                                @if (!empty($p->title))
                                    <figcaption
                                        class="px-3 absolute left-2 bottom-2 bg-neutral-100/80 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 py-1 text-sm text-neutral-700">
                                        {{ $p->title }}
                                    </figcaption>
                                @endif
                            </figure>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- Lightbox --}}
        <div x-show="lightboxOpen" x-transition class="fixed inset-0 bg-black/70 flex items-center justify-center z-50"
            @click.self="lightboxOpen=false">
            <div class="relative">
                <button @click="lightboxOpen=false"
                    class="absolute cursor-pointer top-2 right-2 text-white text-2xl font-bold z-10">
                    &times;
                </button>
                <img :src="lightboxImage" class="max-w-full max-h-[90vh] rounded-lg shadow-lg" />
            </div>
        </div>
    </section>

    <script src="//unpkg.com/alpinejs" defer></script>
@endif
