<div class="mb-3">
    <label class="form-label">NIK <span class="text-danger">*</span></label>
    <input type="text" name="nik"
           value="{{ old('nik', $peserta->nik ?? '') }}"
           class="form-control @error('nik') is-invalid @enderror"
           placeholder="Contoh: 8228492748271837"
           maxlength="16">
    @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>


<div class="mb-3">
    <label class="form-label">Nama <span class="text-danger">*</span></label>
    <input type="text" name="nama"
           value="{{ old('nama', $peserta->nama ?? '') }}"
           class="form-control @error('nama') is-invalid @enderror"
           placeholder="Nama lengkap peserta">
    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Email <span class="text-danger">*</span></label>
    <input type="email" name="email"
           value="{{ old('email', $peserta->email ?? '') }}"
           class="form-control @error('email') is-invalid @enderror"
           placeholder="contoh@email.com">
    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Telepon</label>
    <input type="text" name="telepon"
           value="{{ old('telepon', $peserta->telepon ?? '') }}"
           class="form-control @error('telepon') is-invalid @enderror"
           placeholder="08xxxxxxxxxx">
    @error('telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Alamat</label>
    <textarea name="alamat" rows="3"
              class="form-control @error('alamat') is-invalid @enderror"
              placeholder="Alamat lengkap (opsional)">{{ old('alamat', $peserta->alamat ?? '') }}</textarea>
    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Skema Sertifikasi <span class="text-danger">*</span></label>
    <select name="skema_id" class="form-select @error('skema_id') is-invalid @enderror">
        <option value="">-- Pilih Skema --</option>
        @foreach($skemas as $s)
            <option value="{{ $s->id }}"
                @selected(old('skema_id', $peserta->skema_id ?? '') == $s->id)>
                {{ $s->kode_skema }} - {{ $s->nama_skema }}
            </option>
        @endforeach
    </select>
    @error('skema_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>