@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard - Arif Nurrohman</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Users</h4>
                            </div>
                            <div class="card-body">
                                {{ $users }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Berita</h4>
                            </div>
                            <div class="card-body">
                                {{ $berita }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Foto</h4>
                            </div>
                            <div class="card-body">
                                {{ $foto }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Video</h4>
                            </div>
                            <div class="card-body">
                                {{ $video }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistics</h4>
                            {{-- <div class="card-header-action">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Week</a>
                                    <a href="#" class="btn">Month</a>
                                </div>
                            </div> --}}
    </div>
    <canvas id="chartTotalCost" class="p-4"></canvas>
    </div>
    </div>
    </div> --}}
    </section>
    </div>
@endsection

@push('scripts')
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    {{-- <script>
        const pendapatan = <?php echo json_encode($total_cost); ?>;
        const bulan = <?php echo json_encode($bulan); ?>;
        console.log(pendapatan)

        const ctx = document.getElementById('chartTotalCost');


        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ],
                datasets: [{
                    label: 'Grafik Pendapatan Bulanan',
                    data: pendapatan,
                    borderWidth: 1
                    // backgroundColor: 'rgba(0, 123, 255, 0.5)',
                }]
            },
            options: {
                scales: {
                    y: {
                        ticks: {
                            callback: function(value, index, ticks) {
                                return 'Rp. ' + value
                            }
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <!-- JS Libraies --> --}}
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>

    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}">
        < script src = "{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}" >
    </script>

    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
