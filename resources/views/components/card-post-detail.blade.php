@props(['post'])

@php
    $typeColors = [
        'berita' => 'bg-blue-500 text-white',
        'pengumuman' => 'bg-yellow-500 text-black',
        'kegiatan' => 'bg-green-500 text-white',
    ];

    $colorClass = $typeColors[$post->type] ?? 'bg-gray-500 text-white';
@endphp

<article class="rounded-xl border border-neutral-200 bg-white shadow-sm overflow-hidden">
    <div class="h-40 w-full bg-neutral-100">
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="h-full w-full object-cover" alt="{{ $post->title }}">
        @else
            <div class="h-full w-full flex items-center justify-center text-neutral-400 text-sm">No Image</div>
        @endif
    </div>
    <div class="p-5">
        <div class="flex justify-between items-center">
            <span class="px-3 py-1 rounded-full text-xs font-semibold capitalize {{ $colorClass }}">
                {{ $post->type }}
            </span>

            <span class="flex items-center gap-2 text-neutral-700 text-sm">
                <i class="fa-regular fa-eye"></i>
                <span>{{ $post->views }}</span>
            </span>
        </div>


        <h3 class=" font-semibold text-sm  mt-2">
            {{ $post->title }}
        </h3>

        {{-- <p class="mt-1 text-sm text-neutral-600 line-clamp-3">
            {!! strip_tags($post->content) !!}
        </p> --}}

        <a href="{{ route('berita-detail', $post->slug) }}"
            class="mt-3 inline-block text-sm text-emerald-700 font-medium">
            Baca selengkapnya →
        </a>
        {{-- <div class="flex text-[12px] text-neutral-500 mt-3">
            <span class="font-semibold">{{ $post->user->name }} - </span>
            <span> {{ $post->created_at->diffForHumans() }}</span>
        </div> --}}
    </div>
</article>
