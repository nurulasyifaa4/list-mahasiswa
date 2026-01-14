<?php
//session | cookies
session_start();
if(!isset($_SESSION['login'])){
  header("Location: login.php");
  exit(); // Menambahkan exit setelah redirect adalah best practice
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>SIAK - Dashboard Mahasiswa</title>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-warning shadow-sm">
      <div class="container">
        <a class="navbar-brand fw-bold" href="#"><i class="bi bi-mortarboard-fill me-2"></i>SIAK</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link <?= !isset($_GET['p']) || $_GET['p'] == 'home' ? 'active fw-bold' : '' ?>" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= isset($_GET['p']) && $_GET['p'] == 'mahasiswa' ? 'active fw-bold' : '' ?>" href="index.php?p=mahasiswa">List Mahasiswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= isset($_GET['p']) && $_GET['p'] == 'programstudi' ? 'active fw-bold' : '' ?>" href="index.php?p=programstudi">Program Studi</a>
            </li>
          </ul>

          <div class="d-flex align-items-center">
            <span class="navbar-text me-3 text-dark d-none d-sm-inline">
                Halo, <strong><?= $_SESSION['nama_lengkap']; ?></strong>
            </span>
            <a href="logout.php" class="btn btn-danger btn-sm px-3 rounded-pill" onclick="return confirm('Apakah Anda yakin ingin logout?')">
                <i class="bi bi-box-arrow-right me-1"></i> Logout
            </a>
          </div>
        </div>
      </div>
    </nav>

    <div class="container my-4">
        <?php 
            $page = isset($_GET['p']) ? $_GET['p'] : 'home';
            if($page == 'home') include 'home.php';
            if($page == 'mahasiswa') include 'listmhs.php';
            if($page == 'create') include 'createmhs.php';
            if($page == 'edit') include 'editmhs.php';
            if($page == 'programstudi') include 'listps.php';
            if($page == 'createps') include 'createps.php';
            if($page == 'editps') include 'editps.php';
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>