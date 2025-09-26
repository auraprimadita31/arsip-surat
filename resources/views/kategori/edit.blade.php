@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
    <h1>Kategori Surat >> Edit</h1>
    <p>Edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan".</p>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table width="100%">
            <tr>
                <td width="150px"><label>ID</label></td>
                <td><input type="text" value="{{ $kategori->id }}" disabled></td>
            </tr>
            <tr>
                <td><label for="nama_kategori">Nama Kategori</label></td>
                <td><input type="text" name="nama_kategori" id="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required></td>
            </tr>
            <tr>
                <td valign="top"><label for="keterangan">Keterangan</label></td>
                <td>
                    <textarea name="keterangan" id="keterangan" rows="5" style="width: 80%;" required>{{ old('keterangan', $kategori->keterangan) }}</textarea>
                </td>
            </tr>
        </table>
        <br>
        <a href="{{ route('kategori.index') }}"> &lt;&lt; Kembali</a>
        <button type="submit">Simpan</button>
    </form>
@endsection