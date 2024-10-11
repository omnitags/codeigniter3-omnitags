<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body class="login">
  <?php foreach ($tbl_a1 as $tl_a1): ?>
    <div id="background-image">
      <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>">
    </div>
  <?php endforeach ?>

  <div class="container">
    <!-- membuat konten berada tepat di tengah2 halaman  -->
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-lg-5 login">
        <!-- link kembali -->
        <a class="text-decoration-none" href="<?= site_url('home') ?>">Kembali ke beranda</a>

        <h1 class="text-center"><?= $title ?><?= $phase ?></h1>

        <!-- form login -->
        <form action="<?= site_url($tabel_c2 . '/ceklogin') ?>" method="post">
          <!-- <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input class="form-control" type="email" name="email" placeholder="Masukkan email">
          </div> -->

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input class="form-control" type="text" name="<?= $tabel_c2_field3_input ?>"
              placeholder="Masukkan <?= $tabel_c2_field3_alias ?>">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input class="form-control" type="password" name="<?= $tabel_c2_field4_input ?>"
              placeholder="Masukkan <?= $tabel_c2_field4_alias ?>">
          </div>

          <p class="text-center"><a class="text-decoration-none" href="<?= site_url($tabel_c1 . '/login') ?>">Login sebagai <?= $tabel_c1_alias ?></a></p>

          <!-- pesan untuk pengguna yang login -->
          <p class="small text-center text-danger"><?= $this->session->flashdata($this->views['flash1']) ?></p>

          <!-- tombol login dan signup -->
          <div class="form-group d-flex justify-content-around">
            <a class="btn btn-light text-primary login" type="button" href="<?= site_url($tabel_c2 . '/signup') ?>">Create Account</a>
            <button class="btn btn-primary login" type="submit">Sign In</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <style>
    /* Apply styles to the background image container */
    #background-image {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      /* Ensure the background image is behind other content */
    }

    /* Apply blur effect to the background image */
    #background-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: blur(5px);
      /* Adjust blur intensity as needed */
      transform: scale(1.1);
    }

    /* Other styles for your form and other content */
    .container {
      position: relative;
      /* Ensure other content stays on top */
      z-index: 1;
      /* Ensure other content stays on top */
    }
  </style>

  <script src="js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="fontawesome/js/all.js"></script>
</body>

</html>