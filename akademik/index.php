<?php
// Memulai session untuk pengecekkan login
session_start();

// Jika session login tidak ada, paksa kembali ke login.php
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIAK - Sistem Informasi Akademik</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand {
            letter-spacing: 1px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-warning shadow-sm sticky-top">
      <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">
            <i class="bi bi-mortarboard-fill me-2"></i>SIAK
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link <?= !isset($_GET['p']) || $_GET['p'] == 'home' ? 'active fw-bold' : '' ?>" href="index.php?p=home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= isset($_GET['p']) && $_GET['p'] == 'mahasiswa' ? 'active fw-bold' : '' ?>" href="index.php?p=mahasiswa">List Mahasiswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= isset($_GET['p']) && $_GET['p'] == 'programstudi' ? 'active fw-bold' : '' ?>" href="index.php?p=programstudi">Program Studi</a>
            </li>
          </ul>

          <div class="dropdown">
            <button class="btn btn-dark btn-sm dropdown-toggle rounded-pill px-3" type="button" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle me-1"></i> <?= $_SESSION['nama_lengkap']; ?>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                <li>
                    <a class="dropdown-item" href="index.php?p=edit_profil">
                        <i class="bi bi-person-gear me-2"></i>Edit Profil
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item text-danger" href="logout.php" onclick="return confirm('Yakin ingin logout?')">
                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                    </a>
                </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <div class="container my-5">
        <?php 
            // Mengambil parameter p dari URL, default adalah 'home'
            $page = isset($_GET['p']) ? $_GET['p'] : 'home';

            // Logika Routing/Pemanggilan File Halaman
            if($page == 'home') include 'home.php';
            
            // Modul Mahasiswa
            if($page == 'mahasiswa') include 'listmhs.php';
            if($page == 'create') include 'createmhs.php';
            if($page == 'edit') include 'editmhs.php';
            
            // Modul Program Studi
            if($page == 'programstudi') include 'listps.php';
            if($page == 'createps') include 'createps.php';
            if($page == 'editps') include 'editps.php';
            
            // Fitur User
            if($page == 'edit_profil') include 'editprofil.php';
        ?>
    </div>

    <footer class="text-center py-4 text-muted border-top bg-white">
        <small>&copy; 2026 SIAK Akademik - All Rights Reserved</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>