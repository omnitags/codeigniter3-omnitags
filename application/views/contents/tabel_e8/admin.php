<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_e8) ?><?= $phase ?></h1>

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
    <?= btn_laporan('tabel_e8') ?>
    <!-- <button class="btn btn-info   b-4" type="button" data-toggle="modal" data-target="#import">+ Import</button>
    <button type="button" class="btn btn-info mb-4" id="export-btn" target="_blank">
      <i class="fas fa-print"></i> Cetak Excel</button> -->

  </div>

  <div class="col-md-2 d-flex justify-content-end">
    <?= view_switcher() ?>
  </div>
</div>


<div id="card-view" class="data-view active">
  <div class="row">
    <?php if (empty($tbl_e8->result())) {
    load_view('partials/no_data');
  } else {
    $counter = 1;
    foreach ($tbl_e8->result() as $tl_e8):
      echo card_regular(
        $counter,
        $tl_e8->$tabel_e8_field1,
        $tabel_e8_field1_alias . ': ' . $tl_e8->$tabel_e8_field1,
        '<div style="width: 100%;">' .
        card_content('40%', 'tabel_e8_field2', $tl_e8->$tabel_e8_field2) .
        card_content('40%', 'tabel_e8_field3', $tl_e8->$tabel_e8_field3) .
        '</div>',
        btn_lihat($tl_e8->$tabel_e8_field1) . ' ' .
        btn_edit($tl_e8->$tabel_e8_field1),
        'text-light bg-dark',
        'col-md-3',
        $tabel_e8,
      );
    $counter++;
    endforeach;
  } ?>

</div>
  <div class="row">
    <?= card_pagination() ?>
  </div>
</div>


<div id="table-view" class="table-responsive data-view" style="display: none;">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_e8_field1_alias ?></th>
        <th><?= $tabel_e8_field2_alias ?></th>
        <th><?= $tabel_e8_field3_alias ?></th>
        <th><?= $tabel_e8_field4_alias ?></th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_e8->result() as $tl_e8): ?>
        <tr>
          <td></td>
          <td><?= $tl_e8->$tabel_e8_field1; ?></td>
          <td><?= $tl_e8->$tabel_e8_field2 ?></td>
          <td><?= $tl_e8->$tabel_e8_field3 ?></td>
          <td><?= $tl_e8->$tabel_e8_field4 ?></td>
          <td>
            <?= btn_lihat($tl_e8->$tabel_e8_field1) ?>
            <?= btn_edit($tl_e8->$tabel_e8_field1) ?>
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
      <?= modal_header('Add ' . $tabel_e8_alias, '') ?>
      <form action="<?= site_url($tabel_e8 . '/tambah') ?>" method="post">
        <div class="modal-body">
          <?= select_add(
              'tabel_e8_field2',
              $tbl_c1,
              $tabel_c1_field1,
              $tabel_c1_field2,
              'required'
            ); ?>

            <?= select_add(
              'tabel_e8_field3',
              $tbl_e3,
              $tabel_e3_field1,
              $tabel_e3_field3,
              'required'
            ); ?>

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
<?php foreach ($tbl_e8->result() as $tl_e8): ?>
  <div id="ubah<?= $tl_e8->$tabel_e8_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header_id('Make changes to ' . $tabel_e8_alias, $tl_e8->$tabel_e8_field1) ?>

        <!-- administrator tidak dapat mengubah password akun lain -->
        <form action="<?= site_url($tabel_e8 . '/update') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">
            <?= input_hidden('tabel_e8_field1', $tl_e8->$tabel_e8_field1, 'required') ?>
            
            <?= select_edit(
              'tabel_e8_field2',
              $tl_e8->$tabel_e8_field2,
              $tbl_c1,
              $tabel_c1_field1,
              $tabel_c1_field2,
              'required'
            ); ?>

            <?= select_edit(
              'tabel_e8_field3',
              $tl_e8->$tabel_e8_field3,
              $tbl_e3,
              $tabel_e3_field1,
              $tabel_e3_field3,
              'required'
            ); ?>
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


  <div id="lihat<?= $tl_e8->$tabel_e8_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header_id($tabel_e8_alias, $tl_e8->$tabel_e8_field1) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <?= table_data(
              row_data('tabel_e8_field2', $tl_e8->$tabel_e8_field2) .
              row_data('tabel_e8_field3', $tl_e8->$tabel_e8_field3),
              'table-light'
            ) ?>

          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= get_flashdata('pesan_lihat') ?></p>

          <div class="modal-footer">
            <?= btn_history('tabel_e8', $tl_e8->$tabel_e8_field1) ?>
            <?= btn_tutup() ?>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach; ?>

<?= adjust_col_js('col-md-3', 'col-md-4') ?>
<?= load_card_pagination_js($tbl_e8->num_rows(), 28) ?>