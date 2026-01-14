<h2>List Data Program Studi</h2>
<a href="index.php?p=createps" class="btn btn-primary mb-3">Input Data Prodi</a>

<table class="table table-bordered table-striped">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Nama Prodi</th>
            <th>Jenjang</th>
            <th>Akreditasi</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include("koneksi.php");
        $tampil = $koneksi->query("SELECT * FROM program_studi ORDER BY id ASC");
        $no = 1;
        while($row = $tampil->fetch_assoc()):
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama_prodi']; ?></td>
            <td><?= $row['jenjang']; ?></td>
            <td><?= $row['akreditasi']; ?></td>
            <td><?= $row['keterangan']; ?></td>
            <td>
                <a href="index.php?p=editps&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="prosesps.php?id=<?= $row['id'] ?>&aksi=hapus" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                    Hapus
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>