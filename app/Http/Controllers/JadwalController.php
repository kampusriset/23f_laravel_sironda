<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\PlotRonda;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $plotRonda = PlotRonda::with('petugas')->get();
        return view('pages.jadwal.index', compact('plotRonda'));
    }

    public function create()
    {
        $petugas = Petugas::where('role', 'user')->get();
        return view('pages.jadwal.create', compact('petugas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'petugas_id' => 'required',
            'nama_hari' => 'required',
        ]);

        PlotRonda::create([
            'petugas_id' => $request->petugas_id,
            'nama_hari' => $request->nama_hari,
            'is_active' => $request->is_active,
            'is_leader' => $request->is_leader,
        ]);

        return redirect()->route('buat-jadwal')->with('success', 'Jadwal berhasil dibuat');
    }

    public function edit($id)
    {
        $plotRonda = PlotRonda::where('id', $id)->with('petugas')->first();
        return view('pages.jadwal.edit', compact('plotRonda'));
    }

    public function update(Request $request, $id)
    {
        $plotRonda = PlotRonda::where('id', $id)->first();
        $request->validate([
            'petugas_id' => 'required',
            'nama_hari' => 'required',
        ]);

        $data = $request->only('petugas_id', 'nama_hari', 'is_active', 'is_leader');
        $data['is_active'] = $request->has('is_active') ? '1' : '0';
        $data['is_leader'] = $request->has('is_leader') ? '1' : '0';

        $plotRonda->update($data);

        return redirect()->route('jadwal')->with('success', 'Jadwal berhasil diedit');
    }
}
