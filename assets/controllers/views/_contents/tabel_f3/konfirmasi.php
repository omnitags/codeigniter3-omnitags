<?php switch ($this->session->userdata($tabel_c2_field6)) {
    // case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value5:
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body>

  <div class="container">
    <div class="row justify-content-center align-items-center h-100">

      <!-- mengecek apakah ada transaksi yang telah dilakukan -->
      <?php if (isset($tbl_f3)) { ?>
        <div class="col-md">
          <h1 class="text-center"><?= $title ?><?= $phase ?></h1>
          <p class="text-center"><?= $tabel_f3_field1_alias ?> Anda adalah <?= $tbl_f3->$tabel_f3_field1 ?></p>

          <div class="d-flex justify-content-center">
            <a class="btn btn-success text-light" href="<?= site_url($tabel_f3 . '/print/' . $tbl_f3->$tabel_f3_field1) ?>" target="_blank">
              Cetak Bukti <?= $tabel_f3_alias ?></i></a>
          </div>

          <p class="text-center">Anda juga bisa mengecek data <?= $tabel_f3_alias ?> anda<br>
            pada daftar <?= $tabel_f3_alias ?><br>
            untuk mencetak bukti <?= $tabel_f3_alias ?></p>

          <div class="d-flex justify-content-center">
            <a class="text-decoration-none" href="<?= site_url('home') ?>">
              Kembali ke beranda
            </a>

          </div>
        </div>


           <?php } else { ?>
        <!-- anda mengakses halaman konfirmasi tapi tidak memiliki pesanan apapun -->
        <div class="col-md">
          <h1 class="text-center">Anda tidak melakukan <?= $tabel_f3_alias ?> apapun</h1>

          <div class="d-flex justify-content-center">
            <a class="text-decoration-none" href="<?= site_url('home') ?>">
              Kembali ke beranda
            </a>

          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <script src="fontawesome/js/all.js"></script>

</body>

</html>