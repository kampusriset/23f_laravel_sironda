@extends('layouts.app')
@section('title', 'Absensi')
@section('content')
    <h1>Status Absensi Anda</h1>
    <div style="margin-bottom: 20px" class="container-status">
        <div class="circle-profile">
            <img src="" alt="">
        </div>
        <div style="display: flex; flex-direction: column; gap: 4px;">
            <p>Nama : {{ Auth::user()->nama_lengkap }}</p>
            <p>Status : <span class="status-active" id="status">Berhasil Absensi Untuk Tanggal 6 Agustus 2025</span>
            </p>
        </div>
    </div>
    <div>
        @foreach (Auth::user()->plotRonda as $jadwal)
            @if ($jadwal->is_leader == '1' && strtolower(\Carbon\Carbon::now()->translatedFormat('l')) == $jadwal->nama_hari)
                <a class="create-nav" style="color: white" href="{{ url('buat-absen') }}">Lakukan Absensi Masuk</a>
            @endif
        @endforeach
    </div>
    <div>
        <h1>Riwayat Absensi</h1>
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>Tanggal Absensi</th>
                        <th>Status Kehadiran</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>20 Februari 2025</td>
                        <td><span class="accepted">Hadir</span></td>
                        <td><a class="edit-link" href="#">✏️</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
   
@endsection
