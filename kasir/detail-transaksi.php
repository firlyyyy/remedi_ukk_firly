<?php
$id = $_GET['id'];
?>

<h5>Detail Transaksi</h5>
<hr>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
        <td>No</td>
        <td>ID</td>
        <td>Nama Barang</td>
        <td>Harga</td>
        <td>Stok</td>
        <td>Hapus</td>
    </tr>
    <?php
    include '../koneksi.php';
    $no = 1;
    $sql = "SELECT * FROM barang ORDER BY harga DESC";
    $query = mysqli_query($koneksi, $sql);
    while ($data = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($data['id']); ?></td>
            <td><?= htmlspecialchars($data['nama_barang']); ?></td>
            <td><?= number_format($data['harga'], 2, ',', '.'); ?></td>
            <td><?= htmlspecialchars($data['stok']); ?></td>
            <td>
                <a href="?url=hapus-transaksi&id=<?= htmlspecialchars($data['id']); ?>" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
    <?php } ?>
</table>
