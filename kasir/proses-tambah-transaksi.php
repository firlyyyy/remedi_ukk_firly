<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Debugging: Check if POST data is received
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    if (isset($_POST['id_pelanggan'], $_POST['tanggal_transaksi'], $_POST['total'])) {
        $id_pelanggan = $_POST['id_pelanggan'];
        $tanggal_transaksi = $_POST['tanggal_transaksi'];
        $total = $_POST['total'];

        // Validate total to ensure it is a valid number
        if (is_numeric($total)) {
            include '../koneksi.php';

            // Check if id_pelanggan exists in pelanggan table
            $stmt = $koneksi->prepare("SELECT COUNT(*) FROM pelanggan WHERE id = ?");
            $stmt->bind_param("s", $id_pelanggan);
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();
            $stmt->close();

            if ($count > 0) {
                // Prepare the SQL statement to prevent SQL injection
                $stmt = $koneksi->prepare("INSERT INTO transaksi (id_pelanggan, tanggal_transaksi, total_transaksi) VALUES (?, ?, ?)");
                if ($stmt) {
                    $stmt->bind_param("ssd", $id_pelanggan, $tanggal_transaksi, $total); // ssd = string, string, double
                    $stmt->execute();

                    if ($stmt->affected_rows > 0) {
                        header("Location:?url=transaksi");
                    } else {
                        echo "<script>
                        alert('Maaf, data tidak tersimpan');
                        window.location.assign('?url=transaksi');
                        </script>";
                    }

                    $stmt->close();
                } else {
                    echo "Error preparing statement: " . $koneksi->error;
                }
            } else {
                echo "<script>
                alert('ID Pelanggan tidak ditemukan');
                window.location.assign('?url=transaksi');
                </script>";
            }

            $koneksi->close();
        } else {
            echo "<script>
            alert('Total transaksi harus berupa angka');
            window.location.assign('?url=transaksi');
            </script>";
        }
    } else {
        echo "<script>
        alert('Semua data harus diisi');
        window.location.assign('?url=transaksi');
        </script>";
    }
}
?>
