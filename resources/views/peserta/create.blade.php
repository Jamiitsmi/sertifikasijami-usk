@extends('layouts.app')
@section('title', 'Tambah Peserta')
@section('content')

<h3 class="text-white mb-3">Tambah Peserta</h3>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('peserta.store') }}" method="POST">
            @csrf
            @include('peserta._form', ['peserta' => null])
            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('peserta.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

@endsection