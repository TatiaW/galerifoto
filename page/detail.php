<?php
$details = mysqli_query($conn, "SELECT * FROM foto INNER JOIN user ON foto.UserID=user.UserID WHERE foto.FotoID='$_GET[id]'");
$data = mysqli_fetch_array($details);
$likes = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM likefoto WHERE FotoID='$_GET[id]'"));
$cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM likefoto WHERE FotoID='$_GET[id]' AND UserID='" . @$_SESSION['user_id'] . "'"));
?>
<div class="container mt-2">
   <div class="row">
      <div class="col-6">
         <div class="card ">
            <div class="d-grid gap-2 d-md-block mt-2 mb-2 ms-3 me-3 fw-bolder">
               <a href="?url=home" class="btn btn-outline-primary btn-sm ">Kembali</a> Postingan
            </div>
            <img src="uploads/<?= $data['NamaFile'] ?>" alt="<?= $data['JudulFoto'] ?>" class="object-fit-cover">
            <div class="card-body">
               
               <h3 class="card-title mb-0 mt-0"><?= $data['JudulFoto'] ?> <a href="<?php if (isset($_SESSION['user_id'])) {
                  echo '?url=like&&id=' . $data['FotoID'] . '';
                   } else {
                     echo 'login.php';
                    } ?>" class="btn btn-sm <?php if ($cek == 0) {
                     echo "text-secondary";
                    } else {
                     echo "text-danger";
                   } ?> "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                   <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                 </svg> <?= $likes ?></a></h3>

               <small class="text-muted mb-3 mt-0">@<?= $data['Username'] ?> </small><?= $data['DeskripsiFoto'] ?>
               <br><small class="text-muted mb-3"><?= $data['TanggalUnggah'] ?></small>
               <?php
               //ambil data komentar
               $komen_id =@$_GET['komentar_id'];
                  $submit = @$_POST['submit'];
               $komentar = @$_POST['komentar'];
               $foto_id = @$_POST['foto_id'];
               $user_id = @$_SESSION['user_id'];
               $tanggal = date('Y-m-d');
               $dataKomentar = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM komentar WHERE KomentarID='$komen_id' AND UserID='$user_id' AND FotoID='$foto_id'"));
               if ($submit == 'Kirim') {
                  $komen = mysqli_query($conn, "INSERT INTO komentar VALUES('','$foto_id','$user_id','$komentar','$tanggal')");
 
               } elseif ($submit == 'Edit') {
               }

               ?>
               <form action="?url=detail&&id=<?= $data['FotoID'] ?>" method="post">
                  <div class="form-group d-flex flex-row mt-2">
                     <input type="hidden" name="foto_id" value="<?= $data['FotoID'] ?>">
                     <?php if (isset($_SESSION['user_id'])) : ?>
                        <input type="text" class="form-control" name="komentar" required placeholder="Masukan Komentar">
                        <input type="submit" value="Kirim" name="submit" class="btn btn-secondary">
                     <?php endif; ?>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col-6">
      <div class="card bg-secondary-subtle">
         <h4 class="mt-1 mb-1 text-center"> Komentar </h4>
         </div>
         <?= @$alert ?>
         <?php $UserID = @$_SESSION["user_id"];
         $komen = mysqli_query($conn, "SELECT * FROM komentar INNER JOIN user ON komentar.UserID=user.UserID INNER JOIN foto ON komentar.FotoID=foto.FotoID WHERE komentar.FotoID='$_GET[id]'");
         foreach ($komen as $komens) : ?>
         <div class="card mt-3">
            <p class="mb-0 ms-2 mt-1 fw-bold">@<?= $komens['Username'] ?></p>
            <p class="mb-0 ms-2"><?= $komens['IsiKomentar'] ?></p>
            <p class="text-muted small mb-0 ms-2"><?= $komens['TanggalKomentar'] ?></p>
            </div>
         <?php endforeach; ?>
      </div>
   </div>
</div>
