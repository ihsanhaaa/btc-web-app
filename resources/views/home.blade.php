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
            <div class="col-lg-6 col-md-12 mt-5">
                <div class="card card-transparent stats-card">
                    <canvas id="chart"></canvas>
                    <div class="card-body">
                        <div class="stats-info mt-4">
                            <p class="stats-text my-3">Total Pengeluaran Umum</p>
                            <h6 class="card-title">Rp. {{ number_format((float) $totalSpendingUmum) }}</h6>
                            <p class="stats-text my-2">Pengeluaran Bulan {{ $namaBulan }} sebesar Rp. {{ number_format((float) $spendingUmumThisMonth) }}</p>
                            <p class="stats-text">Pengeluaran Bulan Sebelumnya, Rp. {{ number_format((float) $totalIncomeUmumLastMonth) }}</p>
                        </div>
                        @if ($spendingUmumThisMonth == 0)
                            
                        @elseif ($spendingUmumThisMonth >= $totalIncomeUmumLastMonth)
                            <div class="stats-icon change-success">
                                <i class="material-icons">trending_up</i>
                            </div>
                        @else
                            <div class="stats-icon change-danger">
                                <i class="material-icons">trending_down</i>
                            </div>
                        @endif
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
                            <p class="stats-text my-2">Pengeluaran Kolam Bulan {{ $namaBulan }} sebesar Rp. {{ number_format((float) $spendingFishThisMonthKolam) }}</p>
                            <p class="stats-text my-2">Pengeluaran Pakan Bulan {{ $namaBulan }} sebesar Rp. {{ number_format((float) $spendingFishThisMonthPakan) }}</p>
                            <p class="stats-text my-2">Pengeluaran Total Bulan {{ $namaBulan }} sebesar Rp. {{ number_format((float) $spendingFishThisMonth) }}</p>
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
                            <h5 class="card-title">{{ $totalIncomeFish }}</h5>
                            <p class="stats-text my-2">Pengeluaran Kolam Bulan {{ $namaBulan }} sebesar Rp. {{ number_format((float) $totalIncomeThisMonthFish) }}</p>
                            <p class="stats-text">Pemasukan Bulan Sebelumnya, Rp. {{ number_format((float) $totalIncomeFishLastMonth) }}</p>
                        </div>
                        @if ($totalIncomeThisMonthFish == 0)
                            
                        @elseif ($totalIncomeThisMonthFish >= $totalIncomeFishLastMonth)
                            <div class="stats-icon change-success">
                                <i class="material-icons">trending_up</i>
                            </div>
                        @else
                            <div class="stats-icon change-danger">
                                <i class="material-icons">trending_down</i>
                            </div>
                        @endif
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
                        @if ($spendingKeratomThisMonth == 0)
                            
                        @elseif ($spendingKeratomThisMonth >= $totalIncomeKeratomLastMonth)
                            <div class="stats-icon change-success">
                                <i class="material-icons">trending_up</i>
                            </div>
                        @else
                            <div class="stats-icon change-danger">
                                <i class="material-icons">trending_down</i>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="card card-transparent stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <p class="stats-text">Total Pemasukan Keratom</p>
                            <h5 class="card-title">{{ $totalIncomeKeratom }}<span class="stats-change stats-change-danger">-8%</span></h5>
                            <p class="stats-text my-2">Pemasukan Bulan {{ $namaBulan }} sebesar Rp. {{ number_format((float) $totalIncomeThisMonthKeratom) }}</p>
                            <p class="stats-text">Pemasukan Bulan Sebelumnya, Rp. {{ number_format((float) $totalIncomeKeratomLastMonth) }}</p>
                        </div>
                        @if ($totalIncomeThisMonthKeratom == 0)
                            
                        @elseif ($totalIncomeThisMonthKeratom >= $totalIncomeKeratomLastMonth)
                            <div class="stats-icon change-success">
                                <i class="material-icons">trending_up</i>
                            </div>
                        @else
                            <div class="stats-icon change-danger">
                                <i class="material-icons">trending_down</i>
                            </div>
                        @endif
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

        {{-- data --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
        <script>
            var ctx = document.getElementById('chart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($labelsIncome) !!},
                    datasets: [{
                        label: 'Total Pemasukan',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        data: {!! json_encode($dataIncome) !!}
                    },
                    {
                        label: 'Total Pengeluaran',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        data: {!! json_encode($dataSpending) !!}
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
    @endpush
@endsection
