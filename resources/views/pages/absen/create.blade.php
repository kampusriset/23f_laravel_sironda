@extends('layouts.app')
@section('title', 'Absensi')
@section('content')
    <h1>Absen Masuk</h1>
    <div class="container">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{ route('buat-absen') }}" method="POST">
            @csrf
            <div class="input-items">
                <label for="nama">Nama</label>
                <select name="petugas_id" id="nama">
                    <option value="{{ Auth::user()->id }}" readonly>{{ Auth::user()->nama_lengkap }}</option>
                </select>
            </div>
            
            <div class="input-items">
                <label for="tanggal_kehadiran">Waktu Kehadiran</label>
                <input type="text" name="tanggal_kehadiran" value="{{ now()->format('Y-m-d') }}" readonly>
            </div>
            <div class="input-items">
                <label for="waktu_kehadiran">Waktu Kehadiran</label>
                <input type="text" name="waktu_kehadiran" value="{{ now()->format('H:i') }}" readonly>
            </div>

            <div class="input-items">
                <p><b>Tanda Tangan</b></p>
                <canvas height="100" width="300" class="signature-pad"></canvas>
                <div id="signature-alert"></div>
                <input type="hidden" name="tanda_tangan" id="signature-input">
                <div class="signature-button">
                    <p><a href="#" class="clear-button">Clear</a></p>
                    <p><button href="#" class="save-button">Simpan Tanda Tangan</button></p>
                </div>
            </div>

            <button class="submit-button" type="submit">SUBMIT</button>
        </form>
    </div>

    {{-- Script --}}
    <script>
        const canvas = document.querySelector('.signature-pad');
        const ctx = canvas.getContext('2d');
        const form = document.querySelector('form');
        const signatureInput = document.querySelector('#signature-input');
        const clearButton = document.querySelector('.clear-button');
        const saveButton = document.querySelector('.save-button');
        const signatureAlert = document.querySelector('#signature-alert');

        let writingMode = false;

        const getCursorPosition = (event) => {
            const rect = canvas.getBoundingClientRect();
            const positionX = event.clientX - rect.left;
            const positionY = event.clientY - rect.top;
            return [positionX, positionY];
        }

        const handlePointerDown = (event) => {
            writingMode = true;
            ctx.beginPath();
            const [x, y] = getCursorPosition(event);
            ctx.moveTo(x, y);
        }

        const handlePointerUp = () => {
            writingMode = false;
        }

        const handlePointerMove = (event) => {
            if (!writingMode) return;
            const [x, y] = getCursorPosition(event);
            ctx.lineTo(x, y);
            ctx.stroke();
        }

        const clearPad = () => {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        }

        canvas.addEventListener('pointerdown', handlePointerDown);
        canvas.addEventListener('pointerup', handlePointerUp);
        canvas.addEventListener('pointermove', handlePointerMove);
        clearButton.addEventListener('click', (event) => {
            event.preventDefault();
            clearPad();
        });

        ctx.lineWidth = 3;
        ctx.lineJoin = ctx.lineCap = 'round';

        saveButton.addEventListener('click', (event) => {
            event.preventDefault();
            signatureInput.value = canvas.toDataURL();
            signatureAlert.style.display = 'block'
            signatureAlert.innerText = `Tanda Tangan Telah Disimpan`

            setTimeout(() => {
                signatureAlert.remove()
            }, 3000);
        });


    </script>
@endsection
