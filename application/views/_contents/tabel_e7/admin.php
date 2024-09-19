<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_e7) ?><?= $phase ?></h1>

  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor->result() as $dk):
      echo tampil_dekor('175px', $tabel_b1, $dk->$tabel_b1_field4);
    endforeach ?>
  </div>
</div>
<hr>


<div class="row">
  <div class="col-md-10">
    <?= btn_tambah() ?>
    <?= btn_laporan('tabel_e7') ?>
    <!-- <button class="btn btn-info   b-4" type="button" data-toggle="modal" data-target="#import">+ Import</button>
    <button type="button" class="btn btn-info mb-4" id="export-btn" target="_blank">
      <i class="fas fa-print"></i> Cetak Excel</button> -->

  </div>

  <div class="col-md-2 d-flex justify-content-end">
    <?= view_switcher() ?>
  </div>
</div>


<div id="card-view" class="row data-view active">
  <?php if (empty($tbl_e7->result())) {
    load_view('_partials/no_data');
  } else {
    foreach ($tbl_e7->result() as $tl_e7):
      echo card_regular(
        $tl_e7->$tabel_e7_field1,
        $tabel_e7_field1_alias . ': ' . $tl_e7->$tabel_e7_field1,
        $tl_e7->$tabel_e7_field2,
        btn_lihat($tl_e7->$tabel_e7_field1) . ' ' .
        btn_edit($tl_e7->$tabel_e7_field1),
        'text-white bg-danger',
        'col-md-3',
        $tabel_e7,
      );
    endforeach;
  } ?>
</div>


<div id="table-view" class="table-responsive data-view" style="display: none;">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= lang('no') ?></th>
        <th><?= lang('tabel_e7_field1_alias') ?></th>
        <th><?= lang('tabel_e7_field2_alias') ?></th>
        <th><?= lang('action') ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_e7->result() as $tl_e7): ?>
        <tr>
          <td></td>
          <td><?= $tl_e7->$tabel_e7_field1; ?></td>
          <td><?= $tl_e7->$tabel_e7_field2 ?></td>
          <td>
            <?= btn_lihat($tl_e7->$tabel_e7_field1) ?>
            <?= btn_edit($tl_e7->$tabel_e7_field1) ?>

            <!-- Sebelumnya saya sudah membahas ini di v_admin_spp
          Saya akan mempending fitur ini dengan alasan yang sama dalam waktu yang belum ditentukan -->
            <!-- <a class="btn btn-light text-danger" onclick="return confirm('Hapus user?')" href="< site_url($tabel_c2 . '/hapus/' . $tl_e7->$tabel_e7_field1) ?>">
            <i class="fas fa-trash"></i></a> -->

          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>
</div>

<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <?= modal_header(lang('add') . ' ' . lang('tabel_e7_alias'), '') ?>
      <form action="<?= site_url($language . '/' . $tabel_e7 . '/tambah') ?>" method="post">
        <div class="modal-body">
          <?= input_add('text', 'tabel_e7_field2', 'required') ?>
          <?= input_ckeditor('tabel_e7_field3', '', 'required') ?>

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
<?php foreach ($tbl_e7->result() as $tl_e7): ?>
  <div id="ubah<?= $tl_e7->$tabel_e7_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header_id(lang('change_data') . ' ' . lang('tabel_e7_alias'), $tl_e7->$tabel_e7_field1) ?>

        <!-- administrator tidak dapat mengubah password akun lain -->
        <form action="<?= site_url($language . '/' . $tabel_e7 . '/update') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">
            <?= input_hidden('tabel_e7_field1', $tl_e7->$tabel_e7_field1, 'required') ?>
            <?= input_edit('text', 'tabel_e7_field2', $tl_e7->$tabel_e7_field2, 'required') ?>
            <?= input_ckeditor('tabel_e7_field3', $tl_e7->$tabel_e7_field3, 'required') ?>
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


  <div id="lihat<?= $tl_e7->$tabel_e7_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header_id(lang('tabel_e7_alias'), $tl_e7->$tabel_e7_field1) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <?= table_data(
              row_data('tabel_e7_field2', $tl_e7->$tabel_e7_field2) .
              row_data('tabel_e7_field3', $tl_e7->$tabel_e7_field3),
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

<?= adjust_col_js('col-md-3', 'col-md-4') ?>