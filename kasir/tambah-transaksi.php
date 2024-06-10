<h5>Halaman Tambah Transaksi</h5>
<a href="?url=transaksi" class="btn btn-primary">Kembali</a>
<form method="post" action="?url=proses-tambah-transaksi">
    <div class="form-group mb-2">
        <label for="">Id Pelanggan</label>
        <input type="text" name="id_pelanggan" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label for="">Tanggal Transaksi</label>
        <input type="date" name="tanggal_transaksi" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label for="">Total</label>
        <input type="number" name="total" class="form-control" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="submit" class="btn btn-warning">Kosongkan</button>
    </div>
</form>