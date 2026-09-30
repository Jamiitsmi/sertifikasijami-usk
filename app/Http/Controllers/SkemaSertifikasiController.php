<?php

namespace App\Http\Controllers;

use App\Models\SkemaSertifikasi;
use Illuminate\Http\Request;

class SkemaSertifikasiController extends Controller
{
    public function index()
    {
        $skemas = SkemaSertifikasi::withCount('pesertas')->latest()->paginate(10);
        return view('skema.index', compact('skemas'));
    }

    public function create()
    {
        return view('skema.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_skema' => 'required|string|max:50|unique:skema_sertifikasis,kode_skema',
            'nama_skema' => 'required|string|max:255',
            'deskripsi'  => 'nullable|string',
        ]);

        SkemaSertifikasi::create($validated);

        return redirect()->route('skema.index')
            ->with('success', 'Skema berhasil ditambahkan.');
    }

    public function show(SkemaSertifikasi $skema)
    {
        $skema->load('pesertas');
        return view('skema.show', compact('skema'));
    }

    public function edit(SkemaSertifikasi $skema)
    {
        return view('skema.edit', compact('skema'));
    }

    public function update(Request $request, SkemaSertifikasi $skema)
    {
        $validated = $request->validate([
            'kode_skema' => 'required|string|max:50|unique:skema_sertifikasis,kode_skema,' . $skema->id,
            'nama_skema' => 'required|string|max:255',
            'deskripsi'  => 'nullable|string',
        ]);

        $skema->update($validated);

        return redirect()->route('skema.index')
            ->with('success', 'Skema berhasil diubah.');
    }

    public function destroy(SkemaSertifikasi $skema)
    {
        $skema->delete();
        return redirect()->route('skema.index')
            ->with('success', 'Skema berhasil dihapus.');
    }
}