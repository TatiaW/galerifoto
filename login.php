<?php include 'koneksi.php'; session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Galeri Fotoku</title>
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-primary">
   <div class="container mt-5  mb-3 ">
      <div class="row justify-content-center ">
         <div class="col-md-4">
            <div class="card">
               <div class="card-header text-center">
                  HALAMAN lOGIN
               </div>
                  <?php 
                  //ambil data yang di kirim kan oleh <form> dengan method post
                  $submit=@$_POST['submit'];
                  if($submit=='Login'){
                     $username=$_POST['username'];
                     $password=md5($_POST['password']);
                     //cek apakah username dan password yang di masukan ke dalam <input> ada di database
                     $sql=mysqli_query($conn, "SELECT * FROM user WHERE Username='$username' AND Password='$password'");
                     $cek=mysqli_num_rows($sql);
                     if ($cek!=0) {
                        //ambil data dari database untuk membuat session
                        $sesi=mysqli_fetch_array($sql);
                        echo "<script> alert ('Login Berhasil');</script>";
                        $_SESSION['username']=$sesi['Username'];
                        $_SESSION['user_id']=$sesi['UserID'];
                        $_SESSION['email']=$sesi['Email'];
                        $_SESSION['nama_lengkap']=$sesi['NamaLengkap'];
                        echo '<meta http-equiv="refresh" content="0.8; url=./">';
                     }else{
                        echo "<script> alert ('Login Gagal!!!');</script>";
                        echo '<meta http-equiv="refresh" content="0.8; url=login.php">';
                     }
                  }
                  ?>

<form action="login.php" method="post">
         <div class="card-body">
         <label class="form-label">Username</label>
            <div class="input-group mb-2">
                <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                </svg></span>
             <input type="text" class="form-control" name="username" required placeholder="Masukkan Username" aria-describedby="basic-addon3">
            </div>

        <label class="form-label">Password</label>
            <div class="input-group mb-2">
                <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
             <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                </svg></span>
             <input type="password" class="form-control"  name="password" required placeholder="Masukkan Password" aria-describedby="basic-addon3">
            </div>

        <div class="row ms-auto p-1 me-1" style="width: 100px;">
        <button type="submit" value="Login" class="btn btn-primary" name="submit">Login</button>
        </div>

        <div class="text-center">
            Belum punya Akun? Silahkan <a href="daftar.php"> Daftar</a>
        </div>

    </div>
  </form>
               </div>
            </div>
         </div>
      </div>
   <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>