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

        $totalSpendingFish = DB::table('spending_fish')->sum('harga');

        // bulan sebelumnya
        $lastMonth = date('m', strtotime('-1 month'));
        $lastYear = date('Y', strtotime('-1 month'));

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

        return view('home', compact('chartData', 'totalSpending', 'totalIncome', 'spendingFishThisMonth', 'totalSpendingFish', 'namaBulan', 'totalIncomeFishLastMonth', 'spendingKeratomThisMonth', 'totalSpendingKeratom', 'totalIncomeKeratomLastMonth', 'spendingUmumThisMonth', 'totalSpendingUmum', 'totalIncomeUmumLastMonth'));
    }
}
