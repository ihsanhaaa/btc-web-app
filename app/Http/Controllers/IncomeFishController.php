<?php

namespace App\Http\Controllers;

use App\Exports\IncomeFishExport;
use App\Models\IncomeFish;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class IncomeFishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasukans = IncomeFish::all();

        return view('kolam.pemasukan.index', compact('pemasukans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kolam.pemasukan.create');
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

        // $total = IncomeFish::all()->sum('harga');
        // dd($total);

        $validatedData['total_penjualan'] = $request->input('jumlah_bobot') * $request->input('harga_jual');

        IncomeFish::create($validatedData);

        return redirect()->route('pemasukan-ikan.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncomeFish  $incomefish
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $pemasukan = IncomeFish::find($id);

        // return view('kolam.pemasukan.show', compact('pemasukan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncomeFish  $incomefish
     * @return \Illuminate\Http\Response
     */
    public function edit(IncomeFish $incomefish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IncomeFish  $incomefish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncomeFish $incomefish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncomeFish  $incomefish
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncomeFish $incomefish)
    {
        //
    }

    public function export()
    {
        $fileName = 'data-pemasukan-ikan-' . Carbon::now()->format('Y-m-d') . '.xlsx';

        return Excel::download(new IncomeFishExport, $fileName);
    }
}
