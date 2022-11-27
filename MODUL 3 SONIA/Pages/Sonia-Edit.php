<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </head>
    <style>
    </style>
<body>
    <?php
    include('..\Config\connector.php');
    $query = mysqli_query($connect,"SELECT id_mobil FROM `modul3`");
    $jumlah = mysqli_num_rows($query);

    $id = $_GET[("id_mobil")];
    $ambil = mysqli_query($connect, "SELECT * FROM modul3 WHERE id_mobil= $id");
    $data = mysqli_fetch_assoc($ambil);
    ?>
    <!-- Navbar -->
    <section>
        <nav class="navbar navbar-lg bg-primary">
            <div class="container justify-content-start">
                <a class="navbar-brand text-white" href="..\index.php">Home</a>
                <a class="navbar-brand text-white" href="../Pages/Sonia-ListCar.php">MyCar</a>
            </div>
        </nav>
    </section>

    <!-- DETAIL -->
    <!-- DETAIL -->
    <section id="item-detail">
      <div class="container">
        <div class="mt-4">
          <h2><?= $data["nama_mobil"]; ?></h2>
          <p>Detail Mobil <?= $data["nama_mobil"]; ?></p>
        </div>
        <div class="row mt-5 justify-content-between">
          <div class="col-md-5">
            <img src="../Assets/Image/<?= $data["foto_mobil"]; ?>" alt="" width="100%">
          </div>
          <div class="col-md-7">
            <form action="../Config/edit.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id_mobil" value="<?= $data["id_mobil"]; ?>">
              <div class="mb-3">
                <label for="nama_mobil" class="form-label fw-bold">Nama Mobil</label>
                <input type="text" name="nama_mobil" class="form-control" id="nama_mobil" value="<?= $data["nama_mobil"]; ?>" >
              </div>
              <div class="mb-3">
                <label for="pemilik_mobil" class="form-label fw-bold">Nama Pemilik</label>
                <input type="text" name="pemilik_mobil" class="form-control" id="pemilik_mobil" value="<?= $data["pemilik_mobil"]; ?>" >
              </div>
              <div class="mb-3">
                <label for="merk_mobil" class="form-label fw-bold">Merk</label>
                <input type="text" name="merk_mobil" class="form-control" id="merk_mobil" value="<?= $data["merk_mobil"]; ?>" >
              </div>
              <div class="mb-3">
                <label for="tanggal_beli" class="form-label fw-bold">Tanggal Beli</label>
                <input type="date" name="tanggal_beli" class="form-control" id="tanggal_beli" value="<?= $data["tanggal_beli"]; ?>" >
              </div>
              <div class="mb-3">
                <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" placeholder="<?= $data["deskripsi"]; ?>" ></textarea>
              </div>
              <div class="mb-3 position-relative foto">
                <label for="foto_mobil" class="form-label fw-bold">Foto</label>
                <input class="form-control" name="foto_mobil" type="file" id="foto_mobil" style="color: transparent" value="<?= $data["foto_mobil"]; ?>" >
                <span><?= $data["foto_mobil"]; ?></span>
              </div>
              <div class="mb-3">
                <span class="d-block mb-2 fw-bold">Status Pembayaran</span>
                <?php if($data["status_pembayaran"] === "Lunas") : ?>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_pembayaran" id="Status1" value="Lunas" >
                    <label class="form-check-label" for="Status1">Lunas</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_pembayaran" id="Status2" value="Belum Lunas" >
                    <label class="form-check-label" for="Status2">Belum Lunas</label>
                  </div>
                <?php else : ?>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_pembayaran" id="Status1" value="Lunas" >
                    <label class="form-check-label" for="Status1">Lunas</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_pembayaran" id="Status2" value="Belum Lunas" >
                    <label class="form-check-label" for="Status2">Belum Lunas</label>
                  </div>
                <?php endif; ?>
              </div>
              <button href="Sonia-Edit.php?id_mobil=<?php echo $isi['id_mobil']; ?>" type="submit" class="btn btn-primary mb-5" name="edit">Selesai</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- END DETAIL -->

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>