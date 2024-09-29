<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_b6) ?><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor->result() as $dk): ?>
      <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200" alt="Image">
    <?php endforeach ?>
  </div>
</div>
<hr>
<!-- tabel fiter pesanan -->
<table class="mb-4">

  <!-- method get supaya nilai dari filter bisa tampil nanti -->
  <form action="<?= site_url($language . '/' . $tabel_b6 . '/admin') ?>" method="get">
    <tr>

      <td class="pr-2">
        <div class="form-group">
          <select class="form-control float" required name="<?= $tabel_b6_field7_input ?>">
            <?php foreach ($tbl_b7->result() as $tl_b7): ?>
              <option selected hidden value="<?= $tabel_b6_field7_value ?>"><?= $tabel_b6_field7_value ?></option>
              <option value="<?= $tl_b7->$tabel_b7_field1 ?>">
                <?= $tl_b7->$tabel_b7_field1 . ' - ' . $tl_b7->$tabel_b7_field2 ?>
              </option>
            <?php endforeach ?>
          </select>
          <label for="<?= $tabel_b6_field7_input ?>" class="form-label"><?= lang('select') ?>
            <?= $tabel_b7_alias ?></label>
        </div>
      </td>

      <td>
        <?= btn_cari() ?>
        <?= btn_redo('tabel_b6', '/admin') ?>
      </td>
    </tr>
  </form>
</table>

<div class="row">
  <div class="col-md-10">
    <?= btn_tambah() ?>
    <?= btn_laporan('tabel_b6') ?>


  </div>

  <div class="col-md-2 d-flex justify-content-end">
    <?= view_switcher() ?>
  </div>
</div>



<div id="card-view" class="row data-view active">
  <?php if (empty($tbl_b6->result())) { ?>
    <div class="col-md-12">
      <div class="text-center">
        <?php foreach ($no_data->result() as $nd): ?>
          <img src="img/<?= $tabel_b1 ?>/<?= $nd->$tabel_b1_field4 ?>" width="200" alt="Image">
        <?php endforeach ?>
        <h3>NO DATA</h3>
      </div>
    </div>

  <?php } else {
    foreach ($tbl_b6->result() as $tl_b6): ?>
      <?php
      $btn_class = '';
      if ($tl_b6->$tabel_b6_field6 == $tabel_b6_field6_value1) {
        $btn_class = btn_action('tabel_b6', '/nonaktifkan/' . $tl_b6->$tabel_b6_field1, '<i class="fas fa-toggle-on"></i>', 'text-warning');
      } elseif ($tl_b6->$tabel_b6_field6 == $tabel_b6_field6_value2) {
        $btn_class = btn_action('tabel_b5', '/aktifkan/' . $tl_b5->$tabel_b5_field1, '<i class="fas fa-toggle-off"></i>', 'text-warning');
      }
      echo card_regular(
        $tl_b6->$tabel_b6_field1,
        $tl_b6->$tabel_b6_field2,
        '<a class="text-decoration-none text-warning" href="' . $tl_b6->$tabel_b6_field4 . '" target="_blank">' . $tl_b6->$tabel_b6_field3 . '</a>' . $btn_class,
        btn_lihat($tl_b6->$tabel_b6_field1) . ' ' .
        btn_edit($tl_b6->$tabel_b6_field1) . ' ' .
        btn_hapus('tabel_b6', $tl_b6->$tabel_b6_field1),
        'text-white bg-secondary',
        'col-md-3',
        $tabel_b6,
      );
      ?>
    <?php endforeach;
  } ?>
</div>


