<?php
require 'koneksi.php';
$email_session = $_SESSION['email'];
$query = $koneksi->query("SELECT * FROM pengguna WHERE email = '$email_session'");
$data = $query->fetch_assoc();
?>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3"><h5 class="mb-0 fw-bold">Edit Profil</h5></div>
            <div class="card-body p-4">
                <form action="prosesprofil.php" method="POST">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" value="<?= $data['nama_lengkap'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email (Read-only)</label>
                        <input type="email" name="email" class="form-control bg-light" value="<?= $data['email'] ?>" readonly>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password Baru (Kosongkan jika tidak ganti)</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" name="update_profil" class="btn btn-primary text-white">Simpan Perubahan</button>
                        <a href="index.php?p=home" class="btn btn-light border">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>