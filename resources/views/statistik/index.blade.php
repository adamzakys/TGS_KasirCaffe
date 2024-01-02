<!-- resources/views/statistik/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Statistik Penjualan</h1>

        <!-- Chart.js untuk Grafik Penjualan -->
        <canvas id="penjualanChart" width="400" height="200"></canvas>

        <!-- Daftar Produk Terlaris -->
        <h2>Produk Terlaris</h2>
        <ul>
            @foreach ($data['produkTerlaris'] as $produk)
                <li>{{ $produk['nama_menu'] }} - Terjual: {{ $produk['terjual'] }} item</li>
            @endforeach
        </ul>

        <!-- Pendapatan -->
        <h2>Pendapatan</h2>
        @if (isset($data['pendapatanMakanan']))
            <p>Makanan: Rp {{ number_format($data['pendapatanMakanan'], 2) }}</p>
        @endif
        
        @if (isset($data['pendapatanMinuman']))
            <p>Minuman: Rp {{ number_format($data['pendapatanMinuman'], 2) }}</p>
        @endif

        <!-- Kinerja User -->
        <h2>Kinerja User</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama User</th>
                    <th>Pesanan Diambil Hari Ini</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['kinerjaUser'] as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->pesanan_diambil }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // Chart.js untuk Grafik Penjualan
        var ctx = document.getElementById('penjualanChart').getContext('2d');
        var penjualanChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Harian', 'Mingguan', 'Bulanan'],
                datasets: [{
                    label: 'Jumlah Penjualan',
                    data: [
                        {{ isset($data['penjualanHarian']) ? $data['penjualanHarian'] : 0 }},
                        {{ isset($data['penjualanMingguan']) ? $data['penjualanMingguan'] : 0 }},
                        {{ isset($data['penjualanBulanan']) ? $data['penjualanBulanan'] : 0 }}
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script src="/assets/plugins/common/common.min.js"></script>
    <script src="/assets/js/custom.min.js"></script>
    <script src="/assets/js/settings.js"></script>
    <script src="/assets/js/gleek.js"></script>
    <script src="/assets/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="/assets/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="/assets/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="/assets/plugins/d3v3/index.js"></script>
    <script src="/assets/plugins/topojson/topojson.min.js"></script>
    <script src="/assets/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="/assets/plugins/raphael/raphael.min.js"></script>
    <script src="/assets/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="/assets/plugins/moment/moment.min.js"></script>
    <script src="/assets/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="/assets/plugins/chartist/js/chartist.min.js"></script>
    <script src="/assets/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
@endsection
