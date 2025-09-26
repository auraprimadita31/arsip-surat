<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Menampilkan daftar kategori dengan fitur pencarian dan pagination.
     */
    public function index(Request $request)
    {
        $query = Kategori::query();

        // Logika untuk pencarian
        if ($request->has('search') && !empty($request->search)) {
            $query->where('nama_kategori', 'like', '%' . $request->search . '%')
                  ->orWhere('keterangan', 'like', '%' . $request->search . '%');
        }

        // Mengambil data dengan pagination (5 data per halaman)
        $kategori = $query->paginate(5);

        return view('kategori.index', compact('kategori'));
    }

    /**
     * Menampilkan form untuk membuat kategori baru.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Menyimpan kategori baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit kategori.
     * Menggunakan Route Model Binding (Kategori $kategori) untuk otomatis mencari data.
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Memperbarui data kategori di database.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        $kategori->update($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Menghapus kategori dari database.
     */
    public function destroy(Kategori $kategori)
    {
        // Menambahkan validasi sederhana, jika kategori masih digunakan oleh surat
        if ($kategori->surats()->count() > 0) {
            return redirect()->route('kategori.index')->with('error', 'Kategori tidak dapat dihapus karena masih digunakan oleh arsip surat.');
        }
        
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}