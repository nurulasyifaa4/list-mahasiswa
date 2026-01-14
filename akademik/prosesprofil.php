<?php
session_start();
require 'koneksi.php';

if (isset($_POST['update_profil'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama_lengkap'];
    $password = $_POST['password'];

    if (!empty($password)) {
        $pass_hash = md5($password);
        $sql = "UPDATE pengguna SET nama_lengkap='$nama', password='$pass_hash' WHERE id='$id'";
    } else {
        $sql = "UPDATE pengguna SET nama_lengkap='$nama' WHERE id='$id'";
    }

    if ($koneksi->query($sql)) {
        $_SESSION['nama_lengkap'] = $nama;
        header("Location: index.php?p=home");
        exit();
    } else {
        echo "Gagal: " . $koneksi->error;
    }
}
?>