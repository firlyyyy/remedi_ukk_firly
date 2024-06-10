<?php
$id = $_GET['id'];
include '../koneksi.php';
$sql = "SELECT * FROM barang WHERE id='$id'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>

<h5>Halaman Edit Barang</h5>
<a href="?url=barang" class="btn btn-primary">Kembali</a>
<form method="post" action="?url=proses-edit-barang">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
    <div class="form-group mb-2">
        <label for="">Nama Barang</label>
        <input value="<?php echo htmlspecialchars($data['nama_barang']); ?>" type="text" name="nama_barang" class="form-control" required> 
    </div>
    <div class="form-group mb-2">
        <label for="">Harga</label>
        <input value="<?php echo htmlspecialchars($data['harga']); ?>" type="number" name="harga" class="form-control" required> 
    </div>
    <div class="form-group mb-2">
        <label for="">Stok</label>
        <input value="<?php echo htmlspecialchars($data['stok']); ?>" type="number" name="stok" class="form-control" required> 
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="reset" class="btn btn-warning">Kosongkan</button>
    </div>
</form>
