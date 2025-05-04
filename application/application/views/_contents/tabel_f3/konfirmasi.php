<!-- mengecek apakah ada transaksi yang telah dilakukan -->
<div class="d-flex justify-content-center">

  <?php if (isset($tbl_f3)) { ?>
    <div class="col-md">
      <h1 class="text-center"><?= $title ?><?= $phase ?></h1>
      <p class="text-center"><?= $tabel_f3_field1_alias ?> Anda adalah <?= $tbl_f3->$tabel_f3_field1 ?></p>

      <div class="d-flex justify-content-center">
        <a class="btn btn-success text-light"
          href="<?= site_url($language . '/' . $tabel_f3 . '/print/' . $tbl_f3->$tabel_f3_field1) ?>" target="_blank">
          Cetak Bukti <?= $tabel_f3_alias ?></i></a>
      </div>

      <p class="text-center">Anda juga bisa mengecek data <?= $tabel_f3_alias ?> anda<br>
        pada daftar <?= $tabel_f3_alias ?><br>
        untuk mencetak bukti <?= $tabel_f3_alias ?></p>
    </div>


  <?php } else { ?>
    <!-- anda mengakses halaman konfirmasi tapi tidak memiliki pesanan apapun -->
    <div class="col-md">
      <h2 class="text-center">Anda tidak melakukan <?= $tabel_f3_alias ?> apapun</h2>

    </div>
  <?php } ?>

</div>