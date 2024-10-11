<!-- setting setiap src di assets -->
<base href="<?= base_url('assets/') ?>">

<!-- memastikan user memiliki id  -->
<!-- memastikan user memiliki id  -->
<?php
switch (true) {
  case ($this->session->userdata($tabel_c2_field1)):
    break;
  case ($this->session->userdata($tabel_c1_field1)):
    break;
  default:
    session_destroy();
    // Handle other cases if needed
    break;
}
?>


<!DOCTYPE html>
<html lang="en">

<!-- header -->
<?php $this->load->view($head) ?>

<body>

  <!-- menampilkan data pengaturan sebagai p -->
  <?php foreach ($tbl_a1 as $tl_a1): ?>

     <!-- toast -->
    <div class="toast fade" id="element" style="position: absolute; top: 80; right: 15; z-index: 1000" data-delay="5000">
      <div class="toast-header">
        <img class="rounded mr-2" src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field3 ?>" width="15px" draggable="false">
        <strong class="mr-auto">
          <?= $tl_a1->$tabel_a1_field2 ?>
        </strong>
        <button type="button" class="close" data-dismiss="toast">
          <span>&times;</span>
        </button>
      </div>

      <div class="toast-body">
        <?= $this->session->flashdata('pesan') ?>
      </div>
    </div>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
      <a class="navbar-brand font-weight-bold" href="<?= site_url('home') ?>">
        <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field4; ?>" height="50">
      </a>

      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarku">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- menu navbar berdasarkan level user -->
      <div class="collapse navbar-collapse" id="navbarku">
        <?php $this->load->view('_partials/menu'); ?>
      </div>

    </nav>

    <!-- komponen berada tengah halaman -->
    <div class="container" id="konten">

      <div style="margin-top: 100px;">
        <!-- konten sesuai controller -->
        <?php $this->load->view($konten) ?>
      </div>

    </div>

    <?php $this->load->view('_partials/footer') ?>


    <?php $this->load->view('_partials/script') ?>

  <?php endforeach; ?>

</body>

</html>