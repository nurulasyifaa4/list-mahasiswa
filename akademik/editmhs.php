<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body class="container mt-4">
    <h1 class="mb-4">Edit Data Mahasiswa</h1>
    <?php 
        require 'koneksi.php';
        if (!isset($_GET['key'])) {
            die("ID tidak ditemukan.");
        }

        $id = $_GET['key'];
        $edit = $koneksi->query("SELECT * FROM mahasiswa WHERE id='$id'");
        $data = $edit->fetch_assoc();
    ?>

    <form action="prosesmhs.php" method="post">
        <input type="hidden" name="id" value="<?= $data['id'] ?>" readonly>
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" value="<?= $data['nim']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="nama_mhs" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" value="<?= $data['nama_mhs']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $data['tgl_lahir']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= $data['alamat']; ?></textarea>
        </div>
        <div>
            <input type="submit" name="update" value="Simpan Perubahan" class="btn btn-warning">
            <a href="index.php?p=mahasiswa" class="btn btn-secondary">Kembali</a>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
