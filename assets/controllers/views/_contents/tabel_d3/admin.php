<?php switch ($this->session->userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
    // case $tabel_c2_field6_value4:
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<a class="btn btn-info mb-4" href="<?= site_url($tabel_d3 . '/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<?php foreach ($dekor as $dk): ?>
  <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200">
<?php endforeach ?>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_d3_field1_alias ?></th>
        <th><?= $tabel_d3_field2_alias ?></th>
        <th><?= $tabel_d3_field3_alias ?></th>
        <th><?= $tabel_d3_field4_alias ?></th>
        <th><?= $tabel_d3_field5_alias ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_d3 as $tl_d3): ?>
        <tr>
          <td></td>
          <td><?= $tl_d3->$tabel_d3_field1; ?></td>
          <td><?= $tl_d3->$tabel_d3_field2 ?></td>
          <td><?= $tl_d3->$tabel_d3_field3 ?></td>
          <td><?= $tl_d3->$tabel_d3_field4 ?></td>
          <td><?= $tl_d3->$tabel_d3_field5 ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>


  </table>
</div>