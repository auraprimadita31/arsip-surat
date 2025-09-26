@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <h1>Kategori Surat >> Tambah</h1>
    <p>Tambahkan atau edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan".</p>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <table width="100%">
            <tr>
                <td width="150px"><label>ID (Auto Increment)</label></td>
                <td><input type="text" value="Otomatis" disabled></td>
            </tr>
            <tr>
                <td><label for="nama_kategori">Nama Kategori</label></td>
                <td><input type="text" name="nama_kategori" id="nama_kategori" value="{{ old('nama_kategori') }}" required></td>
            </tr>
            <tr>
                <td valign="top"><label for="keterangan">Keterangan</label></td>
                <td>
                    <textarea name="keterangan" id="keterangan" rows="5" style="width: 80%;" required>{{ old('keterangan') }}</textarea>
                </td>
            </tr>
        </table>
        <br>
        <a href="{{ route('kategori.index') }}"> &lt;&lt; Kembali</a>
        <button type="submit">Simpan</button>
    </form>
@endsection