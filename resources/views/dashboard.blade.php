@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<h3 class="text-white mb-4">Dashboard</h3>

<div class="row g-3">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm bg-transparent text-white border border-light">
    <div class="card-body">
        <h6 class="text-white-50">Total Peserta</h6>
        <h2>{{ $totalPeserta }}</h2>
    </div>
</div>
    </div>
    <div class="col-md-6">
        <div class="card border-0 shadow-sm bg-transparent text-white border border-light">
    <div class="card-body">
        <h6 class="text-white-50">Total Skema</h6>
        <h2>{{ $totalSkema }}</h2>
    </div>
</div>
    </div>
</div>

<div class="card bg-transparent border border-light shadow-sm mt-4">
    <div class="card-body text-white">
        <h5 class="mb-3">Peserta Terbaru</h5>
        <table class="table table-borderless text-white mb-0" 
       style="--bs-table-bg: transparent; --bs-table-color: #fff;">
            <thead>
                <tr>
                    <th class="text-white-50">Nama</th>
                    <th class="text-white-50">Email</th>
                    <th class="text-white-50">Skema</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pesertaTerbaru as $p)
                    <tr>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->email }}</td>
                        <td>{{ $p->skema->nama_skema ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-white-50">
                            Belum ada data
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection