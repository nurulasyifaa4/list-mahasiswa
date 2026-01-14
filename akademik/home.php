<div class="row">
    <div class="col-lg-4 mb-4">
        <div class="card shadow-sm border-0 text-center p-4">
            <div class="card-body">
                <img src="https://ui-avatars.com/api/?name=<?= urlencode($_SESSION['nama_lengkap']); ?>&background=0D6EFD&color=fff" class="rounded-circle mb-3" width="100">
                <h5 class="fw-bold">Halo, <?= $_SESSION['nama_lengkap']; ?></h5>
                <p class="text-muted small">Mahasiswa Aktif</p>
                <hr>
                <div class="d-grid">
                    <a href="index.php?p=edit_profil" class="btn btn-outline-primary btn-sm rounded-pill">Edit Profil</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 p-4">
            <h2 class="text-primary fw-bold">Selamat Datang di SIAK</h2>
            <p class="text-secondary">Gunakan menu di atas untuk mengelola data akademik Anda.</p>
        </div>
    </div>
</div>