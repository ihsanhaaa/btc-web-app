<?php

namespace App\Http\Controllers;

use App\Exports\SpendingFishExport;
use App\Models\SpendingFish;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SpendingFishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluarans = SpendingFish::all();

        return view('kolam.pengeluaran.index', compact('pengeluarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kolam.pengeluaran.create');
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
            'jenis' => 'required|string',
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

        SpendingFish::create($validatedData);

        return redirect()->route('pengeluaran-ikan.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SpendingFish  $feed
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengeluaran = SpendingFish::find($id);

        return view('kolam.pengeluaran.show', compact('pengeluaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpendingFish  $feed
     * @return \Illuminate\Http\Response
     */
    public function edit(SpendingFish $feed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SpendingFish  $feed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpendingFish $feed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpendingFish  $feed
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpendingFish $feed)
    {
        //
    }

    public function export()
    {
        $fileName = 'data-pengeluaran-ikan-' . Carbon::now()->format('Y-m-d') . '.xlsx';

        return Excel::download(new SpendingFishExport, $fileName);
    }
}
