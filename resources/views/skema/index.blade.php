@extends('layouts.app')
@section('title', 'Data Skema')
@section('content')

<div class="text-white d-flex justify-content-between align-items-center mb-3">
    <h3>Data Skema Sertifikasi</h3>
    <a href="{{ route('skema.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Skema
    </a>
</div>

<div class="card border-0 shadow-sm">
    <table class="table table-hover mb-0 align-middle">
        <thead class="table-clean">
            <tr><th>#</th><th>Kode</th><th>Nama Skema</th><th>Jumlah Peserta</th><th width="200">Aksi</th></tr>
        </thead>
        <tbody>
            @forelse($skemas as $i => $s)
            <tr>
                <td>{{ $skemas->firstItem() + $i }}</td>
                <td><code style="color: #FF70BF;">{{ $s->kode_skema }}</code></td>
                <td>{{ $s->nama_skema }}</td>
                <td><span class="badge bg-secondary">{{ $s->pesertas_count }}</span></td>
                <td>
                    <a href="{{ route('skema.edit', $s) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <a href="{{ route('skema.show', $s) }}" class="btn btn-sm btn-info text-white">
        <i class="bi bi-eye"></i>
    </a>
                    <form action="{{ route('skema.destroy', $s) }}"
                          method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin hapus data ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center text-muted py-4">Belum ada skema</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-3">{{ $skemas->links() }}</div>

@endsection