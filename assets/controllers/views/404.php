<!-- halaman peringatan untuk pengguna yang masuk ke halaman tanpa akses yang sesuai -->

<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body>

  <div class="container">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-md-auto">
      <div class="d-flex justify-content-center">
        <?php foreach ($dekor as $dk): ?>
          <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="40%" class="rounded">
          <?php endforeach ?>
        </div>
        <h1 class="text-center"><?= $title ?><?= $phase ?></h1>
        <div class="d-flex justify-content-center">
          <a class="text-decoration-none" href="<?= site_url('home') ?>">
            Kembali ke beranda
          </a>
        </div>
      </div>
    </div>
  </div>

  <script src="fontawesome/js/all.js"></script>
</body>

</html>