@extends('layouts.app')

@section('title', 'About')

@section('content')

{{-- CSS khusus untuk halaman ini agar mirip seperti desain --}}
<style>
    .about-container {
        display: flex; /* Membuat item di dalamnya sejajar */
        align-items: center; /* Membuat item rata tengah secara vertikal */
        gap: 30px; /* Memberi jarak antara gambar dan teks */
        margin-top: 20px;
    }

    .profile-image-wrapper {
        border: 2px solid black;
        padding: 15px;
        background-color: #f0f0f0; /* Warna latar belakang kotak gambar */
    }

    .profile-image {
        width: 150px;
        height: 150px;
        display: block;
    }

    .profile-details p {
        margin: 10px 0; /* Memberi sedikit jarak antar baris teks */
        font-size: 1.1em; /* Sedikit memperbesar ukuran font */
    }
</style>

<h2>About</h2>
<hr>

<div class="about-container">
    
    <div class="profile-image-wrapper">
        {{-- Ganti dengan path foto Anda yang sudah benar --}}
        {{-- Jika Anda tidak punya foto, bisa gunakan placeholder icon --}}
        <img src="{{ asset('storage/diri/aku.jpeg') }}" alt="Foto Profil" style="width: 150px; height: 150px; border-radius: 50%; margin-right: 20px;">
    </div>

    <div class="profile-details">
        <p>Aplikasi ini dibuat oleh:</p>
        <p><strong>Nama:</strong> Aura Primadita Pratama</p>
        <p><strong>Prodi:</strong> D3-MI PSDKU Kediri</p>
        <p><strong>NIM:</strong> 2331730115</p>
        <p><strong>Tanggal:</strong> 31 Maret 2005</p>
    </div>

</div>

@endsection