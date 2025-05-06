<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor->result() as $dk):
      echo tampil_dekor('175px', $tabel_b1, $dk->$tabel_b1_field4);
    endforeach ?>
  </div>
</div>
<hr>


<!-- menampilkan data untuk administrator -->

<?php switch (userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3: ?>
    <div class="row">
      <?= card_count($tabel_c2_alias, 'tabel_c2', 'text-light bg-dark', $tbl_c2) ?>
      <!-- ?= card_count($tabel_c1_alias, 'tabel_c1', 'text-light bg-dark', $tbl_c1) ?> -->
      <?= card_count($tabel_d3_alias, 'tabel_d3', 'text-light bg-dark', $tbl_d3) ?>

    </div>

    <br>
    <hr>
    <?php break;

  default: ?>


    <?php break;
} ?>


<div class="row">
 
  <!-- menampilkan data untuk administrator -->
 
  <?php switch (userdata($tabel_c2_field6)) {
    case $tabel_c2_field6_value3: ?>
      <?= card_count($tabel_e3_alias, 'tabel_e3', 'text-light bg-dark', $tbl_e3) ?>
      <?= card_count($tabel_e4_alias, 'tabel_e4', 'text-light bg-dark', $tbl_e4) ?>
      <!-- ?= card_count($tabel_e2_alias, 'tabel_e2', 'text-light bg-dark', $tbl_e2) ?> -->
      <!-- ?= card_count($tabel_e1_alias, 'tabel_e1', 'text-light bg-dark', $tbl_e1) ?> -->
      <?php break;

    case $tabel_c2_field6_value4: ?>
      <?= card_count($tabel_e3_alias, 'tabel_e3', 'text-light bg-dark', $tbl_e3) ?>
      <?= card_count($tabel_f2_alias, 'tabel_f2', 'text-light bg-dark', $tbl_f2) ?>
      <?= card_count($tabel_f1_alias, 'tabel_f1', 'text-light bg-dark', $tbl_f1) ?>
      <?php break;

    case $tabel_c2_field6_value2: ?>
      <!-- ?= card_count($tabel_f3_alias, 'tabel_f3', 'text-light bg-dark', $tbl_f3) ?> -->
      <?php break;


    default: ?>


      <?php break;
  } ?>
</div>

<!-- The charts shown will be different for each user level -->
<h2 class="mt-4">Statistics</h2>
<hr>
<?php switch (userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value2:
  case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value4:
    ?>
    <div class="row mt-4">
      <?= bar_graph('myChart_1_2') ?>

    </div>
    <?php break;

  default:
    break;
}
?>

<h2 class="mt-4">Detail Website</h2>
<hr>

<?php foreach ($tbl_a1 as $tl_a1): ?>
  <div class="row">
    <div class="col-md-6">

      <div class="table-responsive">
        <?php
        if (!$sosmed->result()) {
          $data2 = '';
        } else {
          foreach ($sosmed->result() as $sm):

            if ($sm->$tabel_b6_field2 == $tl_a1->$tabel_a1_field1) {
              $data2 = '<tr>
                  <td class="table-secondary table-active"><?= $sm->$tabel_b6_field3 ?></td>
                  <td class="table-light"><a class="text-decoration-none text-primary" href="<?= $sm->$tabel_b6_field4 ?>"
                      target="_blank">
                      Visit</a>
                </tr>';
            } else {
              $data2 = '';
            }
          endforeach;
        }

        echo table_data(
          row_data('tabel_a1_field2', $tl_a1->$tabel_a1_field2) .
          row_data('tabel_a1_field3', $tl_a1->$tabel_a1_field3) .
          row_data('tabel_a1_field4', $tl_a1->$tabel_a1_field4) .
          row_data('tabel_a1_field5', $tl_a1->$tabel_a1_field5) .
          $data2,
          'table-light'
        ) ?>
      </div>

    </div>

    <div class="col-md-6">
      <img class="img-thumbnail shadow-sm rounded" src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>">
    </div>
  </div>
<?php endforeach; ?>

<!-- ?= chart(''myChart_1_2'', 'tabel_f1', 'tabel_f2') ?> -->
<?= adjust_col_js('col-md-3', 'col-md-4') ?>