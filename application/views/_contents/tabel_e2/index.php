<?php foreach ($tbl_a1 as $tl_a1) : ?>
  <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>" class="img-fluid rounded">
<?php endforeach; ?>

<h2 class="pt-2"><?= $title ?><?= $phase ?></h2>
<hr>

<div class="row">
  <?php foreach ($tbl_e2 as $tl_e2) : ?>
    <div class="col-md-4 tabel_e2">

      <!-- gambar dapat ditekan untuk memunculkan modal -->
      <img style="height: 200px;" role="button" data-toggle="modal" data-target="#lihat<?= $tl_e2->$tabel_e2_field1 ?>" class="img-thumbnail img-fluid" src="img/<?= $tabel_e2 ?>/<?= $tl_e2->$tabel_e2_field4; ?>">

    </div>
  <?php endforeach; ?>
</div>


<!-- modal lihat -->
<?php foreach ($tbl_e2 as $tl_e2) : ?>
  <div id="lihat<?= $tl_e2->$tabel_e2_field1 ?>" class="modal fade lihat">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

          <!-- judul modal menggunakan $tabel_e2_field2 fasilitas -->
          <h5 class="modal-title"><?= $tl_e2->$tabel_e2_field2; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <img class="img-thumbnail" src="img/<?= $tabel_e2 ?>/"<?= $tl_e2->$tabel_e2_field4; ?>">
        </div>

        <!-- memunculkan notifikasi modal -->
        <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_lihat') ?></p>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>