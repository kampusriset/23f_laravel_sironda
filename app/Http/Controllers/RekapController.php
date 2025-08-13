<?php


namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\RekapRondaHarian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekapController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.laporan.rekap');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_rekap'   => 'required|date_format:d-m-Y',
            'isi_laporan'     => 'required|string',
            'petugas_hadir'   => 'nullable|array',
        ]);

        $petugasHadir = $request->petugas_hadir ?? [];
        $jumlahPetugasHadir = count($petugasHadir);
        $tanggalRekap = Carbon::parse($request->tanggal_rekap);

        // Simpan rekap ronda
        $rekap = RekapRondaHarian::create([
            'petugas_id'              => Auth::id(),
            'tanggal_rekap'           => $tanggalRekap,
            'isi_rekap'             => $request->isi_laporan,
            'total_petugas_hadir'    => $jumlahPetugasHadir,
            'total_petugas_ijin'    => $jumlahPetugasHadir,
            'total_petugas_alpha'    => $jumlahPetugasHadir,
        ]);

        // Bulk insert absen untuk performa lebih baik
        if (!empty($petugasHadir)) {
            $absenData = collect($petugasHadir)->map(function ($petugasId) use ($tanggalRekap) {
                return [
                    'petugas_id'        => $petugasId,
                    'tanggal_kehadiran' => $tanggalRekap,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ];
            })->toArray();

            Absen::insert($absenData); // Bulk insert lebih cepat
        }

        $message = $jumlahPetugasHadir > 0
            ? "Laporan berhasil dikirim dengan {$jumlahPetugasHadir} petugas hadir."
            : "Laporan berhasil dikirim tanpa petugas hadir.";

        return redirect()->back()->with('success', $message);
    }
}
