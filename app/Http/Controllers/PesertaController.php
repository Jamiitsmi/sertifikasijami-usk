<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\SkemaSertifikasi;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $pesertas = Peserta::with('skema')
            ->when($search, function ($q) use ($search) {
                $q->where(function ($sub) use ($search) {
                    $sub->where('nama', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('telepon', 'like', "%{$search}%")
                        ->orWhereHas('skema', fn($s) =>
                            $s->where('nama_skema', 'like', "%{$search}%")
                        );
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('peserta.index', compact('pesertas', 'search'));
    }

    public function create()
    {
        $skemas = SkemaSertifikasi::orderBy('nama_skema')->get();
        return view('peserta.create', compact('skemas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'required|email|unique:pesertas,email',
            'telepon'  => 'nullable|string|max:20',
            'alamat'   => 'nullable|string',
            'skema_id' => 'required|exists:skema_sertifikasis,id',
        ]);

        Peserta::create($validated);

        return redirect()->route('peserta.index')
            ->with('success', 'Data peserta berhasil ditambahkan.');
    }

    public function show(Peserta $peserta)
    {
        $peserta->load('skema');
        return view('peserta.show', compact('peserta'));
    }

    public function edit(Peserta $peserta)
    {
        $skemas = SkemaSertifikasi::orderBy('nama_skema')->get();
        return view('peserta.edit', compact('peserta', 'skemas'));
    }

    public function update(Request $request, Peserta $peserta)
    {
        $validated = $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'required|email|unique:pesertas,email,' . $peserta->id,
            'telepon'  => 'nullable|string|max:20',
            'alamat'   => 'nullable|string',
            'skema_id' => 'required|exists:skema_sertifikasis,id',
        ]);

        $peserta->update($validated);

        return redirect()->route('peserta.index')
            ->with('success', 'Data peserta berhasil diubah.');
    }

    public function destroy(Peserta $peserta)
    {
        $peserta->delete();
        return redirect()->route('peserta.index')
            ->with('success', 'Data peserta berhasil dihapus.');
    }
}