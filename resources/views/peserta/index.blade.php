@extends('layouts.app')
@section('title', 'Data Peserta')
@section('content')

<div class="text-white d-flex justify-content-between align-items-center mb-3">
    <h3>Data Peserta</h3>
    <a href="{{ route('peserta.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Peserta
    </a>
</div>

<form method="GET" class="row g-2 mb-3">
    <div class="col-md-4">
        <input type="text" name="search" value="{{ $search }}"
               class="form-control" placeholder="Cari nama/email/telepon/skema">
    </div>
    <div class="col-auto">
        <button class="text-white btn btn-outline-secondary">Cari</button>
        @if($search)
            <a href="{{ route('peserta.index') }}" class="btn btn-link">Reset</a>
        @endif
    </div>
</form>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover mb-0 align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Skema</th>
                    <th width="200">Aksi</th>
            </thead>
            <tbody>
                @forelse($pesertas as $i => $p)
                <tr>
                    <td>{{ $pesertas->firstItem() + $i }}</td>
                    <td>{{ $p->nik }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->telepon ?? '-' }}</td>
                    <td><span class="badge bg-info">{{ $p->skema->nama_skema ?? '-' }}</span></td>
                    <td>
                        <a href="{{ route('peserta.show', $p) }}" class="btn btn-sm btn-info text-white">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('peserta.edit', $p) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('peserta.destroy', $p) }}"
                              method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted py-4">Data tidak ditemukan</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">{{ $pesertas->links() }}</div>

@endsection