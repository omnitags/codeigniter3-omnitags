<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_a1) ?><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor->result() as $dk):
      echo tampil_dekor('175px', $tabel_b1, $dk->$tabel_b1_field4);
    endforeach ?>
  </div>
</div>
<hr>
<p>Some images will not change immediately, cache needs to be cleared first.</p>

<div class="row">
  <div class="col-md-10">
    <?= btn_tambah() ?>
    <?= btn_laporan('tabel_a1') ?>
    <?= btn_archive('tabel_a1') ?>
  </div>

  <div class="col-md-2 d-flex justify-content-end">
    <?= view_switcher() ?>
  </div>
</div>




<div id="card-view" class="data-view active">
  <div class="row">
    <?php if (empty($tbl_a1->result())) {
    load_view('partials/no_data');
  } else {
    $counter = 1;
    foreach ($tbl_a1 as $tl_a1):
      echo card_file(
        $counter,
        $tl_a1->$tabel_a1_field1,
        $tl_a1->$tabel_a1_field2,
        $tl_a1->$tabel_a1_field4,
        btn_lihat($tl_a1_alt->$tabel_a1_field1) . ' ' .
        btn_edit($tl_a1_alt->$tabel_a1_field1) . ' ' .
        btn_hapus($tabel_a1, $tl_a1_alt->$tabel_a1_field1),
        'text-light bg-dark',
        'col-md-3',
        $tabel_a1,
        $tl_a1->$tabel_a1_field3,
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
        <th><?= $tabel_a1_field1_alias ?></th>
        <th><?= $tabel_a1_field2_alias ?></th>
        <th><?= $tabel_a1_field4_alias ?></th>
        <th><?= $tabel_a1_field3_alias ?></th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_a1_alt->result() as $tl_a1_alt): ?>
        <tr>
          <td></td>
          <td><?= $tl_a1_alt->$tabel_a1_field1; ?></td>
          <td><?= $tl_a1_alt->$tabel_a1_field2 ?></td>
          <td><?= $tl_a1_alt->$tabel_a1_field4 ?></td>
          <td><img src="img/<?= $tabel_b7 ?>/<?= $tl_a1_alt->$tabel_a1_field3 ?>" width="100"></td>
          <td>
            <?= btn_lihat($tl_a1_alt->$tabel_a1_field1) ?>
            <?= btn_edit($tl_a1_alt->$tabel_a1_field1) ?>
            <?= btn_hapus($tabel_a1, $tl_a1_alt->$tabel_a1_field1) ?>
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
      <?= modal_header('Add ' . $tabel_a1_alias, '') ?>

      <form action="<?= site_url($tabel_a1 . '/tambah') ?>" enctype="multipart/form-data"
        method="post">
        <div class="modal-body">
          <?= input_add('text', 'tabel_a1_field2', 'required') ?>
          <?= input_add('text', 'tabel_a1_field4', 'required') ?>
          <?= add_file('tabel_a1_field3', 'required') ?>
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

<!-- modal lihat -->
<?php foreach ($tbl_a1_alt->result() as $tl_a1_alt): ?>
  <div id="lihat<?= $tl_a1_alt->$tabel_a1_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header_id($tabel_a1_alias, $tl_a1_alt->$tabel_a1_field1) ?>
        <form>
          <div class="modal-body">
            <?= table_data(
              row_data('tabel_a1_field1', $tl_a1_alt->$tabel_a1_field1) .
              row_data('tabel_a1_field2', $tl_a1_alt->$tabel_a1_field2) .
              row_data('tabel_a1_field4', $tl_a1_alt->$tabel_a1_field4) .
              row_file($tabel_a1, 'tabel_a1_field3', $tl_a1_alt->$tabel_a1_field3),
              'table-light'
            ) ?>
          </div>
          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= get_flashdata('pesan_lihat') ?></p>

          <div class="modal-footer">
            <?= btn_history('tabel_a1', $tl_a1->$tabel_a1_field1) ?>
            <?= btn_tutup() ?>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="ubah<?= $tl_a1_alt->$tabel_a1_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header_id('Make changes to ' . $tabel_a1_field1_alias, $tl_a1_alt->$tabel_a1_field1) ?>

        <form action="<?= site_url($tabel_a1 . '/update') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">
            <?= input_hidden('tabel_a1_field1', $tl_a1_alt->$tabel_a1_field1, 'required') ?>

            <small>* Even if you only want to change the name, you still need to re-upload the image as well.</small>

            <?= input_edit($tl_a1->$tabel_a1_field1, 'text', 'tabel_a1_field2', $tl_a1_alt->$tabel_a1_field2, 'required') ?>
            <?= input_edit($tl_a1->$tabel_a1_field1, 'text', 'tabel_a1_field4', $tl_a1_alt->$tabel_a1_field4, 'required') ?>
            <?= edit_file($tabel_a1, 'tabel_a1_field3', $tl_a1_alt->$tabel_a1_field3, 'required') ?>
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
<?php endforeach; ?>

<?= adjust_col_js('col-md-3', 'col-md-4') ?>
