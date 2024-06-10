<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Kasir | Aplikasi Kasir</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <h4 class="text-center">LOGIN PELANGGAN</h4>
                <div class="card-body">
                    <form action="proses-login-pelanggan.php" method="post">
                        <div class="form-group mb-2">
                            <label for="">Nama Pelanggan</label>
                            <input type="text" name="username" class="form-control" placeholder="masukkan nama..." required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Email</label>
                            <input type="email" name="password" class="form-control" placeholder="masukkan email..." required>
                        </div>
                        <div class="form-group mb-2">
                            <button type="submit" class="btn btn-primary">LOGIN</button>
                        </div>
                        <a href="index.php">LOGIN SEBAGAI KASIR</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="js/bootstrap.bundle.min.js"></script>
</html>