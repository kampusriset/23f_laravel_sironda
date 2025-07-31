@extends('layouts.app')
@section('content')
<div class="container mx-auto p-4"></div>
    <h1 class="text-2xl font-bold mb-4">Daftar Absen</h1>
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Nama</th>
                <th class="py-2 px-4 border-b">Tanggal</th>
                <th class="py-2 px-4 border-b">Status</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data Absen akan ditampilkan di sini -->
        </tbody>
    </table>
@endsection
