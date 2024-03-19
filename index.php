<?php include 'koneksi.php';
session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Fotoku</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary  ">
        <div class="container">
            <a class="navbar-brand mb-0 h1" href="?url=home">
            <img src="assets/img/picture.png" alt="Logo" width="40" height="34" class="d-inline-block align-text-top"> Galeri Fotoku</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
                <div class="navbar-nav ">
                    <a class="nav-link" href="?url=home">Home</a>
                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <a class="nav-link" href="?url=upload">Foto</a>
                        <a class="nav-link" href="?url=album">Album</a>
                        <a href="?url=galeri" class="nav-link">My Gallery</a>
                    </div>
                    <div class="navbar-nav ms-auto py-0">
                    <li class="nav-item dropdown">
          <a class="nav-link active fw-medium fs-5  dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Hi! @<?= ucwords($_SESSION['username'])?></a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?url=profile"> Profil <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
</svg></a></li>
            <li><a class="dropdown-item" href="?url=logout">Logout <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
</svg></a></li></ul>
                    </div>
                    <?php else : ?>
                        <a class="nav-link" href="login.php">Login</a>
                        <a class="nav-link" href="daftar.php">Daftar</a>
                    <?php endif; ?>
            
        </div>
    </nav>
    <?php
    $url = @$_GET["url"];
    if ($url == 'home') {
        include 'page/home.php';
    } elseif ($url == 'profile') {
        include 'page/profil.php';
    } else if ($url == 'upload') {
        include 'page/upload.php';
    } else if ($url == 'album') {
        include 'page/album.php';
    } else if ($url == 'like') {
        include 'page/like.php';
    } else if ($url == 'komentar') {
        include 'page/komentar.php';
    } else if ($url == 'detail') {
        include 'page/detail.php';
    } else if ($url == 'galeri') {
        include 'page/galeri.php';
    } else if ($url == 'albumdetail') {
        include 'page/albumdetail.php';
    } else if ($url == 'logout') {
        session_destroy();
        header("Location: ?url=home");
    } else {
        include 'page/home.php';
    }
    ?>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>