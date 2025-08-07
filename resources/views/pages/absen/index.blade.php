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
            <p>Status : <span class="status-active" id="status">
                    @php
                        $todayFormatted = \Carbon\Carbon::now()->translatedFormat('j F Y');
                    @endphp
                    Berhasil Absensi Untuk Tanggal {{ $todayFormatted }}
                </span>
            </p>
        </div>
    </div>
    <div>
         @php
            $today = now()->format('Y-m-d');
            $dayName = strtolower(now()->translatedFormat('l'));
            $hasAbsensiToday = $absensi->contains(function ($item) use ($today) {
                return \Carbon\Carbon::parse($item->tanggal_kehadiran)->format('Y-m-d') === $today;
            });
        @endphp

        @foreach (Auth::user()->plotRonda as $jadwal)
            @if ($jadwal->is_leader == '1' && $jadwal->nama_hari == $dayName && !$hasAbsensiToday)
                <a class="create-nav" style="color: white; background-color: green; padding: 8px 12px; border-radius: 6px;" href="{{ url('buat-absen') }}">Lakukan Absensi Masuk</a>
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
                    @foreach($absensi as $absen)
                    <tr>
                        <td>{{ $absen->tanggal_kehadiran }}</td>
                        <td><span class="accepted">Hadir</span></td>
                        <td><a class="edit-link" href="#">✏️</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
   <script>
    document.addEventListener('DOMContentLoaded', () => {
    const dataAbsen = {!! json_encode($absensi) !!}
    console.log(dataAbsen)
    })
   </script>
@endsection
