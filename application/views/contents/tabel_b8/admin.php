<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_b8) ?><?= $phase ?></h1>
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
    <?= btn_laporan('tabel_b8') ?>
    <?= btn_archive('tabel_b8') ?>
  </div>

  <div class="col-md-2 d-flex justify-content-end">
    <?= view_switcher() ?>
  </div>
</div>




<div id="card-view" class="data-view active">
  <div class="row">
    <?php if (empty($tbl_b8->result())) {
      load_view('partials/no_data');
    } else {
      $counter = 1;
      foreach ($tbl_b8->result() as $tl_b8):
        echo card_regular(
          $counter,
          $tl_b8->$tabel_b8_field1,
          $tl_b8->$tabel_b8_field2,
          '<div style="width: 100%;">' .
          card_content('40%', 'tabel_b8_field3', card_text($tl_b8->$tabel_b8_field3)) .
          card_content('40%', 'tabel_b8_field4', $tl_b8->$tabel_b8_field4) .
          '</div>',
          btn_lihat($tl_b8->$tabel_b8_field1) . ' ' .
          btn_edit($tl_b8->$tabel_b8_field1) . ' ' .
          btn_hapus('tabel_b8', $tl_b8->$tabel_b8_field1),
          'text-light bg-dark',
          'col-md-4',
          $tabel_b8,
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
        <th><?= $tabel_b8_field1_alias ?></th>
        <th><?= $tabel_b8_field2_alias ?></th>
        <th><?= $tabel_b8_field3_alias ?></th>
        <th><?= $tabel_b8_field4_alias ?></th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_b8->result() as $tl_b8): ?>
        <tr>
          <td></td>
          <td><?= $tl_b8->$tabel_b8_field1; ?></td>
          <td><?= $tl_b8->$tabel_b8_field2 ?></td>
          <td><?= $tl_b8->$tabel_b8_field3 ?></td>
          <td>
            <h2><?= $tl_b8->$tabel_b8_field4 ?></h2>
          </td>
          <td>
            <?= btn_lihat($tl_b8->$tabel_b8_field1) ?>
            <?= btn_edit($tl_b8->$tabel_b8_field1) ?>
            <?= btn_hapus('tabel_b8', $tl_b8->$tabel_b8_field1) ?>
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
      <?= modal_header('Add ' . $tabel_b8_alias, '') ?>A

      <form action="<?= site_url($tabel_b8 . '/tambah') ?>" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <?= input_add('text', 'tabel_b8_field2', 'required') ?>
          <?= input_add('text', 'tabel_b8_field3', 'required') ?>
          <?= input_add('text', 'tabel_b8_field4', 'required') ?>
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



<!-- modal ubah-->
<?php foreach ($tbl_b8->result() as $tl_b8): ?>
  <div id="ubah<?= $tl_b8->$tabel_b8_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header_id('Make changes to ' . $tabel_b8_alias, $tl_b8->$tabel_b8_field1) ?>

        <form action="<?= site_url($tabel_b8 . '/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <?= input_hidden('tabel_b8_field1', $tl_b8->$tabel_b8_field1, 'required') ?>
            <?= input_edit($tl_b8->$tabel_b8_field1, 'text', 'tabel_b8_field2', $tl_b8->$tabel_b8_field2, 'required') ?>
            <?= input_edit($tl_b8->$tabel_b8_field1, 'text', 'tabel_b8_field3', $tl_b8->$tabel_b8_field3, 'required') ?>
            <?= input_edit($tl_b8->$tabel_b8_field1, 'text', 'tabel_b8_field4', htmlspecialchars($tl_b8->$tabel_b8_field4), 'required') ?>
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



  <div id="lihat<?= $tl_b8->$tabel_b8_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header_id($tabel_b8_alias, $tl_b8->$tabel_b8_field1) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <?= table_data(
              row_data('tabel_b8_field1', $tl_b8->$tabel_b8_field1) .
              row_data('tabel_b8_field2', $tl_b8->$tabel_b8_field2) .
              row_data('tabel_b8_field3', $tl_b8->$tabel_b8_field3) .
              row_data('tabel_b8_field4', $tl_b8->$tabel_b8_field4),
              'table-light',
            ) ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= get_flashdata('pesan_lihat') ?></p>

          <div class="modal-footer">
            <?= btn_history('tabel_b8', $tl_b8->$tabel_b8_field1) ?>
            <?= btn_tutup() ?>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach; ?>

<?= adjust_col_js('col-md-3', 'col-md-4') ?>
<?= load_card_pagination_js($tbl_b8->num_rows(), 28) ?>