@extends('layouts.app')
@section('title', 'Detail Peserta')
@section('content')

<h3 class="mb-3">Detail Peserta</h3>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <table class="table table-borderless mb-0">
            <tr><th width="200">Nama</th><td>{{ $peserta->nama }}</td></tr>
            <tr><th>Email</th><td>{{ $peserta->email }}</td></tr>
            <tr><th>Telepon</th><td>{{ $peserta->telepon ?? '-' }}</td></tr>
            <tr><th>Alamat</th><td>{{ $peserta->alamat ?? '-' }}</td></tr>
            <tr><th>Skema</th>
                <td>
                    <strong>{{ $peserta->skema->kode_skema ?? '-' }}</strong> —
                    {{ $peserta->skema->nama_skema ?? '-' }}
                </td>
            </tr>
           <tr><th>Dibuat</th><td>{{ $peserta->created_at?->format('d M Y H:i') ?? '-' }}</td></tr>
        </table>
    </div>
</div>

<a href="{{ route('peserta.index') }}" class="btn btn-secondary mt-3">Kembali</a>

@endsection