@props(['title', 'subtitle', 'icon', 'link', 'slug'])

@php
    $words = explode(' ', $title);

    if (count($words) >= 2) {
        // Ambil huruf pertama dari setiap kata yang kapital
        $initials = '';
        foreach ($words as $word) {
            $firstChar = mb_substr($word, 0, 1);
            if (mb_strtoupper($firstChar) === $firstChar) {
                $initials .= $firstChar;
            }
        }

        // Maksimal 2 huruf
        $initials = mb_substr($initials, 0, 2);

        // Kalau ternyata tidak ada huruf kapital, fallback ke dua huruf awal dari 2 kata pertama
        if ($initials === '') {
            $initials = strtoupper(
                mb_substr($words[0], 0, 1) .
                    (isset($words[1]) ? mb_substr($words[1], 0, 1) : mb_substr($words[0], 1, 1)),
            );
        }
    } else {
        // Kalau hanya 1 kata → ambil 2 huruf pertama
        $initials = strtoupper(mb_substr($title, 0, 2));
    }
@endphp

<a href="@if (isset($link)) {{ $link }}
    @else
        {{ route('front.layanan.show', $slug) }} @endif"
    class="group rounded-xl border border-neutral-200 bg-white p-5 shadow-sm hover:shadow-md transition focus:outline-none focus-visible:ring focus-visible:ring-emerald-500/40">
    <div
        class="mb-3 inline-flex h-10 w-10 items-center justify-center rounded-md bg-emerald-100 text-emerald-700 font-semibold">
        {{ $initials }}</div>
    <h3 class="text-base font-semibold">{{ $title }}</h3>
    <p class="mt-1 text-sm text-neutral-600">{{ $subtitle }}</p>
    <span class="mt-3 inline-flex text-sm font-medium text-emerald-700 group-hover:underline">Akses Layanan
        →</span>
</a>
