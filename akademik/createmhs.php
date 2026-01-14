<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1 class="mb-4">Input Data Mahasiswa</h1>
    <form action="prosesmhs.php" method="post">
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" required>
        </div>
        <div class="mb-3">
            <label for="nama_mhs" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" required>
        </div>

        <div class="mb-3">
            <label for="prodi" class="form-label">Program Studi</label>
            <select name="prodi" id="prodi" class="form-control" required>
                <option value="">Pilih Program Studi</option>
                <option value="Teknologi Rekayasa Perangkat Lunak">Teknologi Rekayasa Perangkat Lunak</option>
                <option value="Teknik Komputer">Teknik Komputer</option>
                <option value="Manajemen Informatika">Manajemen Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Animasi">Animasi</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
        </div>
        <div>
            <input type="submit" name="submit" value="Kirim" class="btn btn-primary">
            <a href="index.php?p=mahasiswa" class="btn btn-secondary">List Mahasiswa</a>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>