<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - SIAK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h2 class="mb-4 fw-bold">Daftar Akun</h2>

                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" placeholder="Masukkan nama lengkap" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="contoh@gmail.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Masukkan password" required>
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" name="register" class="btn btn-primary">Daftar Sekarang</button>
                                <a href="login.php" class="btn btn-outline-secondary">Kembali ke Login</a>
                            </div>
                        </form>

                        <div class="mt-3">
                            <?php
                            if (isset($_POST['register'])) {
                                require 'koneksi.php';

                                // Mengambil data dari form
                                $nama = $_POST['nama_lengkap'];
                                $email = $_POST['email'];
                                // Menggunakan md5 sesuai dengan format password yang ada di gambar database Anda
                                $pass = md5($_POST['password']); 

                                // 1. Cek apakah email sudah terdaftar di tabel pengguna
                                $cek_email = $koneksi->query("SELECT email FROM pengguna WHERE email = '$email'");
                                
                                if ($cek_email->num_rows > 0) {
                                    echo "<div class='alert alert-warning'>Email ini sudah terdaftar. Silakan gunakan email lain.</div>";
                                } else {
                                    // 2. Insert ke database sesuai nama kolom di gambar: email, password, nama_lengkap
                                    $sql = "INSERT INTO pengguna (email, password, nama_lengkap) VALUES ('$email', '$pass', '$nama')";
                                    $insert = $koneksi->query($sql);

                                    if ($insert) {
                                        echo "<div class='alert alert-success'>Akun berhasil dibuat! Silakan <a href='login.php' class='fw-bold'>Login di sini</a>.</div>";
                                    } else {
                                        echo "<div class='alert alert-danger'>Terjadi kesalahan: " . $koneksi->error . "</div>";
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>