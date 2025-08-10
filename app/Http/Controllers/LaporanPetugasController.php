<?php

namespace App\Http\Controllers;

use App\Models\LaporanPetugas;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporanPetugas = LaporanPetugas::all();
        return view('pages.laporan.index', compact('laporanPetugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.laporan.laporan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'petugas_id' => 'required',
            'tanggal_lapor' => 'required',
            'isi_laporan' => 'required',
        ]);

        $data = $request->only('petugas_id', 'tanggal_lapor', 'isi_laporan');
        $data['tanggal_lapor'] = Carbon::parse($request->tanggal_lapor);

        LaporanPetugas::create($data);

        return back()->with('success', 'Berhasil mengirimkan laporan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
