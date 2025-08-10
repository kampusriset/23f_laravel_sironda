@extends('layouts.app')
@section('title', 'Laporan')
@section('content')
    @php
        $namaHari = \App\Models\PlotRonda::where('petugas_id', Auth::id())->value('nama_hari');

        $petugases = collect();
        if ($namaHari) {
            $petugases = \App\Models\Petugas::with('absen')
                ->whereHas('absen', function ($q) use ($namaHari) {
                    $q->where('nama_hari', $namaHari);
                })
                ->get();
        }
    @endphp
    <div class="laporan-container">
        <h1 class="laporan-title">
            Rekap Malam ini, {{ now()->translatedFormat('d M Y') }}
        </h1>
        @if (session('success'))
            <div class="ronda-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('laporan-petugas') }}" method="POST">
            @csrf
            <input type="hidden" name="petugas_id" value="{{ Auth::user()->id }}">
            <div class="laporan-group">
                <label for="nama_lengkap" class="laporan-label">Nama Pelapor</label>
                <input type="text" name="nama_lengkap" value="{{ Auth::user()->nama_lengkap }}" readonly
                    class="laporan-input">
            </div>

            <div class="laporan-group">
                <label for="tanggal_laporan" class="laporan-label">Tanggal Laporan</label>
                <input type="text" name="tanggal_lapor" value="{{ now()->format('d-m-Y') }}" readonly
                    class="laporan-input">
            </div>
            
            @foreach($petugases as $petugas)
            <div class="laporan-group">
                <input type="checkbox" name="" id="">
                <label for="rekap_kehadiran" class="laporan-label">{{ $petugas->nama_lengkap }}</label>
            </div>
            @endforeach

            <div class="laporan-group">
                <label for="isi_laporan" class="laporan-label">Isi Laporan</label>
                <textarea name="isi_laporan" id="isi_laporan" cols="30" rows="10" class="laporan-textarea"></textarea>
            </div>

            <div class="laporan-group">
                <a href="{{ url('laporan') }}" style="color: white" class="laporan-button">Kembali</a>
                <button type="submit" class="laporan-button">Kirim Laporan</button>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const userLoggedIn = {!! json_encode(Auth::user()) !!}
            console.log(userLoggedIn)
        })
    </script>
@endsection
