<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id']) && isset($_POST['nama_barang']) && isset($_POST['harga']) && isset($_POST['stok'])) {
        $id = mysqli_real_escape_string($koneksi, $_POST['id']);
        $nama_barang = mysqli_real_escape_string($koneksi, $_POST['nama_barang']);
        $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
        $stok = mysqli_real_escape_string($koneksi, $_POST['stok']);

        // Validasi untuk memastikan tidak ada field yang kosong
        if (!empty($nama_barang) && !empty($harga) && !empty($stok)) {
            $sql = "UPDATE barang SET nama_barang='$nama_barang', harga='$harga', stok='$stok' WHERE id='$id'";
            $query = mysqli_query($koneksi, $sql);

            if ($query) {
                header("Location: ?url=barang");
                exit();
            } else {
                echo "<script>
                alert('Maaf, data tidak tersimpan.');
                window.location.assign('?url=kasir');
                </script>";
            }
        } else {
            echo "Semua field harus diisi!";
        }
    } else {
        echo "Data tidak lengkap!";
    }
} else {
    echo "Metode pengiriman tidak valid!";
}
?>
