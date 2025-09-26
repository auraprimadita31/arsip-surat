@extends('layouts.app')

@section('title', 'Arsip Surat')

@section('content')
    <h1>Arsip Surat</h1>
    <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.
        <br>Klik "Lihat" pada kolom aksi untuk menampilkan surat.
    </p>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('surat.index') }}" method="GET" style="margin-bottom: 20px;">
        <label for="search">Cari surat:</label>
        <input type="text" name="search" id="search" placeholder="Search..." value="{{ request('search') }}">
        <button type="submit">Cari!</button>
    </form>

    <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nomor Surat</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Waktu Pengarsipan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($surat as $s)
                <tr>
                    <td>{{ $s->nomor_surat }}</td>
                    <td>{{ $s->kategori->nama_kategori }}</td>
                    <td>{{ $s->judul }}</td>
                    <td>{{ $s->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <form action="{{ route('surat.destroy', $s->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus arsip surat {{ $s->judul }}?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background-color: red; color: white;">Hapus</button>
                        </form>
                        <a href="{{ route('surat.download', $s->id) }}" style="background-color: orange; color: white; padding: 5px; text-decoration: none;">Unduh</a>
                        <a href="{{ route('surat.show', $s->id) }}" style="background-color: blue; color: white; padding: 5px; text-decoration: none;">Lihat >></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" align="center">Tidak ada data surat yang tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <div style="margin-top: 20px;">
        <a href="{{ route('surat.create') }}" style="background-color: #4CAF50; color: white; padding: 10px 15px; text-decoration: none;">
            Arsipkan Surat...
        </a>
    </div>

    <div style="margin-top: 20px;">
        {{ $surat->links() }}
    </div>
@endsection