<?php foreach ($tbl_a1 as $tl_a1):
  if (!$tbl_b5) { ?>
    <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>" class="img-fluid rounded">
    <h1 class="text-center"><?= lang('tabel_b5_alias_v8_msg') ?></h1>
    <hr>

  <?php } else {
    foreach ($tbl_b5->result() as $tl_b5): ?>

      <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>" class="img-fluid rounded">

      <h1 class="text-center">
        <hr>
        <img src="img/<?= $tabel_b5 ?>/<?= $tl_b5->$tabel_b5_field4 ?>" role="button" data-toggle="modal"
          data-target="#lihat<?= $tl_b5->$tabel_b5_field1 ?>" width="25%" class="rounded">
        <br>
        <?= $tabel_b5_alias ?> <a target="_blank" href="<?= $tl_b5->$tabel_b5_field5 ?>"><?= $tl_b5->$tabel_b5_field2 ?></a>
      </h1>

      <hr>

      <div class="row">
        <div class="col-md">
          <!-- <p>This course is tbl_b5d under a <a target="_blank" href="<?= $tl_b5->$tabel_b5_field5 ?>"><?= $tl_b5->$tabel_b5_field2 ?></a>
            tbl_b5. This is a human-readable summary of (and not a substitute for) the <a
            target="_blank" href="<?= $tl_b5->$tabel_b5_field5 ?>/legalcode">tbl_b5</a>. Official
            translations of this tbl_b5 are available in <a
            target="_blank" href="<?= $tl_b5->$tabel_b5_field5 ?>/legalcode#languages">other languages</a>.</p> -->
          <p><?= html_entity_decode($tl_b5->$tabel_b5_field3) ?></p>
        </div>
      </div>
    <?php endforeach;
  }
endforeach; ?>


<!-- modal lihat -->
<?php foreach ($tbl_b5->result() as $tl_b5): ?>
  <div id="lihat<?= $tl_b5->$tabel_b5_field1 ?>" class="modal fade lihat">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header($tl_b5->$tabel_b5_field2, '') ?>
        
        <div class="modal-body">
          <img class="img-thumbnail" width="100%" src="img/<?= $tabel_b5 ?>/<?= $tl_b5->$tabel_b5_field4; ?>">
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