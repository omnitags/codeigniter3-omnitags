<?php foreach ($tbl_a1 as $tl_a1):
  if (!$tbl_b10) { ?>
  <?php } else {
    $counter = 1;
    foreach ($tbl_b10->result() as $tl_b10): ?>
      <img src="img/<?= $tabel_b10 ?>/<?= $tl_b10->$tabel_b10_field4 ?>" class="img-fluid rounded">
      <h1 class="text-center"><?= $tl_b10->$tabel_b10_field3 ?></h1>
      <hr>
      <div class="row">
        <div class="col-md">
          <p><?= html_entity_decode($tl_b10->$tabel_b10_field5) ?></p>
        </div>
      </div>
    <?php endforeach;
  }
endforeach; ?>