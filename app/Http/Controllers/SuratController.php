<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{
    // Method index Anda sudah bagus, tidak perlu diubah.
    public function index(Request $request)
    {
        $query = Surat::query();
        if ($request->has('search') && !empty($request->search)) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }
        $surat = $query->with('kategori')->latest()->paginate(10);
        return view('surat.index', compact('surat'));
    }

    // Method create Anda sudah bagus.
    public function create()
    {
        $kategori = Kategori::all();
        return view('surat.create', compact('kategori'));
    }

    // Method store Anda sudah bagus.
    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string|max:255',
            'file_pdf' => 'required|mimes:pdf|max:2048',
        ]);

        $file = $request->file('file_pdf');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('pdf', $fileName, 'public');

        Surat::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori_id' => $request->kategori_id,
            'judul'       => $request->judul,
            'file_path'   => $filePath,
        ]);

        return redirect()->route('surat.index')->with('success', 'Data berhasil disimpan');
    }

    // Diubah menggunakan Route Model Binding (lebih ringkas)
    public function show(Surat $surat)
    {
        return view('surat.show', compact('surat'));
    }

    // [BARU] Menampilkan form untuk edit
    public function edit(Surat $surat)
    {
        $kategori = Kategori::all();
        return view('surat.edit', compact('surat', 'kategori'));
    }

    // [BARU] Menyimpan perubahan dari form edit
    public function update(Request $request, Surat $surat)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'judul'       => 'required|string|max:255',
            'file_pdf'    => 'nullable|mimes:pdf|max:2048', // Dibuat nullable jika file tidak diganti
        ]);

        $data = $request->except('file_pdf');

        if ($request->hasFile('file_pdf')) {
            // Hapus file lama
            Storage::delete($surat->file_path);

            // Upload file baru
            $file = $request->file('file_pdf');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('pdf', $fileName, 'public');
            $data['file_path'] = $filePath;
        }

        $surat->update($data);

        return redirect()->route('surat.index')->with('success', 'Data berhasil diperbarui.');
    }

    // Diubah menggunakan Route Model Binding
    public function destroy(Surat $surat)
    {
        Storage::delete($surat->file_path);
        $surat->delete();
        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus.');
    }

    // Diubah menggunakan Route Model Binding
    public function download(Surat $surat)
    {
        // Menambahkan nama file yang lebih rapi saat di-download
        $namaFileDownload = str_replace('/', '_', $surat->nomor_surat) . '.pdf';
        return Storage::download($surat->file_path, $namaFileDownload);
    }
}