<div id="table-view" class="table-responsive data-view" style="display: none;">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= lang('no') ?></th>
        <th><?= lang('tabel_b6_field1_alias') ?></th>
        <th><?= lang('tabel_b6_field2_alias') ?></th>
        <th><?= lang('tabel_b6_field3_alias') ?></th>
        <th><?= lang('tabel_b6_field4_alias') ?></th>
        <th><?= lang('tabel_b6_field5_alias') ?></th>
        <th><?= lang('tabel_b6_field6_alias') ?></th>
        <th><?= lang('tabel_b6_field7_alias') ?></th>
        <th><?= lang('action') ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_b6->result() as $tl_b6): ?>
        <tr>
          <td></td>
          <td><?= $tl_b6->$tabel_b6_field1; ?></td>
          <td><?= $tl_b6->$tabel_b6_field2 ?></td>
          <td><?= $tl_b6->$tabel_b6_field3 ?></td>
          <td><a href="<?= $tl_b6->$tabel_b6_field4 ?>" target="_blank">Visit</a>
          <td>
            <h2><?= $tl_b6->$tabel_b6_field5 ?></h2>
          </td>
          <td>
            <?php if ($tl_b6->$tabel_b6_field6 == $tabel_b6_field6_value1) { ?>
              <?= btn_action('tabel_b6', '/nonaktifkan/' . $tl_b6->$tabel_b6_field1, '<i class="fas fa-toggle-on"></i>', 'text-warning') ?>

            <?php } elseif ($tl_b6->$tabel_b6_field6 == $tabel_b6_field6_value2) { ?>
              <?= btn_action('tabel_b6', '/aktifkan/' . $tl_b6->$tabel_b6_field1, '<i class="fas fa-toggle-off"></i>', 'text-warning') ?>

            <?php } else { ?>

            <?php } ?>
          </td>
          <td><?= $tl_b6->$tabel_b6_field7 ?></td>
          <td><?= btn_lihat($tl_b6->$tabel_b6_field1) ?>
            <?= btn_edit($tl_b6->$tabel_b6_field1) ?>
            <?= btn_hapus('tabel_b6', $tl_b6->$tabel_b6_field1) ?>
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
      <?= modal_header(lang('add') . ' ' . lang('tabel_b6_alias'), '') ?>

      <form action="<?= site_url($language . '/' . $tabel_b6 . '/tambah') ?>" enctype="multipart/form-data"
        method="post">
        <div class="modal-body">
          <?= input_add('text', 'tabel_b6_field2', 'required') ?>
          <?= input_add('text', 'tabel_b6_field3', 'required') ?>
          <?= input_add('text', 'tabel_b6_field4', 'required') ?>
          <?= input_add('text', 'tabel_b6_field5', 'required') ?>

          <div class="form-group">
            <select class="form-control float" required name="<?= $tabel_b6_field7_input ?>">

              <?php foreach ($tbl_b7->result() as $tl_b7): ?>
                <option value="<?= $tl_b7->$tabel_b7_field1 ?>"><?= $tl_b7->$tabel_b7_field2 ?></option>
              <?php endforeach ?>
            </select>
            <label class="form-label"><?= lang('select') ?> <?= $tabel_b7_alias ?></label>
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


<!-- modal edit-->
<?php foreach ($tbl_b6->result() as $tl_b6): ?>
  <div id="ubah<?= $tl_b6->$tabel_b6_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header_id(lang('change_data') . ' ' . lang('tabel_b6_alias'), $tl_b6->$tabel_b6_field1) ?>

        <form action="<?= site_url($language . '/' . $tabel_b6 . '/update') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">

            <?= input_hidden('tabel_b6_field1', $tl_b6->$tabel_b6_field1, 'required') ?>
            <?= input_edit('text', 'tabel_b6_field2', $tl_b6->$tabel_b6_field2, 'required') ?>
            <?= input_edit('text', 'tabel_b6_field3', $tl_b6->$tabel_b6_field3, 'required') ?>
            <?= input_edit('text', 'tabel_b6_field4', $tl_b6->$tabel_b6_field4, 'required') ?>
            <?= input_edit('text', 'tabel_b6_field5', htmlspecialchars($tl_b6->$tabel_b6_field5), 'required') ?>

            <div class="form-group">
              <select class="form-control float" required name="<?= $tabel_b6_field7_input ?>">
                <?php foreach ($tbl_b7->result() as $tl_b7): ?>
                  <?php if ($tl_b6->$tabel_b6_field7 == $tl_b7->$tabel_b7_field1) { ?>
                    <option selected hidden value="<?= $tl_b6->$tabel_b6_field7 ?>"><?= $tl_b7->$tabel_b7_field2 ?></option>
                  <?php } else { ?>
                    <option selected hidden value=""><?= lang('select') ?>       <?= $tabel_b7_alias ?>...</option> <?php } ?>

                  <option value="<?= $tl_b7->$tabel_b7_field1 ?>"><?= $tl_b7->$tabel_b7_field2 ?></option>
                <?php endforeach ?>
              </select>
              <label class="form-label"><?= $tabel_b7_alias ?></label>
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


  <div id="lihat<?= $tl_b6->$tabel_b6_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header_id(lang('tabel_b6_alias'), $tl_b6->$tabel_b6_field1) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <?= table_data(
              row_data('tabel_b6_field2', $tl_b6->$tabel_b6_field2) .
              row_data('tabel_b6_field3', $tl_b6->$tabel_b6_field3) .
              row_data('tabel_b6_field4', '<a class="text-decoration-none text-warning" href="' . $tl_b6->$tabel_b6_field4 . '" target="_blank">' . $tl_b6->$tabel_b6_field3 . '</a>') .
              row_data('tabel_b6_field5', $tl_b6->$tabel_b6_field5) .
              row_data('tabel_b6_field6', $tl_b6->$tabel_b6_field6) .
              row_data('tabel_b6_field7', $tl_b6->$tabel_b6_field7),
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