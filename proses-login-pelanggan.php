<?php
// Check if the form fields are set
if (isset($_POST['nama_pelanggan'], $_POST['email'])) {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $email = $_POST['email'];

    include 'koneksi.php';
    // Prepare and execute SQL query
    $sql = "SELECT * FROM pelanggan WHERE nama_pelanggan=? AND email=?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $nama_pelanggan, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if user exists
    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result);
        session_start();
        $_SESSION['nama_pelanggan'] = $data['nama_pelanggan'];
        
        // Redirect to pelanggan.php after successful login
        header('Location: pelanggan/pelanggan.php');
        exit; // Ensure no further code is executed after redirection
    } else {
        // Redirect back to index2.php if login fails
        echo "<script>
        alert('Maaf, Anda gagal login');
        window.location.assign('index2.php');
        </script>";
        exit; // Ensure no further code is executed after redirection
    }
} else {
    // Handle unset form fields
    echo "Form fields are not set.";
}
?>
