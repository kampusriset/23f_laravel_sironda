@extends('layouts.app')
@section('title', 'Jadwal')
@section('content')
    <h1>Jadwal Shift</h1>
    @if(Auth::user()->role == 'admin')
    <a class="create-nav" style="color: white" href="{{ url('buat-jadwal') }}">Buat Jadwal untuk Petugas</a>
    @endif
    <div class="calendar-container">
        <div class="calendar-grid">
            <a href="#" class="day-cell day-name"><strong>Minggu</strong></a>
            <a href="#" class="day-cell day-name"><strong>Senin</strong></a>
            <a href="#" class="day-cell day-name"><strong>Selasa</strong></a>
            <a href="#" class="day-cell day-name"><strong>Rabu</strong></a>
            <a href="#" class="day-cell day-name"><strong>Kamis</strong></a>
            <a href="#" class="day-cell day-name"><strong>Jumat</strong></a>
            <a href="#" class="day-cell day-name"><strong>Sabtu</strong></a>
        </div>
    </div>
    <div class="overlay"></div>
    <div class="petugas-container">
        <h1>Petugas</h1>
        <div class="petugas-list">

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const dataJadwal = {!! json_encode($plotRonda) !!}
            const days = document.querySelectorAll('.day-cell');
            const petugasList = document.querySelector('.petugas-list');
            const overlay = document.querySelector('.overlay')
            const containerPetugas = document.querySelector('.petugas-container')

            days.forEach(day => {
                const namaHari = day.textContent.toLowerCase();

                const jadwalHari = dataJadwal.find(jadwal => jadwal.nama_hari === namaHari && jadwal
                    .is_leader === '1');
                day.append(jadwalHari ? jadwalHari.petugas.nama_lengkap : 'Belum ada Petugas');

                day.addEventListener('click', (eve) => {
                    eve.preventDefault();
                    petugasList.innerHTML = '';


                    overlay.classList.add('overlay-active');
                    overlay.classList.remove('overlay');
                    containerPetugas.classList.remove('petugas-container');
                    containerPetugas.classList.add('petugas-container-active');


                    const petugasHariIni = dataJadwal.filter(j => j.nama_hari === namaHari);


                    petugasHariIni.forEach(jadwal => {
                        const div = document.createElement('div');
                        div.textContent =
                            `${jadwal.petugas.nama_lengkap} ${jadwal.is_leader === '1' ? '(Ketua)' : ''}`;
                        petugasList.appendChild(div);
                    });
                });
            });

            overlay.addEventListener('click', () => {
                overlay.classList.add('overlay')
                overlay.classList.remove('overlay-active')
                containerPetugas.classList.remove('petugas-container-active')
                containerPetugas.classList.add('petugas-container')
            })
        });
    </script>
@endsection
