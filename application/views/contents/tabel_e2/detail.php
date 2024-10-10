<?php foreach ($tbl_a1 as $tl_a1):
  if (!$tbl_e2) { ?>
    <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>" class="img-fluid shadow-sm rounded">
    <h1 class="text-center"><?= $tabel_e2_alias ?> is unavailable</h1>
    <hr>

  <?php } else {
    $counter = 1;
    foreach ($tbl_e2->result() as $tl_e2): ?>

      <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>" class="img-fluid shadow-sm rounded">

      <h1 class="text-center">
        <br>
        <?= $tabel_e2_alias ?> <a target="_blank" href="<?= $tl_e2->$tabel_e2_field5 ?>"><?= $tl_e2->$tabel_e2_field2 ?></a>
      </h1>

      <hr>

      <div class="row">
        <div class="col-md">
          <!-- <p>This course is tbl_e2d under a <a target="_blank" href="<?= $tl_e2->$tabel_e2_field5 ?>"><?= $tl_e2->$tabel_e2_field2 ?></a>
            tbl_e2. This is a human-readable summary of (and not a substitute for) the <a
            target="_blank" href="<?= $tl_e2->$tabel_e2_field5 ?>/legalcode">tbl_e2</a>. Official
            translations of this tbl_e2 are available in <a
            target="_blank" href="<?= $tl_e2->$tabel_e2_field5 ?>/legalcode#languages">other languages</a>.</p> -->
          <p><?= html_entity_decode($tl_e2->$tabel_e2_field4) ?></p>
          <h1>Keunggulan</h1>
          <p><?= html_entity_decode($tl_e2->$tabel_e2_field5) ?></p>
          <h1>Prospek Karir</h1>
          <p><?= html_entity_decode($tl_e2->$tabel_e2_field6) ?></p>
        </div>
      </div>
    <?php endforeach;
  }
endforeach; ?>


<!-- modal lihat -->
<?php foreach ($tbl_e2->result() as $tl_e2): ?>
  <div id="lihat<?= $tl_e2->$tabel_e2_field1 ?>" class="modal fade lihat">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header($tl_e2->$tabel_e2_field2, '') ?>
        
        <div class="modal-body">
          <img class="img-thumbnail shadow-sm" width="100%" src="img/<?= $tabel_e2 ?>/<?= $tl_e2->$tabel_e2_field4; ?>">
        </div>

        <!-- memunculkan notifikasi modal -->
        <p class="small text-center text-danger"><?= get_flashdata('pesan_lihat') ?></p>

        <div class="modal-footer">
          <?= btn_tutup() ?>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>