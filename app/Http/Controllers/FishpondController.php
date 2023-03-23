<?php

namespace App\Http\Controllers;

use App\Models\Fish;
use App\Models\Fishpond;
use Illuminate\Http\Request;

class FishpondController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kolams = Fishpond::all();
        

        return view('kolam.index', compact('kolams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kolam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nomor_kolam' => 'string',
        ]);
        
        $kolam = new Fishpond();
        $kolam->nomor_kolam = $request->input('nomor_kolam');
        $kolam->save();
        
        return redirect()->route('kolam.index')->with('success','Kolam berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fishpond  $fishpond
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kolam = Fishpond::find($id);
        $ikans = Fish::all();

        return view('kolam.show', compact('kolam', 'ikans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fishpond  $fishpond
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kolam = Fishpond::find($id);

        return view('kolam.edit', compact('kolam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fishpond  $fishpond
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kolam = Fishpond::find($id);

        $this->validate($request, [
            'nomor_kolam' => 'string',
        ]);

        $kolam->nomor_kolam = $request->input('nomor_kolam');
        $kolam->save();
        
        return redirect()->route('kolam.index')->with('success','Kolam berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fishpond  $fishpond
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kolam = Fishpond::findOrFail($id);
        $kolam->delete();

        return redirect()->route('kolam.index')->with('success', 'Kolam berhasil dihapus');
    }

    public function addFish($id)
    {
        $kolam = Fishpond::findOrFail($id);
        
        return view('kolam.add', compact('kolam'));
    }

    public function addToDBFish(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'fishpond_id' => 'required',
            'asal_ikan' => 'string',
            'jumlah_ekor' => 'required|integer',
            'jumlah_bobot' => 'required|integer',
            'min' => 'required|integer',
            'max' => 'required|integer',
            'sortir_berikut' => 'required|date',
            'bobot_pakan' => 'required|integer',
            'keterangan' => 'string',
        ]);
        
        Fish::create($validatedData);
        
        return redirect()->route('kolam.index')->with('success','Data ikan berhasil ditambahkan');
    }
}
