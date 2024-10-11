<?php switch ($this->session->userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value4:
  case $tabel_c2_field6_value5:
    break;

  default:
    redirect(site_url() . 'welcome/no_level');
}
?>

<!-- halaman print untuk pesanan -->

<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body>

  <!-- border garis putus-putus -->
  <div class="container" style="border-style: dashed;">
    <?php foreach ($tbl_a1 as $tl_a1): ?>
      <h1 class="text-center"><?= $title ?><?= $phase ?></h1>
      <p class="text-center"><?= $tl_a1->$tabel_a1_field2; ?> | <?= $tl_a1->$tabel_a1_field8; ?> | <?= $tl_a1->$tabel_a1_field7; ?>
      </p>
      <p class="text-center"><?= $tl_a1->$tabel_a1_field6; ?></p>
    <?php endforeach; ?>

    <!-- menampilkan data pesanan sebagai ps -->
    <?php foreach ($tbl_f2 as $tl_f2): ?>

      <!-- menampilkan data pemesan -->
      <table class="table">
        <thead class="thead-">
          <tr>
            <th><?= $tabel_f2_field1_alias ?></th>
            <th><?= $tabel_f2_field2_alias ?></th>
            <th><?= $tabel_f2_field3_alias ?></th>
            <th><?= $tabel_f2_field4_alias ?></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td width=""><?= $tl_f2->$tabel_f2_field1 ?></td>
            <td width=""><?= $tl_f2->$tabel_f2_field2 ?></td>
            <td width=""><?= $tl_f2->$tabel_f2_field3 ?></td>
            <td width=""><?= $tl_f2->$tabel_f2_field4 ?></td>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- menampilkan data tamu -->
      <table class="table">
        <thead class="thead">
          <tr>
            <th><?= $tabel_f2_field5_alias ?></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td width=""><?= $tl_f2->$tabel_f2_field5 ?></td>
          </tr>
        </tbody>
      </table>
    <?php endforeach ?>


    <?php foreach ($tbl_e3 as $tl_e3):
      if ($tl_e3->$tabel_e3_field1 == $tl_f2->$tabel_e3_field1) { ?>

        <!-- menampilkan data pemesan -->
        <table class="table">
          <thead class="thead-">
            <tr>
              <th><?= $tabel_e3_field1_alias ?></th>
              <th><?= $tabel_e3_field3_alias ?></th>
              <th><?= $tabel_e3_field5_alias ?></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td width=""><?= $tl_e3->$tabel_e3_field1 ?></td>
              <td width=""><?= $tl_e3->$tabel_e3_field3 ?></td>
              <td width=""><?= $tl_e3->$tabel_e3_field5 ?></td>
              </td>
            </tr>
          </tbody>
        </table>
      <?php }endforeach ?>

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