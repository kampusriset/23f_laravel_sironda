<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        $absensi = Absen::all();
        return view('pages.absen.index', compact('absensi'));
    }

    public function create()
    {
        return view('pages.absen.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'petugas_id' => 'required',
            'tanggal_kehadiran' => 'required',
            'tanda_tangan' => 'required|image',
        ]);

        $data = $request->only('petugas_id', 'tanggal_kehadiran', 'tanda_tangan');
        $data['tanggal_kehadiran'] =  Carbon::parse($request->tanggal_kehadiran);
    }
}
