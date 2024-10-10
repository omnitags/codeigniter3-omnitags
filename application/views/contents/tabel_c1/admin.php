<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_c1) ?><?= $phase ?></h1>
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
    <?= btn_laporan('tabel_c1') ?>
    <?= btn_archive('tabel_c1') ?>
  </div>

  <div class="col-md-2 d-flex justify-content-end">
    <?= view_switcher() ?>
  </div>
</div>


<div id="card-view" class="data-view active">
  <div class="row">
    <?php if (empty($tbl_c1->result())) {
    load_view('partials/no_data');
  } else {
    $counter = 1;
    foreach ($tbl_c1->result() as $tl_c1):
      echo card_regular(
        $counter,
        $tl_c1->$tabel_c1_field1,
        $tl_c1->$tabel_c1_field2,
        $tl_c1->$tabel_c1_field5,
        btn_lihat($tl_c1->$tabel_c1_field1) . ' ' .
        btn_edit($tl_c1->$tabel_c1_field1) . ' ' .
        btn_hapus('tabel_c1', $tl_c1->$tabel_c1_field1),
        'text-light bg-dark',
        'col-md-3',
        $tabel_c1,
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
        <th><?= $tabel_c1_field1_alias ?></th>
        <th><?= $tabel_c1_field2_alias ?></th>
        <th><?= $tabel_c1_field3_alias ?></th>
        <th><?= $tabel_c1_field4_alias ?></th>
        <th><?= $tabel_c1_field5_alias ?></th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_c1->result() as $tl_c1): ?>
        <tr>
          <td></td>
          <td><?= $tl_c1->$tabel_c1_field1; ?></td>
          <td><?= $tl_c1->$tabel_c1_field2 ?></td>
          <td><?= $tl_c1->$tabel_c1_field3 ?></td>
          <td><?= $tl_c1->$tabel_c1_field4 ?></td>
          <td><?= $tl_c1->$tabel_c1_field5 ?></td>
          <td>
            <?= btn_lihat($tl_c1->$tabel_c1_field1) ?>
            <?= btn_edit($tl_c1->$tabel_c1_field1) ?>
            <?= btn_hapus('tabel_c1', $tl_c1->$tabel_c1_field1) ?>

          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>


  </table>
</div>




<!-- Khusus tabel_c1 aku menyediakan dua mode, satu mode tabel_c1 biasa -->

<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <?= modal_header('Add ' . $tabel_c1_alias, '') ?>

      <form action="<?= site_url($tabel_c1 . '/tambah') ?>" method="post">
        <div class="modal-body">

          <?= input_add('text', 'tabel_c1_field2', 'required') ?>
          <?= input_add('text', 'tabel_c1_field3', 'required') ?>
          <?= input_add('email', 'tabel_c1_field4', 'required autocomplete="username"') ?>
          <?= input_add('text', 'tabel_c1_field5', 'required') ?>

          <?= select_add(
            'tabel_c1_field6',
            $tbl_e2,
            $tabel_e2_field1,
            $tabel_e2_field2,
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
<?php foreach ($tbl_c1->result() as $tl_c1): ?>
  <div id="ubah<?= $tl_c1->$tabel_c1_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header_id('Make changes to ' . $tabel_c1_alias, $tl_c1->$tabel_c1_field1) ?>

        <!-- administrator tidak dapat mengubah password akun lain -->
        <form action="<?= site_url($tabel_c1 . '/update') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">
            <?= input_hidden('tabel_c1_field1', $tl_c1->$tabel_c1_field1, 'required') ?>
            <?= input_edit($tl_c1->$tabel_c1_field1, 'text', 'tabel_c1_field2', $tl_c1->$tabel_c1_field2, 'required') ?>
            <?= input_edit($tl_c1->$tabel_c1_field1, 'text', 'tabel_c1_field3', $tl_c1->$tabel_c1_field3, 'required') ?>
            <?= input_edit($tl_c1->$tabel_c1_field1, 'email', 'tabel_c1_field4', $tl_c1->$tabel_c1_field4, 'required') ?>
            <?= input_edit($tl_c1->$tabel_c1_field1, 'text', 'tabel_c1_field5', $tl_c1->$tabel_c1_field5, 'required') ?>

            <?= select_edit(
              'tabel_c1_field6',
              $tl_c1->$tabel_c1_field6,
              $tbl_e2,
              $tabel_e2_field1,
              $tabel_e2_field2,
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


  <div id="lihat<?= $tl_c1->$tabel_c1_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header_id($tabel_c1_alias, $tl_c1->$tabel_c1_field1) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <?= table_data(
              row_data('tabel_c1_field2', $tl_c1->$tabel_c1_field2) .
              row_data('tabel_c1_field3', $tl_c1->$tabel_c1_field3) .
              row_data('tabel_c1_field5', $tl_c1->$tabel_c1_field5) .
              row_data('tabel_c1_field6', $tl_c1->$tabel_c1_field6),
              'table-light'
            ) ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= get_flashdata('pesan_lihat') ?></p>

          <div class="modal-footer">
            <?= btn_history('tabel_c1', $tl_c1->$tabel_c1_field1) ?>
            <?= btn_tutup() ?>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach; ?>

<?= password_js() ?>
<?= adjust_col_js('col-md-3', 'col-md-4') ?>
<?= load_card_pagination_js($tbl_c1->num_rows(), 28) ?>