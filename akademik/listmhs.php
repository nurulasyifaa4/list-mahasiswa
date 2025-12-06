<h2>List Data Mahasiswa</h2>
<a href="index.php?p=create" class="btn btn-primary mb-3">Isi List Mahasiswa</a>

<table class="table table-bordered table-striped">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php
        include("koneksi.php");
        $tampil = $koneksi->query("SELECT * FROM mahasiswa ORDER BY id ASC");
        $no = 1;

        while($row = $tampil->fetch_assoc()):
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nim']; ?></td>
            <td><?= $row['nama_mhs']; ?></td>
            <td><?= date('d-m-Y', strtotime($row['tgl_lahir'])); ?></td>
            <td><?= $row['alamat']; ?></td>
            <td>
                <a href="index.php?key=<?= $row['id'] ?>&p=edit" class="btn btn-warning btn-sm">Edit</a>
                <a href="prosesmhs.php?id=<?= $row['id'] ?>&aksi=hapus" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                    Hapus
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
