<?php switch ($this->session->userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value2:
  case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value4:
  case $tabel_c2_field6_value5:
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<?php foreach ($dekor as $dk): ?>
  <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200">
<?php endforeach ?>

<?php foreach ($tbl_b9_alt as $tl_b9_alt): ?>
  <div class="table-responsive">
    <table class="table table-light" id="data">
      <thead></thead>
      <tbody>
        <tr>
          <td class="table-secondary table-active"><?= $tabel_b9_field4_alias ?></td>
          <td class="table-light"><?= $tl_b9_alt->$tabel_b9_field4 ?></td>
        </tr>

        <tr>
          <td class="table-secondary table-active"><?= $tabel_b9_field5_alias ?></td>
          <td class="table-light"><?= $timeElapsed ?></td>
        </tr>
      </tbody>
      <tfoot></tfoot>
    </table>
    </div>
    
  <?php endforeach ?>