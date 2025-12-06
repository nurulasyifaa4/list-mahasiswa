<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>List Data Mahasiswa</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-warning">
  <div class="container">
    <a class="navbar-brand" href="#">SIAK</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=mahasiswa">List Mahasiswa</a>
        </li>
      </ul>
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
    ?>
</div>
</body>
</html>
