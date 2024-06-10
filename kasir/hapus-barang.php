<?php
$id = $_GET['id'];
include '../koneksi.php';
$sql = "DELETE FROM barang WHERE id='$id'";
$query = mysqli_query($koneksi, $sql);
if ($query) {
    header("Location:?url=barang");
} else {
    echo "<script>
    alert('maaf data tidak terhapus');
    window.location.assign('?url=barang');
    </script>";
}
?>