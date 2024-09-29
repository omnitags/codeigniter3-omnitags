<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_f2) ?><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor->result() as $dk): ?>
      <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200" alt="Image">
    <?php endforeach ?>
  </div>
</div>
<hr>




<div class="row">
  <div class="col-md-10">
    <?= btn_tambah() ?>
    <?= btn_laporan('tabel_f2') ?>
  </div>

  <div class="col-md-2 d-flex justify-content-end">
    <?= view_switcher() ?>
  </div>
</div>

<div id="card-view" class="row data-view active">
  <?php if (empty($tbl_f2->result())) { ?>
    <div class="col-md-12">
      <div class="text-center">
        <?php foreach ($no_data->result() as $nd): ?>
          <img src="img/<?= $tabel_b1 ?>/<?= $nd->$tabel_b1_field4 ?>" width="200" alt="Image">
        <?php endforeach ?>
        <h3>NO DATA</h3>
      </div>
    </div>

  <?php } else {
    foreach ($tbl_f2->result() as $tl_f2):
      $button =
        btn_lihat($tl_f2->$tabel_f2_field1) . ' ' .
        btn_edit($tl_f2->$tabel_f2_field1) . ' ' .
        btn_hapus('tabel_f2', $tl_f2->$tabel_f2_field1);

      echo card_regular(
        $tl_f2->$tabel_f2_field1,
        'Rp' . number_format($tl_f2->$tabel_f2_field5, '2', ',', '.'),
        card_content('50%', 'tabel_e4', $tl_f2->$tabel_f2_field2) .
        card_content('50%', 'tabel_e3', $tl_f2->$tabel_f2_field3) .
        card_content('50%', 'tabel_e1', $tl_f2->$tabel_f2_field4),
        $button,
        'text-dark bg-light',
        'col-md-4',
        $tabel_f2,
      );
    endforeach;
  } ?>
</div>


<div id="table-view" class="table-responsive data-view" style="display: none;">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= lang('no') ?></th>
        <th><?= lang('tabel_f2_field1_alias') ?></th>
        <th><?= lang('tabel_f2_field2_alias') ?></th>
        <th><?= lang('tabel_f2_field3_alias') ?></th>
        <th><?= lang('tabel_f2_field5_alias') ?></th>
        <th><?= lang('tabel_f2_field5_alias') ?></th>
        <th><?= lang('action') ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_f2->result() as $tl_f2): ?>
        <tr>
          <td></td>
          <td><?= $tl_f2->$tabel_f2_field1 ?></td>
          <td><?= $tl_f2->$tabel_f2_field2 ?></td>
          <td><?= $tl_f2->$tabel_f2_field3 ?></td>
          <td><?= $tl_f2->$tabel_f2_field5 ?></td>
          <td><?= $tl_f2->$tabel_f2_field5 ?></td>

          <td>
            <?= btn_lihat($tl_f2->$tabel_f2_field1) ?>
            <?= btn_edit($tl_f2->$tabel_f2_field1) ?>
            <?= btn_hapus('tabel_f2', $tl_f2->$tabel_f2_field1) ?>
          </td>

        </tr>
      <?php endforeach ?>
    </tbody>

  </table>
</div>


<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <?= modal_header(lang('add') . ' ' . lang('tabel_f2_alias'), '') ?>
      <form action="<?= site_url($language . '/' . $tabel_f2 . '/tambah') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <select id="<?= $tabel_f2_field2_input ?>" class="form-control float" required
              name="<?= $tabel_f2_field2_input ?>">
              <?php foreach ($tbl_e4->result() as $tl_e4): ?>
                <option value="<?= $tl_e4->$tabel_e4_field1 ?>"><?= $tl_e4->$tabel_e4_field2 ?></option>
              <?php endforeach ?>
            </select>
            <label for="<?= $tabel_f2_field2_input ?>" class="form-label"><?= lang('select') ?>
              <?= $tabel_e4_alias ?></label>
          </div>

          <div class="form-group">
            <select id="<?= $tabel_f2_field3_input ?>" class="form-control float" required
              name="<?= $tabel_f2_field3_input ?>">
              <?php foreach ($tbl_e3->result() as $tl_e3): ?>
                <option value="<?= $tl_e3->$tabel_e3_field1 ?>"><?= $tl_e3->$tabel_e3_field2 ?></option>
              <?php endforeach ?>
            </select>
            <label for="<?= $tabel_f2_field3_input ?>" class="form-label"><?= lang('select') ?>
              <?= $tabel_e3_alias ?></label>
          </div>

          <div class="form-group">
            <select id="<?= $tabel_f2_field4_input ?>" class="form-control float" required
              name="<?= $tabel_f2_field4_input ?>">
              <?php foreach ($tbl_e1->result() as $tl_e1): ?>
                <option value="<?= $tl_e1->$tabel_e1_field1 ?>"><?= $tl_e1->$tabel_e1_field2 ?></option>
              <?php endforeach ?>
            </select>
            <label for="<?= $tabel_f2_field4_input ?>" class="form-label"><?= lang('select') ?>
              <?= $tabel_e1_alias ?></label>
          </div>

        </div>
        <!-- memunculkan notifikasi modal -->
        <p class="small text-center text-danger"><?= get_flashdata('pesan_tambah') ?></p>
        <div class="modal-footer">
          <?= btn_simpan() ?>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal edit -->
<?php foreach ($tbl_f2->result() as $tl_f2): ?>
  <div id="ubah<?= $tl_f2->$tabel_f2_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header_id(lang('change_data') . ' ' . lang('tabel_f2_alias'), $tl_f2->$tabel_f2_field1) ?>

        <!-- administrator tidak dapat mengubah password akun lain -->
        <form action="<?= site_url($language . '/' . $tabel_f2 . '/update') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">
            <?= input_hidden('tabel_f2_field1', $tl_f2->$tabel_f2_field1, 'required') ?>
            <div class="form-group">
              <select id="<?= $tabel_f2_field2_input ?>" class="form-control float" required
                name="<?= $tabel_f2_field2_input ?>">
                <option selected hidden value="<?= $tl_f2->$tabel_f2_field2 ?>"><?= $tl_f2->$tabel_f2_field2 ?>
                </option>
                <?php foreach ($tbl_e4->result() as $tl_e4): ?>
                  <option value="<?= $tl_e4->$tabel_e4_field1 ?>">
                    <?= $tl_e4->$tabel_e4_field1 . ' - ' . $tl_e4->$tabel_e4_field2 ?>
                  </option>
                <?php endforeach ?>
              </select>
              <label for="<?= $tabel_f2_field2_input ?>" class="form-label"><?= lang('select') ?>
                <?= $tabel_e4_alias ?></label>
            </div>

            <div class="form-group">
              <select id="<?= $tabel_f2_field3_input ?>" class="form-control float" required
                name="<?= $tabel_f2_field3_input ?>">
                <option selected hidden value="<?= $tl_f2->$tabel_f2_field3 ?>"><?= $tl_f2->$tabel_f2_field3 ?>
                </option>
                <?php foreach ($tbl_e3->result() as $tl_e3): ?>
                  <option value="<?= $tl_e3->$tabel_e3_field1 ?>"><?= $tl_e3->$tabel_e3_field2 ?></option>
                <?php endforeach ?>
              </select>
              <label for="<?= $tabel_f2_field3_input ?>" class="form-label"><?= lang('select') ?>
                <?= $tabel_e3_alias ?></label>
            </div>

            <div class="form-group">
              <select id="<?= $tabel_f2_field4_input ?>" class="form-control float" required
                name="<?= $tabel_f2_field4_input ?>">
                <?php foreach ($tbl_e1->result() as $tl_e1):
                  if ($tbl_f2->$tabel_f2_field4 != $tl_e1->$tabel_e1_field1) {
                  } else { ?>
                    <option selected hidden value="<?= $tl_f2->$tabel_f2_field4 ?>"><?= $tl_f2->$tabel_f2_field4 ?>
                    </option>
                  <?php }endforeach ?>
                <?php foreach ($tbl_e1->result() as $tl_e1): ?>
                  <option value="<?= $tl_e1->$tabel_e1_field1 ?>"><?= $tl_e1->$tabel_e1_field2 ?></option>
                <?php endforeach ?>
              </select>
              <label for="<?= $tabel_f2_field4_input ?>" class="form-label"><?= lang('select') ?>
                <?= $tabel_e1_alias ?></label>
            </div>

          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= get_flashdata('pesan_ubah') ?></p>

          <div class="modal-footer">
            <?= btn_update() ?>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div id="lihat<?= $tl_f2->$tabel_f2_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header_id(lang('tabel_f2_alias'), $tl_f2->$tabel_f2_field1) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <?= table_data(
              row_data('tabel_f2_field2', $tl_f2->$tabel_f2_field2) .
              row_data('tabel_f2_field3', $tl_f2->$tabel_f2_field3) .
              row_data('tabel_f2_field4', $tl_f2->$tabel_f2_field4) .
              row_data('tabel_f2_field5', 'Rp' . number_format($tl_f2->$tabel_f2_field5, '2', ',', '.')),
              'table-light'
            ) ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= get_flashdata('pesan_lihat') ?></p>

          <div class="modal-footer">
            <?= btn_tutup() ?>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach; ?>
<?= adjust_col_js() ?>