<?php 
    require 'koneksi.php';
    
    // Mengecek apakah ID dikirim melalui URL (mendukung parameter 'id' atau 'key')
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } elseif (isset($_GET['key'])) {
        $id = $_GET['key'];
    } else {
        die("ID tidak ditemukan.");
    }

    // Mengambil data lama berdasarkan ID
    $edit = $koneksi->query("SELECT * FROM program_studi WHERE id='$id'");
    $data = $edit->fetch_assoc();

    if (!$data) {
        die("Data program studi tidak ditemukan.");
    }
?>

<div class="container">
    <h1 class="mb-4">Edit Program Studi</h1>
    
    <form action="prosesps.php" method="POST"> 
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <div class="mb-3">
            <label for="nama_prodi" class="form-label">Nama Program Studi</label>
            <select name="nama_prodi" class="form-control" required>
                <option value="">Pilih Program Studi</option>
                <?php
                    $prodi_list = ["Teknologi Rekayasa Perangkat Lunak", "Teknik Komputer", "Manajemen Informatika", "Sistem Informasi", "Animasi"];
                    foreach ($prodi_list as $prodi) {
                        $selected = ($data['nama_prodi'] == $prodi) ? 'selected' : '';
                        echo "<option value='$prodi' $selected>$prodi</option>";
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="jenjang" class="form-label">Jenjang</label>
            <select name="jenjang" class="form-control" required>
                <option value="">Pilih Jenjang</option>
                <?php
                    $jenjang_list = ["D2", "D3", "D4", "S2"];
                    foreach ($jenjang_list as $j) {
                        $selected = ($data['jenjang'] == $j) ? 'selected' : '';
                        echo "<option value='$j' $selected>$j</option>";
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="akreditasi" class="form-label">Akreditasi</label>
            <select name="akreditasi" class="form-control" required>
                <option value="">Pilih Akreditasi</option>
                <?php
                    $akreditasi_list = ["Cukup Baik", "Baik", "Baik Sekali", "Sangat Baik"];
                    foreach ($akreditasi_list as $a) {
                        $selected = ($data['akreditasi'] == $a) ? 'selected' : '';
                        echo "<option value='$a' $selected>$a</option>";
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" name="keterangan" rows="3"><?= $data['keterangan'] ?></textarea>
        </div>

        <div class="mt-4">
            <button type="submit" name="update" class="btn btn-primary">Simpan</button>
            <a href="index.php?p=programstudi" class="btn btn-secondary">List Program Studi</a>
        </div>
    </form>
</div>