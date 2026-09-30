@extends('layouts.app')

@section('title', 'Detail Skema')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Detail Skema Sertifikasi</h3>
        <a href="{{ route('skema.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body">
            <table class="table table-borderless mb-0">
                <tr>
                    <th width="200">Kode Skema</th>
                    <td><code>{{ $skema->kode_skema }}</code></td>
                </tr>
                <tr>
                    <th>Nama Skema</th>
                    <td>{{ $skema->nama_skema }}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $skema->deskripsi ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Jumlah Peserta</th>
                    <td>
                        <span class="badge bg-secondary">{{ $skema->pesertas->count() }}</span>
                    </td>
                </tr>
                <tr>
                    <th>Dibuat</th>
                    <td>{{ $skema->created_at?->format('d M Y H:i') ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Diperbarui</th>
                    <td>{{ $skema->updated_at?->format('d M Y H:i') ?? '-' }}</td>
                </tr>
            </table>
        </div>
    </div>

    {{-- Daftar peserta yang terdaftar di skema ini --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h5 class="mb-3">Peserta yang Terdaftar</h5>
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="60">#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($skema->pesertas as $i => $p)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->telepon ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-3">
                                Belum ada peserta yang terdaftar di skema ini
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection