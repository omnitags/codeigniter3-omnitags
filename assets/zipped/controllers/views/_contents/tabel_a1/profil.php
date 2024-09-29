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

<?php foreach ($tbl_a1 as $tl_a1): ?>
  <div class="row">
    <div class="col-md-6">
      <p><?= lang('images_not_change_immediately') ?></p>
      <div class="form-group">
        <?= btn_field($tabel_b7_field3 . $tl_a1->$tabel_b7_field1, '<i class="fas fa-edit"></i> ' . lang('tabel_b7_field3_alias')) ?>
        <?= btn_field($tabel_b7_field4 . $tl_a1->$tabel_b7_field1, '<i class="fas fa-edit"></i> ' . lang('tabel_b7_field4_alias')) ?>
        <?= btn_field($tabel_b7_field5 . $tl_a1->$tabel_b7_field1, '<i class="fas fa-edit"></i> ' . lang('tabel_b7_field5_alias')) ?>
        <?= btn_field($tabel_b7, '<i class="fas fa-edit"></i>' . lang('tabel_b7_alias')) ?>
        <?= btn_kelola('tabel_b1', '/admin') ?>
        <?= btn_kelola('tabel_b2', '/admin') ?>
        <?= btn_kelola('tabel_b8', '/admin') ?>
        <?= btn_kelola('tabel_b5', '/admin') ?>
        <?= btn_kelola('tabel_b6', '/admin') ?>
      </div>
    </div>
    <div class="col-md-6">
      <form action="<?= site_url($language . '/' . $tabel_a1 . '/update') ?>" method="post" enctype="multipart/form-data">
        <?= input_hidden('tabel_a1_field1', $tl_a1->$tabel_a1_field1, 'required') ?>
        <?= input_edit('text', 'tabel_a1_field2', $tl_a1->$tabel_a1_field2, 'required') ?>
        <?= input_edit('text', 'tabel_a1_field3', $tl_a1->$tabel_a1_field3, 'required') ?>
        <?= input_edit('text', 'tabel_a1_field4', $tl_a1->$tabel_a1_field4, 'required') ?>
        <?= input_edit('text', 'tabel_a1_field5', $tl_a1->$tabel_a1_field5, 'required') ?>

        <div class="form-group">
          <button class="btn btn-success" onclick="return confirm('Ubah data website?')" type="submit">Simpan
            Perubahan</button>
        </div>
      </form>
    </div>

  </div>


  <div id="<?= $tabel_b7 ?>" class="modal fade <?= $tabel_b7 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header(lang('change_data') . ' ' . lang('tabel_b7_alias'), '') ?>

        <form action="<?= site_url($language . '/' . $tabel_a1 . '/update_id_tema') ?>" method="post">
          <div class="modal-body">
            <?= btn_kelola('tabel_b7', '/admin') ?>

            <div class="form-group">
              <select class="form-control float" required name="<?= $tabel_a1_field6_input ?>"
                id="<?= $tabel_a1_field6_input ?>">

                <?php foreach ($tbl_b7->result() as $tl_b7): ?>
                  <?php if ($tl_a1->$tabel_a1_field6 == $tl_b7->$tabel_b7_field1) { ?>
                    <option selected hidden value="<?= $tl_b7->$tabel_b7_field1 ?>"><?= $tl_b7->$tabel_b7_field2 ?></option>
                  <?php } else { ?>
                    <option value="<?= $tl_b7->$tabel_b7_field1 ?>"><?= $tl_b7->$tabel_b7_field2 ?>
                    </option>
                  <?php }endforeach ?>

              </select>
              <label for="<?= $tabel_a1_field6_input ?>" class="form-label"><?= lang('select') ?>
                <?= $tabel_b7_alias ?></label>

              <?= input_hidden('tabel_a1_field1', $tl_a1->$tabel_a1_field1, 'required') ?>
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= get_flashdata('pesan_' . $tabel_a1_field6) ?>
          </p>

          <div class="modal-footer">
            <?= btn_update() ?>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal edit favicon-->
<?php foreach ($tbl_b7->result() as $tl_b7): ?>
  <div id="<?= $tabel_b7_field3 . $tl_b7->$tabel_b7_field1; ?>" class="modal fade <?= $tabel_b7_field3 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header(lang('change_data') . ' ' . lang('tabel_b7_field3_alias'), '') ?>

        <form action="<?= site_url($language . '/' . $tabel_b7 . '/update_favicon') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">

            <?= input_hidden('tabel_b7_field1', $tl_b7->$tabel_b7_field1, 'required') ?>
            <?= input_hidden('tabel_b7_field2', $tl_b7->$tabel_b7_field2, 'required') ?>
            <?= edit_file('tabel_b7', 'tabel_b7_field3', $tl_b7->$tabel_b7_field3, '') ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= get_flashdata('pesan_' . $tabel_b7_field3) ?>
          </p>

          <div class="modal-footer">
            <?= btn_update_field('tabel_b7_field3') ?>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div id="<?= $tabel_b7_field4 . $tl_b7->$tabel_b7_field1; ?>" class="modal fade <?= $tabel_b7_field4 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header(lang('change_data') . ' ' . lang('tabel_b7_field4_alias'), '') ?>

        <form action="<?= site_url($language . '/' . $tabel_b7 . '/update_logo') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">

            <?= input_hidden('tabel_b7_field1', $tl_b7->$tabel_b7_field1, 'required') ?>
            <?= input_hidden('tabel_b7_field2', $tl_b7->$tabel_b7_field2, 'required') ?>
            <?= edit_file('tabel_b7', 'tabel_b7_field4', $tl_b7->$tabel_b7_field4, '') ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= get_flashdata('pesan_' . $tabel_b7_field4) ?>
          </p>

          <div class="modal-footer">
            <?= btn_update_field('tabel_b7_field4') ?>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div id="<?= $tabel_b7_field5 . $tl_b7->$tabel_b7_field1; ?>" class="modal fade <?= $tabel_b7_field5 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header(lang('change_data') . ' ' . lang('tabel_b7_field5_alias'), '') ?>

        <form action="<?= site_url($language . '/' . $tabel_b7 . '/update_foto') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">

            <?= input_hidden('tabel_b7_field1', $tl_b7->$tabel_b7_field1, 'required') ?>
            <?= input_hidden('tabel_b7_field2', $tl_b7->$tabel_b7_field2, 'required') ?>
            <?= edit_file('tabel_b7', 'tabel_b7_field5', $tl_b7->$tabel_b7_field5, '') ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= get_flashdata('pesan_' . $tabel_b7_field5) ?>
          </p>

          <div class="modal-footer">
            <?= btn_update_field('tabel_b7_field5') ?>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>