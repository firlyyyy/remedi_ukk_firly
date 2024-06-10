<?php
$username = $_POST['username'];
$password = $_POST['password'];

include 'koneksi.php';
$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$query = mysqli_query($koneksi, $sql);
if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_array($query);
    session_start();
    $_SESSION['username'] = $data['username'];

    // Redirect to kasir.php after successful login
    header('Location: kasir/kasir.php');
    exit; // Ensure no further code is executed after redirection
} else {
    // Redirect back to index.php if login fails
    echo "<script>
    alert('Maaf, Anda gagal login');
    window.location.assign('index.php');
    </script>";
    exit; // Ensure no further code is executed after redirection
}
?>
