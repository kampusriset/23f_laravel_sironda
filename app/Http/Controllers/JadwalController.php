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
            'isActive' => 'required',
            'isLeader' => 'required',
        ]);

        PlotRonda::create([
            'petugas_id' => $request->petugas_id,
            'nama_hari' => $request->nama_hari,
            'isActive' => $request->isActive,
            'isLeader' => $request->isLeader,
        ]);

        return redirect()->route('buat-jadwal')->with('success', 'Jadwal berhasil dibuat');
    }
}
