<?php foreach ($tbl_a1 as $tl_a1) : ?>
  <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>" class="img-fluid rounded">
<?php endforeach; ?>

<h2 class="pt-2"><?= $title ?><?= $phase ?></h2>
<hr>

<div class="row">
  <?php foreach ($tbl_e2->result() as $tl_e2) : ?>
    <div class="col-md-4 tabel_e2">

      <!-- gambar dapat ditekan untuk memunculkan modal -->
      <img style="height: 200px;" role="button" data-toggle="tooltip" data-placement="bottom" title="<?= $tl_e2->$tabel_e2_field2 ?>"
       class="img-thumbnail img-fluid" src="img/<?= $tabel_e2 ?>/<?= $tl_e2->$tabel_e2_field4; ?>">

       </div>
  <?php endforeach; ?>
</div>


<!-- modal lihat -->
<?php foreach ($tbl_e2->result() as $tl_e2) : ?>
  <div id="lihat<?= $tl_e2->$tabel_e2_field1 ?>" class="modal fade lihat">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header_id($tl_e2->$tabel_e2_field2, '') ?>
        
        <div class="modal-body">
          <img class="img-thumbnail" width="100%" src="img/<?= $tabel_e2 ?>/<?= $tl_e2->$tabel_e2_field4; ?>">
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