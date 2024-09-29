<?php foreach ($tbl_a1 as $tl_a1):
  if (!$tbl_b7) { ?>
  <?php } else {
    foreach ($tbl_b7->result() as $tl_b7): ?>
      <img src="img/<?= $tabel_b7 ?>/<?= $tl_b7->$tabel_b7_field5 ?>" class="img-fluid rounded">
      <h1 class="text-center">About Us</h1>
      <hr>
      <div class="row">
        <div class="col-md">
          <p><?= html_entity_decode($tl_b7->$tabel_b7_field6) ?></p>
        </div>
      </div>
    <?php endforeach;
  }
endforeach; ?>