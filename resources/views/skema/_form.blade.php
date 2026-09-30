<div class="mb-3">
    <label class="form-label">Kode Skema <span class="text-danger">*</span></label>
    <input type="text" name="kode_skema"
           value="{{ old('kode_skema', $skema->kode_skema ?? '') }}"
           class="form-control @error('kode_skema') is-invalid @enderror"
           placeholder="Contoh: SKM-001">
    @error('kode_skema')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Nama Skema <span class="text-danger">*</span></label>
    <input type="text" name="nama_skema"
           value="{{ old('nama_skema', $skema->nama_skema ?? '') }}"
           class="form-control @error('nama_skema') is-invalid @enderror"
           placeholder="Contoh: Junior Web Developer">
    @error('nama_skema')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="deskripsi" rows="4"
              class="form-control @error('deskripsi') is-invalid @enderror"
              placeholder="Deskripsi singkat skema (opsional)">{{ old('deskripsi', $skema->deskripsi ?? '') }}</textarea>
    @error('deskripsi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>