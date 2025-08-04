@extends('layouts.app')
@section('title', 'Buat Jadwal')
@section('content')
<h1>Buat Jadwal</h1>
<a class="create-nav" style="color: white" href="{{ url('jadwal') }}">Kembali ke Halaman Jadwal</a>
<form action="{{ route('buat-jadwal') }}" method="POST">
    @csrf
    <label for="">Pilih Petugas</label>
    <select name="petugas_id" id="">
        <option>pilih Petugas</option>
        @foreach ($petugas as $p)
        <option value="{{ $p->id }}">{{ $p->nama_lengkap }}</option>
        @endforeach
    </select>
    <label for="pilih_hari">Pilih Hari</label>
    <select name="nama_hari">
        <option value="minggu">Minggu</option>
        <option value="senin">Senin</option>
        <option value="selasa">Selasa</option>
        <option value="rabu">Rabu</option>
        <option value="kamis">Kamis</option>
        <option value="jumat">Jumat</option>
        <option value="sabtu">Sabtu</option>
    </select>
    <label for="IsLeader">Pemimpin Shift Hari ini?</label>
    <input type="checkbox" name="isLeader" id="leader" value="1">
    <label for="isActive">Aktifkan jadwal</label>
    <input type="checkbox" name="isActive" id="active" value="1">
    <button type="submit">Simpan</button>
</form>

@endsection
