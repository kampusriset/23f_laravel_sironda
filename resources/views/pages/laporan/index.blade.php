@extends('layouts.app')
@section('title', 'Laporan')
@section('content')
    <div class="ronda-container">
        <h1 class="ronda-title">Laporan Ronda</h1>

        @php
            $today = now()->format('Y-m-d');
            $dayName = strtolower(now()->translatedFormat('l'));
        @endphp

        {{-- @foreach (Auth::user()->plotRonda as $jadwal) --}}
            {{-- @if ($jadwal->nama_hari == $dayName) --}}
                <div class="ronda-links">
                    <a style="color: white" href="{{ url('laporan-petugas') }}" class="ronda-link">Laporan Ronda</a>
                    <a href="{{ url('rekap-petugas') }}" style="color: white" class="ronda-link">Rekap Ronda</a>
                </div>
            {{-- @else --}}
                <p class="ronda-warning">
                    Anda belum bisa melaporkan kejadian malam karena bukan jadwal anda
                </p>
            {{-- @endif --}}
        {{-- @endforeach --}}
        <p class="ronda-warning">
            Anda belum bisa melaporkan kejadian malam karena bukan jadwal anda
        </p>
        <div>
            <h1>Riwayat Laporan</h1>
            <div class="container">
                <table>
                    <thead>
                        <tr>
                            <th>Pelapor</th>
                            <th>Tanggal Laporan</th>
                            <th>isi laporan</th>
                            @if (Auth::user()->role == 'admin')
                                <th>Edit</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporanPetugas as $laporan)
                            <tr>
                                <td>{{ $laporan->petugas->nama_lengkap }}</td>
                                <td>{{ $laporan->tanggal_lapor }}</td>
                                <td>{{ $laporan->isi_laporan }}</td>
                                @if (Auth::user()->role == 'admin')
                                    <td><a class="edit-link" href="#">✏️</a></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
