<div>
    <h2>{{ isset($penjualan) ? 'Edit Data Penjualan' : 'Tambah Data Penjualan' }}</h2>
    <form id="penjualanForm">
        @csrf
        <input type="hidden" id="id" value="{{ $penjualan->id ?? '' }}">
        <div class="form-group">
            <label for="nama_pembeli">Nama Pembeli</label>
            <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" value="{{ $penjualan->nama_pembeli ?? '' }}" required>
            <div class="invalid-feedback" id="nama_pembeli_error"></div>
        </div>
        <div class="form-group">
            <label for="nama_pakaian">Nama Pakaian</label>
            <input type="text" class="form-control" id="nama_pakaian" name="nama_pakaian" value="{{ $penjualan->nama_pakaian ?? '' }}" required>
            <div class="invalid-feedback" id="nama_pakaian_error"></div>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $penjualan->jumlah ?? '' }}" required>
            <div class="invalid-feedback" id="jumlah_error"></div>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" step="0.01" class="form-control" id="harga" name="harga" value="{{ $penjualan->harga ?? '' }}" required>
            <div class="invalid-feedback" id="harga_error"></div>
        <button type="button" id="saveBtn" class="btn btn-primary">Simpan</button>
        <button type="button" id="cancelBtn" class="btn btn-secondary">Kembali</button>
    </form>
</div>