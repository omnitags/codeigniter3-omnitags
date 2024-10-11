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
<!-- mengecek apakah ada pesanan yang telah dilakukan -->
        <!-- Di bawah ini adalah fitur yang ditetapkan sebagai unfinished, yakni fitur untuk mengelola array dari jumlah pesanan yang telah dilakukan. -->
        <!-- Dengan fitur ini, tamu dapat memesan lebih dari satu kamar  -->
        <!-- dan mendapatkan pesanan yang terpisah masing-masing -->
        <!-- Sebenarnya lebih baik jika menggunakan tabel pesanan dan tabel detail pesanan -->
        <!-- Namun hal itu hanya akan mempersulit masalah yang sudah ada -->
        <!-- Fitur ini akan diselesaikan ketika sudah ada pemahaman mengenai cara kerja array -->

      <!-- mengecek apakah ada transaksi yang telah dilakukan -->
      <?php if (isset($tbl_f2)) { ?>
        <!-- 
        $i = 1;
        do { s?> -->

        <div class="col-md">
          <h1 class="text-center"><?= $tabel_f2_alias ?> Berhasil</h1>
          <p class="text-center"><?= $tabel_f2_field1_alias ?> Anda adalah <?= $tbl_f2->$tabel_f2_field1 ?></p>
          <p class="text-center">Cari data <?= $tabel_f2_alias ?> Anda dengan menggunakan <br>
            <?= $tabel_f2_field1_alias ?> dan <?= $tabel_c2_field3 ?> anda <br>
            untuk mencetak bukti <?= $tabel_f2_alias ?></p>

          <div class="d-flex justify-content-center">
            <a class="text-decoration-none" href="<?= site_url('home') ?>">
              Kembali ke beranda
            </a>

          </div>
        </div>

        <!--  $i++;
        } while ($i <= $jlh) ?> -->


      <?php } else { ?>
        <!-- anda mengakses halaman konfirmasi tapi tidak memiliki pesanan apapun -->
        <div class="col-md">
          <h1 class="text-center">Anda tidak melakukan <?= $tabel_f2_alias ?> apapun</h1>

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