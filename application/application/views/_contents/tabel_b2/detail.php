<?php foreach ($tbl_a1 as $tl_a1):
  if (!$tbl_b2) { ?>
  <?php } else {
    foreach ($tbl_b2->result() as $tl_b2): ?>
      <img src="img/<?= $tabel_b2 ?>/<?= $tl_b2->$tabel_b2_field4 ?>" class="img-fluid rounded">
      <h1 class="text-center"><?= $tl_b2->$tabel_b2_field3 ?></h1>
      <hr>
      <div class="row">
        <div class="col-md">
          <p><?= html_entity_decode($tl_b2->$tabel_b2_field5) ?></p>
        </div>
      </div>
    <?php endforeach;
  }
endforeach; ?>