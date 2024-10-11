<?php switch ($this->session->userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
    case $tabel_c2_field6_value4:
    break;

  default:
    redirect(site_url('welcome/no_level'));
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
    <?php foreach ($tbl_a1 as $tl_a1) : ?>
      <h1 class="text-center"><?= $title ?><?= $phase ?></h1>
      <p class="text-center"><?= $tl_a1->$tabel_a1_field2; ?> | <?= $tl_a1->$tabel_a1_field5; ?> | <?= $tl_a1->$tabel_a1_field4; ?></p>
      <p class="text-center"><?= $tl_a1->$tabel_a1_field3; ?></p>
    <?php endforeach; ?>

    <!-- menampilkan data pesanan sebagai ps -->

    <!-- menampilkan data pemesan -->
    <table class="table">
      <thead class="thead">
        <tr>
          <th><?= $tabel_f4_field1_alias ?></th>
          <th><?= $tabel_f4_field2_alias ?></th>
          <th><?= $tabel_f4_field3_alias ?></th>
          <th><?= $tabel_f4_field4_alias ?></th>
          <th><?= $tabel_f4_field5_alias ?></th>
          <th><?= $tabel_f4_field6_alias ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tbl_f4 as $tl_f4) : ?>
          <tr>
            <td width=""><?= $tl_f4->$tabel_f4_field1; ?></td>
            <td width=""><?= $tl_f4->$tabel_f4_field2 ?></td>
            <td width=""><?= $tl_f4->$tabel_f4_field3 ?></td>
            <td width=""><?= $tl_f4->$tabel_f4_field4 ?></td>
            <td width=""><?= $tl_f4->$tabel_f4_field5 ?></td>
            <td width=""><?= $tl_f4->$tabel_f4_field6 ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>

  </div>

  <script src="jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="fontawesome/js/all.js"></script>

  <script>
    window.print();
  </script>
</body>

</html>