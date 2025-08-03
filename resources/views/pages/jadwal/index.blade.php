@extends('layouts.app')
@section('title', 'Jadwal')
@section('content')
    <h1>Jadwal Shift</h1>
    <a class="create-nav" style="color: white" href="{{ url('buat-jadwal') }}">Buat Jadwal untuk Petugas</a>
    <div class="calendar-container">
        <div class="calendar-grid">
            <a href="#" class="day-cell"><strong>Minggu</strong></a>
            <a href="#" class="day-cell"><strong>Senin</strong></a>
            <a href="#" class="day-cell"><strong>Selasa</strong></a>
            <a href="#" class="day-cell"><strong>Rabu</strong></a>
            <a href="#" class="day-cell"><strong>Kamis</strong></a>
            <a href="#" class="day-cell"><strong>Jumat</strong></a>
            <a href="#" class="day-cell"><strong>Sabtu</strong></a>
        </div>
    </div>
    <div>
        <h2>Petugas yang bertugas di hari ini </h2>
        <div class="petugas-list">

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const dataJadwal = {!! json_encode($plotRonda) !!}
            const days = document.querySelectorAll('.day-cell');
            const petugasList = document.querySelector('.petugas-list');
            console.log(dataJadwal);
            days.forEach(day => {
                day.addEventListener('click', (eve) => {
                    eve.preventDefault()
                    petugasList.innerHTML = ``
                    dataJadwal.forEach(jadwal => {
                        if(jadwal.nama_hari == day.textContent.toLowerCase()) {
                            petugasList.innerHTML = `${jadwal.petugas.nama_lengkap} ${jadwal.is_leader == '1' ? 'Ketua' : ''}`
                        }
                    })
                })
            })
    });
    </script>
@endsection
