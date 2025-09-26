@extends('layouts.app')

@section('title', 'Unggah Surat')

@section('content')
    <h1>Arsip Surat >> Unggah</h1>
    <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.</p>
    <p>Catatan: Gunakan file berformat PDF</p>

    @if ($errors->any())
        <div style="color: red;">
            <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <table width="100%">
            <tr>
                <td width="150px"><label for="nomor_surat">Nomor Surat</label></td>
                <td><input type="text" name="nomor_surat" id="nomor_surat" value="{{ old('nomor_surat') }}" required></td>
            </tr>
            <tr>
                <td><label for="kategori_id">Kategori</label></td>
                <td>
                    <select name="kategori_id" id="kategori_id" required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="judul">Judul</label></td>
                <td><input type="text" name="judul" id="judul" value="{{ old('judul') }}" style="width: 80%;" required></td>
            </tr>
            <tr>
                <td><label for="file_pdf">File Surat (PDF)</label></td>
                <td><input type="file" name="file_pdf" id="file_pdf" accept=".pdf" required></td>
            </tr>
        </table>
        <br>
        <a href="{{ route('surat.index') }}"> &lt;&lt; Kembali</a>
        <button type="submit">Simpan</button>
    </form>
@endsection