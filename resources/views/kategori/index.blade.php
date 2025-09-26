@extends('layouts.app')

@section('title', 'Kategori Surat')

@section('content')
    <h1>Kategori Surat</h1>
    <p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.
        <br>Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.
    </p>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('kategori.index') }}" method="GET" style="margin-bottom: 20px;">
        <label for="search">Cari kategori:</label>
        <input type="text" name="search" id="search" placeholder="Search..." value="{{ request('search') }}">
        <button type="submit">Cari!</button>
    </form>

    <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kategori as $k)
                <tr>
                    <td>{{ $k->id }}</td>
                    <td>{{ $k->nama_kategori }}</td>
                    <td>{{ $k->keterangan }}</td>
                    <td>
                        <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori {{ $k->nama_kategori }}?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background-color: red; color: white;">Hapus</button>
                        </form>
                        <a href="{{ route('kategori.edit', $k->id) }}" style="background-color: blue; color: white; padding: 5px; text-decoration: none;">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" align="center">Tidak ada data kategori yang tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <div style="margin-top: 20px;">
        <a href="{{ route('kategori.create') }}" style="background-color: #4CAF50; color: white; padding: 10px 15px; text-decoration: none;">
            (+) Tambah Kategori Baru
        </a>
    </div>
@endsection