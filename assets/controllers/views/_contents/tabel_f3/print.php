<!-- halaman print untuk pesanan -->

<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body>

  <!-- border garis putus-putus -->
  <div class="container" style="border-style: dashed;">
    <?php foreach ($tbl_a1 as $tl_a1) : ?>
      <h1 class="text-center"><?= $title ?><?= $phase ?></h1>
      <p class="text-center"><?= $tl_a1->$tabel_a1_field2; ?> | <?= $tl_a1->$tabel_a1_field5; ?> | <?= $tl_a1->$tabel_a1_field4; ?></p>
      <p class="text-center"><?= $tl_a1->$tabel_a1_field3; ?></p>
    <?php endforeach; ?>

    <!-- menampilkan data pesanan sebagai ps -->
    <?php foreach ($tbl_f3 as $tl_f3) : ?>
      <?php foreach ($tbl_f2 as $tl_f2) : ?>
        <?php foreach ($tbl_e4 as $tl_e4) : ?>

          <?php if ($tl_f3->$tabel_f2_field1 === $tl_f2->$tabel_f2_field1 && $tl_f2->$tabel_f2_field7 === $tl_e4->$tabel_e4_field1) { ?>

            <!-- menampilkan data pemesan -->
            <table class="table">
              <thead class="thead">
                <tr>
                  <th><?= $tabel_f2_field1_alias ?></th>
                  <th><?= $tabel_f2_field3_alias ?></th>
                  <th><?= $tabel_f2_field4_alias ?></th>
                  <th><?= $tabel_f2_field5_alias ?></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td width=""><?= $tl_f2->$tabel_f2_field1 ?></td>
                  <td width=""><?= $tl_f2->$tabel_f2_field3 ?></a>
                  <td width=""><?= $tl_f2->$tabel_f2_field4 ?></td>
                  <td width=""><?= $tl_f2->$tabel_f2_field5 ?></td>
                  </td>
                </tr>
              </tbody>
            </table>

            <!-- menampilkan data tamu -->
            <table class="table">
              <thead class="thead">
                <tr>
                  <th><?= $tabel_e4_field2_alias ?></th>
                  <th><?= $tabel_f2_field10_alias ?></th>
                  <th><?= $tabel_f2_field11_alias ?></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td width=""><?= $tl_e4->$tabel_e4_field2 ?></a>
                  <td width=""><?= $tl_f2->$tabel_f2_field10 ?></td>
                  <td width=""><?= $tl_f2->$tabel_f2_field11 ?></td>
                  </td>
                </tr>
              </tbody>
            </table>

            <!-- menampilkan harga total dari tabel pesanan -->
            <table class="table">
              <thead class="thead">
                <tr>
                  <th><?= $tabel_f2_field9_alias ?></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td width="">Rp <?= number_format($tl_f2->$tabel_f2_field9, '2', ',', '.') ?></td>
                  </td>
                </tr>
              </tbody>
            </table>



            <!-- menampilkan data transaksi -->
            <table class="table">
              <thead class="thead">
                <tr>
                  <th><?= $tabel_f3_field1_alias ?></th>
                  <th><?= $tabel_f3_field5_alias ?></th>
                  <th><?= $tabel_f3_field6_alias ?></th>
                  <th><?= $tabel_f3_field7_alias ?></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td width=""><?= $tl_f3->$tabel_f3_field1 ?></td>
                  <td width=""><?= $tl_f3->$tabel_f3_field5 ?></a>
                  <td width="">Rp <?= number_format($tl_f3->$tabel_f3_field6, '2', ',', '.') ?></td>
                  <td width=""><?= $tl_f3->$tabel_f3_field7 ?></td>
                  </td>
                </tr>
              </tbody>
            </table>

          <?php } ?>

        <?php endforeach ?>
      <?php endforeach ?>
    <?php endforeach ?>

  </div>

  <p class="text-center">Kirimkan bukti ini ke <?= $tabel_c2_field6_value4_alias ?> untuk diproses</p>

  <script src="jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="fontawesome/js/all.js"></script>

  <script>
    window.print();
  </script>
</body>

</html>