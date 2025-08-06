@extends('layouts.app')
@section('title', 'Absensi')
@section('content')
    <h1>Absen Masuk</h1>
    <div class="container">
        <form action="{{ route('buat-absen') }}" method="POST">
            @csrf

            <label for="nama">Nama</label>
            <select name="petugas_id" id="nama" disabled>
                <option value="{{ Auth::user()->id }}">{{ Auth::user()->nama_lengkap }}</option>
            </select>

            <p><b>Tanda Tangan</b></p>
            <canvas height="100" width="300" class="signature-pad"></canvas>
            <input type="hidden" name="signature" id="signature-input">
            <p><a href="#" class="clear-button">Clear</a></p>

            <button class="submit-button" type="submit">SUBMIT</button>
        </form>
    </div>

    {{-- Script --}}
    <script>
        const canvas = document.querySelector('.signature-pad');
        const ctx = canvas.getContext('2d');
        const form = document.querySelector('form');
        const signatureInput = document.getElementById('signature-input');
        const clearButton = document.querySelector('.clear-button');

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

        form.addEventListener('submit', (event) => {
            signatureInput.value = canvas.toDataURL();
        });
    </script>
@endsection
