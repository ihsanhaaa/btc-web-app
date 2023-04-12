@extends('layouts.app')

@section('content')
    <div class="main-wrapper">
        <div class="row stats-row">
            <div class="col-lg-6 col-md-12">
                <div class="card card-transparent stats-card">
                    <div class="card-body">
                        <div style="width: 80%">
                            <canvas id="summaryChart"></canvas>
                        </div>
                        <div class="stats-info">
                            <p class="stats-text mt-5">Total Pengeluaran Rp. {{ number_format((float) $totalSpending) }}</p>
                            <p class="stats-text">Total Pendapatan Rp. {{ number_format((float) $totalIncome) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card card-transparent stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <p class="stats-text my-3">Total Pengeluaran Umum</p>
                            <h6 class="card-title">Rp. {{ number_format((float) $totalSpendingUmum) }}</h6>
                            <p class="stats-text my-2">Pengeluaran Bulan {{ $namaBulan }} sebesar Rp. {{ number_format((float) $spendingUmumThisMonth) }}</p>
                            <p class="stats-text">Pengeluaran Bulan Sebelumnya, Rp. {{ number_format((float) $totalIncomeUmumLastMonth) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row stats-row">
            <div class="col-lg-3 col-md-12">
                <div class="card card-transparent stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <p class="stats-text my-3">Total Pengeluaran Kolam</p>
                            <h6 class="card-title">Rp. {{ number_format((float) $totalSpendingFish) }}</h6>
                            <p class="stats-text my-2">Pengeluaran Bulan {{ $namaBulan }} sebesar Rp. {{ number_format((float) $spendingFishThisMonth) }}</p>
                            <p class="stats-text">Pengeluaran Bulan Sebelumnya, Rp. {{ number_format((float) $totalIncomeFishLastMonth) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="card card-transparent stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <p class="stats-text">Total Pemasukan Kolam</p>
                            <h5 class="card-title">$3,089.67<span class="stats-change stats-change-danger">-8%</span></h5>
                            <p class="stats-text">Total revenue for last 20 days</p>
                        </div>
                        <div class="stats-icon change-danger">
                            <i class="material-icons">trending_down</i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-12">
                <div class="card card-transparent stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <p class="stats-text my-3">Total Pengeluaran Keratom</p>
                            <h6 class="card-title">Rp. {{ number_format((float) $totalSpendingKeratom) }}</h6>
                            <p class="stats-text my-2">Pengeluaran Bulan {{ $namaBulan }} sebesar Rp. {{ number_format((float) $spendingKeratomThisMonth) }}</p>
                            <p class="stats-text">Pengeluaran Bulan Sebelumnya, Rp. {{ number_format((float) $totalIncomeKeratomLastMonth) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="card card-transparent stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <p class="stats-text">Total Pemasukan Keratom</p>
                            <h5 class="card-title">47,350<span class="stats-change stats-change-success">+12%</span></h5>
                            <p class="stats-text">Total investments in this month</p>
                        </div>
                        <div class="stats-icon change-success">
                            <i class="material-icons">trending_up</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    @push('javascript-plugins')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var ctx = document.getElementById('summaryChart').getContext('2d');
            var chartData = @json($chartData);
            var summaryChart = new Chart(ctx, {
                type: 'pie',
                data: chartData,
            });
        </script>
    @endpush
@endsection
