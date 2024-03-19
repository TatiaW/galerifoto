
<div class="container mt-3">
    <div class="card bg-secondary-subtle">
<h4 class="ms-3 mt-3 mb-3"> Your Gallery </h4>
</div>
    <div class="row mt-3">
        <?php
        include 'koneksi.php';
        $user_id = @$_SESSION['user_id'];
        $album=mysqli_query($conn, "SELECT * FROM album WHERE UserID='$_SESSION[user_id]' ");
        while($row =mysqli_fetch_array($album)){?>
          <div class="col-6 col-md-4 col-lg-3">
            <div class="card mb-3">
            <div class="card-body">
            <h5 class="card-title"><?= $row['NamaAlbum'] ?></h5>
            <p class="card-text text-muted "><?= $row['Deskripsi']?></p>
            <a href="?url=albumdetail&&albumid=<?= $row['AlbumID']?>" class="btn btn-primary">Buka</a>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>