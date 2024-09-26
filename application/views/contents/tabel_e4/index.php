<!-- menampilkan fasilitas kamar sesuai dengan tipe kamar yang ada
https://stackoverflow.com/questions/30531359/nested-foreach-in-codeigniter-view
https://stackoverflow.com/questions/22354514/message-trying-to-get-property-of-non-object-in-codeigniter
terima kasih pada link di atas -->
<?php foreach ($tbl_a1 as $tl_a1): ?>
  <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>" class="img-fluid rounded">
<?php endforeach; ?>

<h2 class="pt-2"><?= $title ?><?= $phase ?></h2>
<hr>

<?php foreach ($tbl_e4->result() as $tl_e4): ?>
  <div class="row mb-5">
    <div class="col-md-6">
      <img src="img/<?= $tabel_e4 ?>/<?= $tl_e4->$tabel_e4_field3 ?>" class="img-fluid rounded">

    </div>
    <div class="col-md-6">
      <h2 class="pt-2"><?= $tl_e4->$tabel_e4_field2; ?></h2>
      <ul class="list-unstyled ml-2">
        <li><?= $tabel_e2_alias ?> : </li>
        <?php foreach ($tbl_e2->result() as $tl_e2): ?>
          <?php if ($tl_e4->$tabel_e4_field1 === $tl_e2->$tabel_e4_field1) { ?>

            <li>
              <a class="text-decoration-none"
                href="<?= site_url($tabel_e2 . '/' . $tl_e2->$tabel_e2_field1 .'/detail') ?>">
                <?= $tl_e2->$tabel_e2_field2 ?></a>
            </li>

          <?php } ?>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>


<?php endforeach; ?>


<!-- method get supaya nilai dari form bisa tampil nanti (tidak langsung masuk ke database) -->
<!-- <form action="<?= site_url($tabel_f2) ?>" method="get">
  <div class="row justify-content-center align-items-end mt-2">
    <div class="col-md-1">
      <div class="form-group">
        <button class="btn btn-primary" type="submit">Pesan</button>
      </div>
    </div>
  </div>
</form> -->


<!-- Ide baru : jika tekan tombol di fasilitas bisa muncul pop up yang menampilkan
 keterangan fasilitas(termasuk gambar) -->