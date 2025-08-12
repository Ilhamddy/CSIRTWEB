@extends('layouts.app-guest')

@section('title', 'Diskominfo Kabupaten Penajam Paser Utara')

@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.5/main.min.css">
    <style>
        /* Ganti warna tombol utama */
        .fc .fc-button {
            background-color: #10B981;
            /* emerald-500 */
            border-color: #10B981;
            color: white;
        }

        /* Efek hover */
        .fc .fc-button:hover {
            background-color: #059669;
            /* emerald-600 */
            border-color: #059669;
        }

        /* Tombol aktif */
        .fc .fc-button.fc-button-active {
            background-color: #047857;
            /* emerald-700 */
            border-color: #047857;
            color: white;
        }

        /* Judul kalender */
        .fc .fc-toolbar-title {
            color: #065f46;
            /* emerald-800 */
            font-weight: bold;
        }
    </style>
@endpush
@section('content')

    {{-- Berita --}}
    <section>
        @php
            $title = 'Agenda Diskominfo';
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

                            <span class="ml-1 text-sm font-medium text-neutral-700">Agenda</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="mb-10 flex items-end justify-between">
                <div class="">
                    <h2 class="text-2xl font-semibold tracking-tight sm:text-3xl text-emerald-600">Semua Agenda</h2>
                    <p class="mt-2 text-neutral-600">Diskominfo Kabupaten Penajam Paser Utara</p>
                </div>
            </div>
            <div id="calendar"></div>

            {{-- <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($berita as $post)
                    <x-card-post :post="$post" />
                @endforeach
            </div> --}}
        </div>
    </section>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.5/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'id',
                events: @json($events),
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                }
            });

            calendar.render();
        });
    </script>
@endpush
