<?php include 'koneksi.php'; ?>
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
   <div class="container">
      <div class="mt-4 mb-3">
         <div class="row justify-content-center">
            <div class="col-md-4">
               <div class="card">
                  <h4 class="card-header text-center">HALAMAN DAFTAR</h4>
                  <?php
                  //ambil data yang di kirim kan oleh <form> dengan method post
                  $submit=@$_POST['submit'];
                  if ($submit=='Daftar') {
                     $username=@$_POST['username'];
                     $password=md5(@$_POST['password']);
                     $email=@$_POST['email'];
                     $nama_lengkap=@$_POST['nama_lengkap'];
                     $alamat=@$_POST['alamat'];
                     //cek apakah ada username dan email yang sama
                     //jika ada yang sama maka daftar akan gagal karena username atau email sudah di pakai orang lain
                     $cek=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE Username='$username' OR Email='$email' "));
                     if($cek==0){
                        mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','$email','$nama_lengkap','$alamat')");
                        echo "<script> alert ('Daftar Berhasil, Silahkan Login !!');</script>";
                        echo '<meta http-equiv="refresh" content="0.8; url=login.php">';
                     }else{
                        echo "<script> alert ('Maaf Akun Sudah Ada');</script>";
                        echo '<meta http-equiv="refresh" content="0.8; url=daftar.php">';
                   }
                  }
                  ?>
                  <form action="daftar.php" method="post">
                  <div class="card-body">
                        <label class="form-label" >Username</label><br>
                        <div class="input-group mb-2"> 
                        <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                         <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                        </svg></span>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan Username" aria-describedby="basic-addon3"required>
                    </div>

                        <label class="form-label">Password</label>
                        <div class="input-group mb-2"> 
                        <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                         </svg></span>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan Password" aria-describedby="basic-addon3" required>
                        </div>

                        <label class="form-label">Email</label>
                        <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                         <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                    </svg></span>
                        <input type="email" class="form-control" name="email" placeholder="email@gmail.com" aria-describedby="basic-addon3"required>
                     </div>

                        <label class="form-label">Nama Lengkap</label>
                        <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                </svg></span>
                        <input type="text" class="form-control" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" aria-describedby="basic-addon3"required>
                     </div>

                        <label class="form-label">Alamat</label>
                        <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                        </svg></span>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" aria-describedby="basic-addon3"required>
                     </div>
                     
                        <div class="row ms-auto p-1 me-1" style="width: 100px;">
                        <button type="submit" value="Daftar" class="btn btn-primary my-3" name="submit">Daftar</button>
                        </div>
                        <div class="text-center">
                         Sudah punya Akun? Silahkan <a href="login.php"> Login</a>
                           </div> 
                  </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>