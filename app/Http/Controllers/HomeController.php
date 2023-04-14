<?php

namespace App\Http\Controllers;

use App\Models\DailySpending;
use App\Models\IncomeFish;
use App\Models\IncomeKeratom;
use App\Models\SpendingFish;
use App\Models\SpendingKeratom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dailySpendings = DailySpending::all();
        $spendingFish = SpendingFish::all();
        $spendingKeratoms = SpendingKeratom::all();
        $incomeFish = IncomeFish::all();
        $incomeKeratoms = IncomeKeratom::all();

        $totalSpending = $dailySpendings->sum('harga') + $spendingFish->sum('harga') + $spendingKeratoms->sum('harga');
        $totalIncome = $incomeFish->sum('total_penjualan') + $incomeKeratoms->sum('total_penjualan');

        $chartData = [
            'labels' => ['Total Pengeluaran', 'Total Pendapatan'],
            'datasets' => [
                [
                    'label' => 'Rp. ',
                    'backgroundColor' => ['#ff6384', '#36a2eb'],
                    'data' => [$totalSpending, $totalIncome],
                ]
            ]
        ];

        // menampilkan data bulan ini pada pengeluaran ikan
        $currentMonth = date('m');
        $currentYear = date('Y');
        $namaBulan = Carbon::now()->locale('id')->monthName;

        $spendingFishThisMonth = DB::table('spending_fish')
            ->whereMonth('created_at', '=', $currentMonth)
            ->whereYear('created_at', '=', $currentYear)
            ->sum('harga');

        $spendingFishThisMonthKolam = DB::table('spending_fish')->where('jenis', '=', 'Kolam')
            ->whereMonth('created_at', '=', $currentMonth)
            ->whereYear('created_at', '=', $currentYear)
            ->sum('harga');

        $spendingFishThisMonthPakan = DB::table('spending_fish')->where('jenis', '=', 'Pakan')
            ->whereMonth('created_at', '=', $currentMonth)
            ->whereYear('created_at', '=', $currentYear)
            ->sum('harga');

        $totalSpendingFish = DB::table('spending_fish')->sum('harga');

        // bulan sebelumnya
        $lastMonth = date('m', strtotime('-1 month'));
        $lastYear = date('Y', strtotime('-1 month'));

        // Get current month and year
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $totalIncomeFishLastMonth = DB::table('spending_fish')
            ->whereMonth('created_at', '=', $lastMonth)
            ->whereYear('created_at', '=', $lastYear)
            ->sum('harga');


        // keratom
        $spendingKeratomThisMonth = DB::table('spending_keratoms')
            ->whereMonth('created_at', '=', $currentMonth)
            ->whereYear('created_at', '=', $currentYear)
            ->sum('harga');

        $totalSpendingKeratom = DB::table('spending_keratoms')->sum('harga');

        // bulan sebelumnya
        $lastMonth = date('m', strtotime('-1 month'));
        $lastYear = date('Y', strtotime('-1 month'));

        $totalIncomeKeratomLastMonth = DB::table('spending_keratoms')
            ->whereMonth('created_at', '=', $lastMonth)
            ->whereYear('created_at', '=', $lastYear)
            ->sum('harga');

        // umum
        $spendingUmumThisMonth = DB::table('daily_spendings')
            ->whereMonth('created_at', '=', $currentMonth)
            ->whereYear('created_at', '=', $currentYear)
            ->sum('harga');

        $totalSpendingUmum = DB::table('daily_spendings')->sum('harga');

        // bulan sebelumnya
        $lastMonth = date('m', strtotime('-1 month'));
        $lastYear = date('Y', strtotime('-1 month'));

        $totalIncomeUmumLastMonth = DB::table('daily_spendings')
            ->whereMonth('created_at', '=', $lastMonth)
            ->whereYear('created_at', '=', $lastYear)
            ->sum('harga');

        // pendapatan
        $totalIncomeFish = DB::table('income_fish')->sum('total_penjualan');
        $totalIncomeKeratom = DB::table('income_keratoms')->sum('total_penjualan');

        $totalIncomeThisMonthFish = IncomeFish::whereMonth('tanggal_jual', $currentMonth)
            ->whereYear('tanggal_jual', $currentYear)
            ->sum('total_penjualan');

        $totalIncomeThisMonthKeratom = IncomeKeratom::whereMonth('tanggal_jual', $currentMonth)
            ->whereYear('tanggal_jual', $currentYear)
            ->sum('total_penjualan');


        // data
        // menghitung jumlah harga dari tabel daily_spendings, spending_fish, dan spending_keratoms
        $spendingThisYear = DB::table('daily_spendings')
        ->select(DB::raw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(harga) as total_harga'))
        ->groupBy('year', 'month')
        ->get();

        $spendingFishThisYear = DB::table('spending_fish')
        ->select(DB::raw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(harga) as total_harga'))
        ->groupBy('year', 'month')
        ->get();

        $spendingKeratomsThisYear = DB::table('spending_keratoms')
        ->select(DB::raw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(harga) as total_harga'))
        ->groupBy('year', 'month')
        ->get();

        // menghitung total penjualan dari tabel income_fish dan income_keratoms
        $incomeThisYear = DB::table('income_fish')
        ->select(DB::raw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total_penjualan) as total_penjualan'))
        ->groupBy('year', 'month')
        ->get();

        $incomeKeratomsThisYear = DB::table('income_keratoms')
        ->select(DB::raw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total_penjualan) as total_penjualan'))
        ->groupBy('year', 'month')
        ->get();

        return view('home', compact('chartData', 'spendingFishThisMonthKolam', 'spendingFishThisMonthPakan', 'totalIncomeThisMonthKeratom', 'totalIncomeKeratom', 'totalIncomeFish', 'totalSpending', 'totalIncome', 'spendingFishThisMonth', 'totalSpendingFish', 'namaBulan', 'totalIncomeFishLastMonth', 'spendingKeratomThisMonth', 'totalSpendingKeratom', 'totalIncomeKeratomLastMonth', 'spendingUmumThisMonth', 'totalSpendingUmum', 'totalIncomeUmumLastMonth', 'spendingThisYear', 'incomeThisYear', 'totalIncomeThisMonthFish'));
    }
}
