<h5>Halaman Transaksi </h5>
<a href="?url=tambah-transaksi" class="btn btn-primary">Tambah Pesasanan</a>
<hr>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
        <td>No</td>
        <td>Id Pelanggan</td>
        <td>Tanggal Transaksi</td>
        <td>Total</td>
        <td>Edit</td>
        <td>Hapus</td>
    </tr>
    <?php
    include '../koneksi.php';
    $no = 1;
    $sql = "SELECT * FROM transaksi ORDER BY id DESC";
    $query = mysqli_query($koneksi, $sql);
    foreach ($query as $data) { ?> 
        <tr>
            <td><? $no++; ?></td>
            <td><? $data['id_pelanggan'] ?></td>
            <td><? $data['tanggal_transaksi'] ?></td>
            <td><? $data['total_transaksi'] ?></td>
            <td>
                <a href="?url=edit-transaksi&id=<? $data['id'] ?>" class="btn btn-warning">Edit</a>
            </td>
            <td>
                <a onClick="return confrim('apakah anda yakin ingin menghapus?')" href="?url=hapus-transaksi$id=<? $data['id'] ?>" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
    <?php } ?>
</table>