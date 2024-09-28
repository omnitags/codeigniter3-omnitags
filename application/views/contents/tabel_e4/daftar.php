<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_e4) ?><?= $phase ?></h1>

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
    <!-- <button class="btn btn-info   b-4" type="button" data-toggle="modal" data-target="#import">+ Import</button>
    <button type="button" class="btn btn-info mb-4" id="export-btn" target="_blank">
      <i class="fas fa-print"></i> Cetak Excel</button> -->

  </div>

  <div class="col-md-2 d-flex justify-content-end">
  </div>
</div>


<div id="card-view" class="row data-view active">
  <?php if (empty($tbl_e4->result())) { ?>
    <div class="col-md-12">
      <div class="text-center">
        <?php foreach ($no_data->result() as $nd): ?>
          <img src="img/<?= $tabel_b1 ?>/<?= $nd->$tabel_b1_field4 ?>" width="200" alt="Image">
        <?php endforeach ?>
        <h3>NO DATA</h3>
      </div>
    </div>

  <?php } else {
    foreach ($tbl_e4->result() as $tl_e4):
      if ($tl_e4->$tabel_e4_field9 == $tabel_e4_field9_value1) {
        $button = '';
      } elseif ($tl_e4->$tabel_e4_field9 == $tabel_e4_field9_value3) {
        $button = '';
      } else {
        if ($tl_e4->$tabel_e4_field8 == $tabel_e4_field8_value1) {
          $button =
            btn_action('tabel_e4', '/nonaktifkan/' . $tl_e4->$tabel_e4_field1, '<i class="far fa-eye"></i>', 'text-success btn-light');
        } elseif ($tl_e4->$tabel_e4_field8 == $tabel_e4_field8_value2) {
          $button =
            btn_action('tabel_e4', '/aktifkan/' . $tl_e4->$tabel_e4_field1, '<i class="far fa-eye-slash"></i>', 'text-secondary btn-light');
        }

      }
      echo card_file(
        $tl_e4->$tabel_e4_field1,
        $tl_e4->$tabel_e4_field3,
        $tl_e4->$tabel_e4_field8,
        btn_lihat($tl_e4->$tabel_e4_field1) . ' ' .
        $button . ' ' .
        btn_edit($tl_e4->$tabel_e4_field1) . ' ' .
        btn_hapus('tabel_e4', $tl_e4->$tabel_e4_field1),
        'text-white bg-danger',
        'col-md-4',
        $tabel_e4,
        $tl_e4->$tabel_e4_field5,
      );
    endforeach;
  } ?>
</div>


<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= modal_header(lang('add') . ' ' . lang('tabel_e4_alias'), '') ?>
      <form action="<?= site_url($language . '/' . $tabel_e4 . '/tambah') ?>" enctype="multipart/form-data"
        method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <?= add_file('tabel_e4_field5', 'required') ?>
            </div>
            <div class="col-md-8">
              <?= input_add('text', 'tabel_e4_field3', 'required') ?>
              <?= input_textarea('tabel_e4_field4', '', 'required') ?>

            </div>
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
<?php foreach ($tbl_e4->result() as $tl_e4): ?>
  <div id="ubah<?= $tl_e4->$tabel_e4_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <?= modal_header_id(lang('change_data') . ' ' . lang('tabel_e4_alias'), $tl_e4->$tabel_e4_field1) ?>


        <!-- administrator tidak dapat mengubah password akun lain -->
        <form action="<?= site_url($language . '/' . $tabel_e4 . '/update') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-5">
                <?= edit_file('tabel_e4', 'tabel_e4_field5', $tl_e4->$tabel_e4_field5, '') ?>
              </div>
              <div class="col-md-7">
                <?= input_hidden('tabel_e4_field1', $tl_e4->$tabel_e4_field1, 'required') ?>
                <?= input_edit('text', 'tabel_e4_field3', $tl_e4->$tabel_e4_field3, 'required') ?>
                <?= input_textarea('tabel_e4_field4', $tl_e4->$tabel_e4_field4, 'required') ?>

              </div>
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


  <!-- modal lihat -->
  <div id="lihat<?= $tl_e4->$tabel_e4_field1 ?>" class="modal fade lihat">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <?= modal_header($tl_e4->$tabel_e4_field3, '') ?>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <?= tampil_image('400px', $tabel_e4, $tl_e4->$tabel_e4_field5, $tl_e4->$tabel_e4_field5) ?>

            </div>
            <div class="col-md-6">
              <div class="border border-dark">
                <div style="height: 200px" class="overflow-auto">
                  <p><?= $tl_e4->$tabel_e4_field4 ?></p>
                </div>

              </div>
              <?= table_data(
                row_data('tabel_e4_field6', $tl_e4->$tabel_e4_field6) .
                row_data('tabel_e4_field7', $tl_e4->$tabel_e4_field7),
                'text-dark bg-light'
              ); ?>

            </div>

          </div>
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

<?= adjust_col_js() ?>