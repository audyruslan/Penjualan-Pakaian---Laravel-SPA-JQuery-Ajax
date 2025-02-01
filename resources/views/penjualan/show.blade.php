<div>
    <h2>Detail Data Penjualan</h2>
    <div>
        <p><strong>ID:</strong> {{ $penjualan->id }}</p>
        <p><strong>Nama Pembeli:</strong> {{ $penjualan->nama_pembeli }}</p>
        <p><strong>Nama Pakaian:</strong> {{ $penjualan->nama_pakaian }}</p>
        <p><strong>Jumlah:</strong> {{ $penjualan->jumlah }}</p>
        <p><strong>Harga:</strong> {{ $penjualan->harga }}</p>
    </div>
    <button id="backBtn" class="btn btn-secondary">Kembali</button>
</div>