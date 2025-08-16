@extends('layouts.app')

@section('title', 'Monitor')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <style>
        .monitor-card {
            min-height: 300px;
        }

        .chart-center-text {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font-size: 1.2rem;
            font-weight: bold;
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Monitor</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Monitor</div>
                </div>
            </div>
            <div class="section-body">

                <div class="row mt-4">
                    <!-- CPU -->
                    <div class="col-md-4">
                        <div class="card monitor-card">
                            <div class="card-header">
                                <h4>CPU Usage</h4>
                            </div>
                            <div class="card-body position-relative">
                                <canvas id="cpuChart"></canvas>
                                <div class="chart-center-text" id="cpuText"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Memory -->
                    <div class="col-md-4">
                        <div class="card monitor-card">
                            <div class="card-header">
                                <h4>Memory Usage</h4>
                            </div>
                            <div class="card-body position-relative">
                                <canvas id="memoryChart"></canvas>
                                <div class="chart-center-text" id="memoryText"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Disk -->
                    <div class="col-md-4">
                        <div class="card monitor-card">
                            <div class="card-header">
                                <h4>Disk Usage</h4>
                            </div>
                            <div class="card-body position-relative">
                                <canvas id="diskChart"></canvas>
                                <div class="chart-center-text" id="diskText"></div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Data dari Laravel Controller
        const cpu = parseFloat("{{ str_replace('%', '', $data['cpu']) }}") || 0;

        const memoryUsed = parseFloat("{{ str_replace(['MB', ' '], '', $data['memory']['used']) }}") || 0;
        const memoryTotal = parseFloat("{{ str_replace(['MB', ' '], '', $data['memory']['total']) }}") || 1;
        const memoryPercent = parseFloat("{{ str_replace('%', '', $data['memory']['percent']) }}") || 0;

        const diskUsed = parseFloat("{{ str_replace(['GB', ' '], '', $data['disk']['used']) }}") || 0;
        const diskTotal = parseFloat("{{ str_replace(['GB', ' '], '', $data['disk']['total']) }}") || 1;
        const diskPercent = parseFloat("{{ str_replace('%', '', $data['disk']['percent']) }}") || 0;

        // ============================
        // CPU Gauge
        // ============================
        new Chart(document.getElementById('cpuChart'), {
            type: 'doughnut',
            data: {
                labels: ['Load', 'Idle'],
                datasets: [{
                    data: [cpu, 100 - cpu],
                    backgroundColor: ['#ff6384', '#e0e0e0']
                }]
            },
            options: {
                cutout: '75%',
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
        document.getElementById("cpuText").innerText = cpu + "%";

        // ============================
        // Memory Gauge
        // ============================
        new Chart(document.getElementById('memoryChart'), {
            type: 'doughnut',
            data: {
                labels: ['Used', 'Free'],
                datasets: [{
                    data: [memoryUsed, memoryTotal - memoryUsed],
                    backgroundColor: ['#36a2eb', '#e0e0e0']
                }]
            },
            options: {
                cutout: '75%',
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
        document.getElementById("memoryText").innerText = memoryPercent + "%";

        // ============================
        // Disk Gauge
        // ============================
        new Chart(document.getElementById('diskChart'), {
            type: 'doughnut',
            data: {
                labels: ['Used', 'Free'],
                datasets: [{
                    data: [diskUsed, diskTotal - diskUsed],
                    backgroundColor: ['#4caf50', '#e0e0e0']
                }]
            },
            options: {
                cutout: '75%',
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
        document.getElementById("diskText").innerText = diskPercent + "%";
    </script>
@endpush
