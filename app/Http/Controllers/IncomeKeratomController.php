<?php

namespace App\Http\Controllers;

use App\Exports\IncomeKeratomExport;
use App\Models\IncomeKeratom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class IncomeKeratomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasukans = IncomeKeratom::all();

        return view('keratom.pemasukan.index', compact('pemasukans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keratom.pemasukan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // return $request->file('image')->store('images');
        $validatedData = $request->validate([
            'tanggal_jual' => 'required|date',
            'jumlah_bobot' => 'required|integer',
            'harga_jual' => 'required|integer',
            'total_penjualan' => 'nullable',
        ]);

        // $total = IncomeKeratom::all()->sum('harga');
        // dd($total);

        $validatedData['total_penjualan'] = $request->input('jumlah_bobot') * $request->input('harga_jual');

        IncomeKeratom::create($validatedData);

        return redirect()->route('pemasukan-keratom.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncomeKeratom  $incomefish
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $pemasukan = IncomeKeratom::find($id);

        // return view('keratom.pemasukan.show', compact('pemasukan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncomeKeratom  $incomefish
     * @return \Illuminate\Http\Response
     */
    public function edit(IncomeKeratom $incomefish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IncomeKeratom  $incomefish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncomeKeratom $incomefish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncomeKeratom  $incomefish
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncomeKeratom $incomefish)
    {
        //
    }

    public function export()
    {
        $fileName = 'data-pemasukan-keratom-' . Carbon::now()->format('Y-m-d') . '.xlsx';

        return Excel::download(new IncomeKeratomExport, $fileName);
    }
}
