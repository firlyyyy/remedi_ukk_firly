<h5>Halaman Data Barang</h5>
<a href="?url=tambah-barang" class="btn btn-primary">Tambah Barang</a>
<hr>
<table class="table table-striped table-border">
    <tr class="fw-bold">
        <td>No</td>
        <td>Nama Barang</td>
        <td>Harga</td>
        <td>Stok</td>
        <td>Edit</td>
        <td>Hapus</td>
    </tr>
    <?php
    include '../koneksi.php';
    $no = 1;
    $sql = "SELECT * FROM barang ORDER BY id DESC";
    $query = mysqli_query($koneksi, $sql);
    foreach($query as $data) { ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['nama_barang']; ?></td>
            <td><?php echo $data['harga']; ?></td>
            <td><?php echo $data['stok']; ?></td>
            <td>
                <a href="?url=edit-barang&id=<?php echo $data['id']; ?>" class="btn btn-warning">Edit</a>
            </td>
            <td>
                <a onClick="return confirm('Apakah Anda yakin ingin menghapus barang?')" href="?url=hapus-barang&id=<?php echo $data['id']; ?>" class="btn btn-danger">Hapus</a>
            </td>
        </tr>    
    <?php } ?>
</table>
