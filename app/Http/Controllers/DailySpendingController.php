<?php

namespace App\Http\Controllers;

use App\Exports\DailySpendingExport;
use App\Models\DailySpending;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DailySpendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $umums = DailySpending::all();

        return view('umum.index', compact('umums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('umum.create');
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
            'uraian' => 'required|string',
            'image' => 'required|image|file|max:3024',
            'harga' => 'required|integer',
            'keterangan' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->hashName() . '.' . $file->getClientOriginalExtension();
            $request->image->move(storage_path('/../public/image'), $fileName);
            $validatedData['image'] = $fileName;
        }

        $total = DailySpending::all()->sum('harga');
        // dd($total);

        $validatedData['total'] = $request->input('harga') + $total;

        DailySpending::create($validatedData);

        return redirect()->route('pengeluaran-umum.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DailySpending  $feed
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $umum = DailySpending::find($id);

        return view('umum.show', compact('umum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DailySpending  $feed
     * @return \Illuminate\Http\Response
     */
    public function edit(DailySpending $feed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DailySpending  $feed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DailySpending $feed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DailySpending  $feed
     * @return \Illuminate\Http\Response
     */
    public function destroy(DailySpending $feed)
    {
        //
    }

    public function export()
    {
        $fileName = 'data-pengeluaran-umum-' . Carbon::now()->format('Y-m-d') . '.xlsx';

        return Excel::download(new DailySpendingExport, $fileName);
    }
}
