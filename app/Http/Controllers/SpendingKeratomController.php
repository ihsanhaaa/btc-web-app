<?php

namespace App\Http\Controllers;

use App\Exports\SpendingKeratomExport;
use App\Models\SpendingKeratom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SpendingKeratomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluarans = SpendingKeratom::all();

        return view('keratom.pengeluaran.index', compact('pengeluarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keratom.pengeluaran.create');
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
            'total' => 'nullable|integer',
            'keterangan' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->hashName() . '.' . $file->getClientOriginalExtension();
            $request->image->move(storage_path('/../public/image'), $fileName);
            $validatedData['image'] = $fileName;
        }

        SpendingKeratom::create($validatedData);

        return redirect()->route('pengeluaran-keratom.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SpendingKeratom  $feed
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengeluaran = SpendingKeratom::find($id);

        return view('keratom.pengeluaran.show', compact('pengeluaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpendingKeratom  $feed
     * @return \Illuminate\Http\Response
     */
    public function edit(SpendingKeratom $feed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SpendingKeratom  $feed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpendingKeratom $feed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpendingKeratom  $feed
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpendingKeratom $feed)
    {
        //
    }

    public function export()
    {
        $fileName = 'data-pengeluaran-keratom-' . Carbon::now()->format('Y-m-d') . '.xlsx';

        return Excel::download(new SpendingKeratomExport, $fileName);
    }
}
