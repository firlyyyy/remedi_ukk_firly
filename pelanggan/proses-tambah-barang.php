<?php
$barang = $_POST['barang'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

include '../koneksi.php';
$sql = "INSERT INTO barang(nama_barang,harga,stok) VALUES ('$barang','$harga','$stok')";
$query = mysqli_query($koneksi, $sql);
if ($query) {
    header("Location:?url=barang");
} else {
    echo "<script>
    alert('maaf data tidak tersimpan');
    window.location.assign('?url=barang');
    </script>";
}
?>