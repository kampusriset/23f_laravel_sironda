@extends('layouts.app')
@section('title', 'Ubah Jadwal')
@section('content')

          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <h1>Buat Jadwal</h1>
    <a class="create-nav" style="color: white" href="{{ url('jadwal') }}">Kembali ke Halaman Jadwal</a>
    <form action="{{ url('update-jadwal/' . $plotRonda->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-container">
            <div class="input-item">
                <label for="">Pilih Petugas</label>
                <select name="petugas_id">
                    <option>pilih Petugas</option>
                        <option value="{{ $plotRonda->petugas->id }}" selected>{{ $plotRonda->petugas->nama_lengkap }}</option>
                </select>
            </div>
            <div class="input-item">
                <label for="pilih_hari">Pilih Hari</label>
                <select id="select-days" name="nama_hari">
                    <option value="minggu">Minggu</option>
                    <option value="senin">Senin</option>
                    <option value="selasa">Selasa</option>
                    <option value="rabu">Rabu</option>
                    <option value="kamis">Kamis</option>
                    <option value="jumat">Jumat</option>
                    <option value="sabtu">Sabtu</option>
                </select>
            </div>
            <div class="input-item">
                <label for="IsLeader">Pemimpin Shift?</label>
                <input type="checkbox" name="is_leader" id="leader" value="1">
            </div>
            <div class="input-item">
                <label for="isActive">Aktifkan jadwal</label>
                <input type="checkbox" name="is_active" id="active" value="1">
            </div>
            <button class="btn-submit" type="submit">Simpan</button>
        </div>
        </form>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
            const daysValues = Array.from(document.querySelectorAll('#select-days option'))
            const detailPlotRonda = {!! json_encode($plotRonda) !!}
            const active = document.querySelector('#active')
            const leader = document.querySelector('#leader')

            if(detailPlotRonda.is_active == '1'){
                active.checked = true
            }

            if(detailPlotRonda.is_leader == '1'){
                leader.checked = true
            }

            daysValues.map(option => {
                if(detailPlotRonda.nama_hari == option.value){
                    option.setAttribute('selected', true)
                }
            });
        })
        </script>
@endsection
