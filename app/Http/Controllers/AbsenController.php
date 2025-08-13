<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AbsenController extends Controller
{
    public function index()
    {
        $absensi = Absen::where('petugas_id', Auth::user()->id)->get();
        return view('pages.absen.index', compact('absensi'));
    }

    public function create()
    {
        return view('pages.absen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'petugas_id' => 'required',
            'tanggal_kehadiran' => 'required',
            'waktu_kehadiran' => 'required',
            'tanda_tangan' => 'required',
        ]);

        $data = $request->only('petugas_id', 'waktu_kehadiran', 'tanggal_kehadiran', 'tanda_tangan');
        $data['tanggal_kehadiran'] =  Carbon::parse($request->tanggal_kehadiran);
        $data['waktu_kehadiran'] =  Carbon::parse($request->waktu_kehadiran);

        $base64Image = $request->tanda_tangan;

        @[$type, $imageData] = explode(';base64,', $base64Image);
        @[$mime, $ext] = explode('/', str_replace('data:', '', $type));

        $imageData = base64_decode($imageData);

        $filename = 'tanda_tangan_' . time() . '.' . $ext;
        $data['tanda_tangan'] = $filename;

        Storage::disk('public')->put('tanda_tangan/'. $filename, $imageData);

        Absen::create($data);

        return back()->with('success', 'Berhasil melakukan absensi');
    }
}
