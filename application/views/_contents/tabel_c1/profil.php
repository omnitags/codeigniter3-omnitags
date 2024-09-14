<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor->result() as $dk): ?>
      <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200" alt="Image">
    <?php endforeach ?>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-6">
    <?php foreach ($tbl_c1->result() as $tl_c1): ?>

      <!-- tombol untuk memunculkan modal memperbaiki password -->
      <?= btn_field($tabel_c1_field1 . $tl_c1->$tabel_c1_field1, '<i class="fas fa-edit"></i>' . $tabel_c1_field5_alias) ?>

      <!-- form ini terpisah dengan form ubah password untuk keamanan sesama :) -->
      <form action="<?= site_url($language . '/' . $tabel_c1 . '/update_profil') ?>" method="post"
        enctype="multipart/form-data">
        <?= input_hidden('tabel_c1_field1', $tl_c1->$tabel_c1_field1, 'required') ?>
        <?= input_edit('text', 'tabel_c1_field2', $tl_c1->$tabel_c1_field2, 'required') ?>
        <?= input_edit('text', 'tabel_c1_field3', $tl_c1->$tabel_c1_field3, 'required') ?>
        <?= input_edit('text', 'tabel_c1_field6', $tl_c1->$tabel_c1_field6, 'required') ?>

        <div class="form-group">
          <?= btn_update() ?>
        </div>
        <small>*Merubah <?= $tabel_c1_field3_alias ?> ini tidak akan merubah <?= $tabel_c1_field3_alias ?> yang ada di
          <?= $tabel_f2_alias ?></small>
      </form>
    <?php endforeach; ?>
  </div>

  <div class="col-md-6">
    <?php foreach ($dekor->result() as $dk): ?>
      <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" class="img-fluid">
    <?php endforeach ?>
  </div>
</div>


<!-- modal edit password-->
<?php foreach ($tbl_c1->result() as $tl_c1): ?>
  <div id="password<?= $tl_c1->$tabel_c1_field1 ?>" class="modal fade <?= $tabel_c1_field5 ?>">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <?= modal_header_id(lang('change_data') . ' ' . $tabel_c1_field5_alias, '') ?>

        <form action="<?= site_url($language . '/' . $tabel_c1 . '/update_pass') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">
            <?= input_hidden('tabel_c1_field1', $tl_c1->$tabel_c1_field1, 'required') ?>
            <?= add_old('password', 'tabel_c1_field4', 'required') ?>
            <?= add_new_password('tabel_c1_field4', 'required') ?>
            <?= password_req() ?>
            <?= add_confirm('password', 'tabel_c1_field4', 'required') ?>
          </div>

          <!-- pesan untuk pengguna yang sedang merubah password -->
          <!-- untuk bagian ini akan kuubah nanti -->
          <p class="small text-center text-danger"><?= get_flashdata('pesan_' . $tabel_c1_field5) ?></p>

          <div class="modal-footer">
            <?= btn_update_field('tabel_c1_field5') ?>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>