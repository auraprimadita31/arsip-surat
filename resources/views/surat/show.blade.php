@extends('layouts.app')

@section('title', 'Lihat Surat')

@section('content')
    <h1>Arsip Surat >> Lihat</h1>
    <p>
        <strong>Nomor:</strong> {{ $surat->nomor_surat }} <br>
        <strong>Kategori:</strong> {{ $surat->kategori->nama_kategori }} <br>
        <strong>Judul:</strong> {{ $surat->judul }} <br>
        <strong>Waktu Unggah:</strong> {{ $surat->created_at->format('Y-m-d H:i:s') }}
    </p>

    {{-- BENAR --}}

    <iframe src="{{ Storage::url($surat->file_path) }}"
        align="top"
        height="500"
        width="100%"
        frameborder="0"
        scrolling="auto">
    </iframe>

    <br><br>
    <a href="{{ route('surat.index') }}"> &lt;&lt; Kembali</a>
    <a href="{{ route('surat.download', $surat->id) }}" style="background-color: orange; color: white; padding: 5px; text-decoration: none;">Unduh</a>
    <a href="{{-- route('surat.edit', $surat->id) --}}" style="background-color: #f2f2f2; padding: 5px; text-decoration: none; color: black; border: 1px solid #ccc;">
        Edit/Ganti File
    </a>
@endsection