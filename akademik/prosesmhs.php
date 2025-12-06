<?php
require 'koneksi.php';

//insert
if (isset($_POST['submit'])) {
    $nim        = $_POST['nim'];
    $nama       = $_POST['nama_mhs'];
    $tgl_lahir  = $_POST['tgl_lahir'];
    $alamat     = $_POST['alamat'];

    $sql = "INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, alamat)
            VALUES ('$nim', '$nama', '$tgl_lahir', '$alamat')";
    
    $query = $koneksi->query($sql);

    if ($query) {
        header("Location: index.php?p=mahasiswa");
        exit;
    } else {
        echo "Gagal menyimpan data";
    }
}

//update
if (isset($_POST['update'])) {
    $id         = $_POST['id'];
    $nim        = $_POST['nim'];
    $nama       = $_POST['nama_mhs'];
    $tgl_lahir  = $_POST['tgl_lahir'];
    $alamat     = $_POST['alamat'];

    $sql = "UPDATE mahasiswa SET 
                nim='$nim',
                nama_mhs='$nama',
                tgl_lahir='$tgl_lahir',
                alamat='$alamat'
            WHERE id='$id'";

    $query = $koneksi->query($sql);

    if ($query) {
        header("Location: index.php?p=mahasiswa");
        exit;
    } else {
        echo "Gagal mengubah data";
    }
}

//delete
if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];

    $query = $koneksi->query("DELETE FROM mahasiswa WHERE id='$id'");

    if ($query) {
        header("Location: index.php?p=mahasiswa");
        exit;
    } else {
        echo "Gagal menghapus data";
    }
}
?>
