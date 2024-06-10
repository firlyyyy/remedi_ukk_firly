<h5>Halaman Tambah Barang</h5>
<a href="?url=barang" class="btn btn-primary">Kembali</a>
<form method="post" action="?url=proses-tambah-barang">
    <div class="form-group mb-2">
        <label for="">Barang</label>
        <input type="text" name="barang" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label for="">Harga</label>
        <input type="number" name="harga" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label for="">Stok</label>
        <input type="number" name="stok" class="form-control" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="reset" class="btn btn-warning">Kosongkan</button>
    </div>
</form>