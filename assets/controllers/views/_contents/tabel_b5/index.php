<?php foreach ($tbl_a1 as $tl_a1): ?>
  <?php foreach ($tbl_b5 as $tl_b5):
    if ($tl_a1->$tabel_a1_field7 == $tl_b5->$tabel_b5_field1) { ?>

      <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>" class="img-fluid rounded">

      <h1 class="text-center">
        <hr>
        <img src="img/<?= $tabel_b5 ?>/<?= $tl_b5->$tabel_b5_field4 ?>" width="50%" class="rounded">
        <br>
        <?= $tabel_b5_alias ?> <a target="_blank" href="<?= $tl_b5->$tabel_b5_field5 ?>"><?= $tl_b5->$tabel_b5_field2 ?></a>
      </h1>

      <hr>

      <div class="row">
        <div class="col-md">
          <!-- <p>This course is licensed under a <a target="_blank" href="<?= $tl_b5->$tabel_b5_field5 ?>"><?= $tl_b5->$tabel_b5_field2 ?></a>
            license. This is a human-readable summary of (and not a substitute for) the <a
            target="_blank" href="<?= $tl_b5->$tabel_b5_field5 ?>/legalcode">license</a>. Official
            translations of this license are available in <a
            target="_blank" href="<?= $tl_b5->$tabel_b5_field5 ?>/legalcode#languages">other languages</a>.</p> -->
          <p><?= html_entity_decode($tl_b5->$tabel_b5_field3) ?></p>
        </div>
      </div>
    <?php }endforeach ?>

<?php endforeach; ?>