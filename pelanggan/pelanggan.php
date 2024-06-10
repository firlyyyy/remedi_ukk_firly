<?php
session_start();
if (empty($_SESSION['nama_pelanggan'])) {
    echo "<script>
    alert('Maaf, Anda belum login');
    window.location.assign('../index2.php');
    </script>";
    exit; // Ensure no further code is executed if not logged in
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir - Aplikasi Kasir</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3>APLIKASI KASIR</h3>
        <div class="alert alert-info">
            ANDA LOGIN SEBAGAI PELANGGAN <b><?= htmlspecialchars($_SESSION['nama_pelanggan']) ?></b>
        </div>
        <a href="pelanggan.php" class="btn btn-primary">pelanggan</a>
        <a href="pelanggan.php?url=barang" class="btn btn-primary">Barang</a>
        <a href="pelanggan.php?url=transaksi" class="btn btn-primary">Transaksi</a>
        <a href="pelanggan.php?url=logout" class="btn btn-danger">Logout</a>

        <div class="card mt-2">
            <div class="card-body">
                <?php
                // Set the current working directory to the directory of kasir.php
                chdir(__DIR__);

                $file = @$_GET['url'];
                if (empty($file)) {
                    echo "<h4> Selamat datang di halaman pelanggan </h4>";
                    echo "Aplikasi Kasir Sederhana";
                } else {
                    $file_path = $file . '.php';
                    if (file_exists($file_path)) {
                        include $file_path;
                    } else {
                        echo "<h4>Halaman tidak ditemukan</h4>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
<script src="../js/bootstrap.bundle.min.js"></script>
</html>
