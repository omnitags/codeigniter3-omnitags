<!-- mengecek apakah ada pesanan yang telah dilakukan -->
<!-- Di bawah ini adalah fitur yang ditetapkan sebagai unfinished, yakni fitur untuk mengelola array dari jumlah pesanan yang telah dilakukan. -->
<!-- Dengan fitur ini, tamu dapat memesan lebih dari satu kamar  -->
<!-- dan mendapatkan pesanan yang terpisah masing-masing -->
<!-- Sebenarnya lebih baik jika menggunakan tabel pesanan dan tabel detail pesanan -->
<!-- Namun hal itu hanya akan mempersulit masalah yang sudah ada -->
<!-- Fitur ini akan diselesaikan ketika sudah ada pemahaman mengenai cara kerja array -->

<!-- mengecek apakah ada transaksi yang telah dilakukan -->
<div class="d-flex justify-content-center">
<?php if (isset($tbl_f2)) { ?>
  <!-- 
        $i = 1;
        do { s?> -->

  <div class="col-md">
    <h1 class="text-center"><?= $tabel_f2_alias ?> Berhasil<?= $phase ?></h1>
    <p class="text-center"><?= $tabel_f2_field1_alias ?> Anda adalah <?= $tbl_f2->$tabel_f2_field1 ?></p>

    <div class="d-flex justify-content-center">
        <a class="btn btn-success text-light"
          href="<?= site_url($language . '/' . $tabel_f2 . '/print/' . $tbl_f2->$tabel_f2_field1) ?>" target="_blank">
          Cetak Bukti <?= $tabel_f2_alias ?></i></a>
      </div>

      <p class="text-center">Anda juga bisa mengecek data <?= $tabel_f2_alias ?> anda<br>
        pada daftar <?= $tabel_f2_alias ?><br>
        untuk mencetak bukti <?= $tabel_f2_alias ?></p>

    <div class="d-flex justify-content-center">
      <a class="text-decoration-none" href="<?= site_url($language . '/home') ?>">
      </a>

    </div>
  </div>

  <!--  $i++;
        } while ($i <= $jlh) ?> -->


<?php } else { ?>
  <!-- anda mengakses halaman konfirmasi tapi tidak memiliki pesanan apapun -->
  <div class="col-md">
    <h2 class="text-center">Anda tidak melakukan <?= $tabel_f2_alias ?> apapun</h2>

  </div>
<?php } ?>
</div>