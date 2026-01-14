<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - SIAK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h1 class="mb-4 fw-bold">Login Form</h1>

                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" required>
                                <div id="emailHelp" class="form-text">Kami tidak akan pernah membagikan email Anda.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>

                        <hr class="my-4">

                        <div class="text-center">
                            <p class="mb-2 text-muted">Belum memiliki akun?</p>
                            <a href="register.php" class="btn btn-outline-success w-100">Daftar Akun Baru</a>
                        </div>

                        <div class="mt-3">
                            <?php
                            if (isset($_POST['email'])) {
                                $email = $_POST['email'];
                                $pass = md5($_POST['password']);

                                require 'koneksi.php';
                                $ceklogin = $koneksi->query("SELECT * FROM pengguna WHERE email ='$email' AND password='$pass'");

                                if ($ceklogin->num_rows == 1) {
                                    $data = $ceklogin->fetch_assoc();
                                    
                                    session_start();
                                    $_SESSION['login'] = TRUE;
                                    $_SESSION['email'] = $email;
                                    $_SESSION['nama_lengkap'] = $data['nama_lengkap'];

                                    header("Location: index.php");
                                    exit();
                                } else {
                                    echo "<div class='alert alert-danger mb-0'>Login gagal. Silakan cek email dan password Anda.</div>";
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