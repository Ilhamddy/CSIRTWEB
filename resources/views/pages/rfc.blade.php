@extends('layouts.app-guest')

@section('title', 'RFC - Diskominfo Kabupaten')

@section('content')
    {{-- Hero Section --}}
     <section class="relative bg-gradient-to-br from-emerald-50 to-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16 sm:py-20">
            <div class="text-center">
                <h1 class="text-3xl font-bold tracking-tight sm:text-4xl lg:text-5xl">
                    RFC 2350 - CSIRT Diskominfo Kabupaten
                </h1>
<a 
        href="{{asset('/rfc2350.pdf')}}" 
        target="_blank" 
    
        download="RFC2350-CSIRT-Diskominfo.pdf" 
        class="mt-6 inline-block rounded bg-emerald-600 px-5 py-3 text-sm font-medium text-white hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">
        Download RFC 2350
      </a>
                 
                  
                <p class="mt-4 max-w-2xl mx-auto text-neutral-600 text-base sm:text-lg">
                    Kami siap membantu Anda. Sampaikan pertanyaan, saran, atau pengaduan melalui formulir di bawah ini.
                </p>
            </div>
        </div>
    </section> 
      {{-- Load Leaflet CSS & JS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
@endsection
