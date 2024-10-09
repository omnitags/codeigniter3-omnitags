<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_e3) ?><?= $phase ?></h1>
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
    <?= btn_laporan('tabel_e3') ?>
    <?= btn_archive('tabel_e3') ?>
  </div>

  <div class="col-md-2 d-flex justify-content-end">
    <?= view_switcher() ?>
  </div>
</div>



<div id="card-view" class="data-view active">
  <div class="row">
    <?php if (empty($tbl_e3->result())) {
    load_view('partials/no_data');
  } else {
    $counter = 1;
    foreach ($tbl_e3->result() as $tl_e3):
      echo card_regular(
        $counter,
        $tl_e3->$tabel_e3_field1,
        $tl_e3->$tabel_e3_field1 . ' | ' . $tl_e3->$tabel_e3_field3,
        $tl_e3->$tabel_e3_field2,
        btn_lihat($tl_e3->$tabel_e3_field1) . ' ' .
        btn_edit($tl_e3->$tabel_e3_field1) . ' ' .
        btn_hapus('tabel_e3', $tl_e3->$tabel_e3_field1),
        'text-light bg-dark',
        'col-md-3',
        $tabel_e3
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
        <th><?= $tabel_e3_field1_alias ?></th>
        <th><?= $tabel_e3_field2_alias ?></th>
        <th><?= $tabel_e3_field4_alias ?></th>
        <th><?= $tabel_e3_field5_alias ?></th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_e3->result() as $tl_e3): ?>
        <tr>
          <td></td>
          <td><?= $tl_e3->$tabel_e3_field1; ?></td>
          <td><?= $tl_e3->$tabel_e3_field2 ?></td>
          <td><?= $tl_e3->$tabel_e3_field4 ?></td>
          <td><?= $tl_e3->$tabel_e3_field5 ?></td>
          <td>
            <?= btn_lihat($tl_e3->$tabel_e3_field1) ?>
            <?= btn_edit($tl_e3->$tabel_e3_field1) ?>
            <?= btn_hapus('tabel_e3', $tl_e3->$tabel_e3_field1) ?>
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
      <?= modal_header('Add ' . $tabel_e3_alias, '') ?>

      <form action="<?= site_url($tabel_e3 . '/tambah') ?>" method="post"
        enctype="multipart/form-data">
        <div class="modal-body">

          <?= input_add('text', 'tabel_e3_field2', 'required') ?>
          <?= input_add('text', 'tabel_e3_field3', 'required') ?>
          <?= add_min_max('date', 'tabel_e3_field4', '', '', '') ?>

          <?= select_add(
            'tabel_e3_field5',
            $tbl_e4,
            $tabel_e4_field1,
            $tabel_e4_field2,
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
<?php foreach ($tbl_e3->result() as $tl_e3): ?>
  <div id="ubah<?= $tl_e3->$tabel_e3_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header_id('Make changes to ' . $tabel_e3_alias, $tl_e3->$tabel_e3_field1) ?>

        <form action="<?= site_url($tabel_e3 . '/update') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">
            <?= input_edit($tl_e3->$tabel_e3_field1, 'text', 'tabel_e3_field2', $tl_e3->$tabel_e3_field2, 'required') ?>
            <?= input_edit($tl_e3->$tabel_e3_field1, 'text', 'tabel_e3_field3', $tl_e3->$tabel_e3_field3, 'required') ?>
            <?= edit_min_max( 'date', 'tabel_e3_field4', $tl_e3->$tabel_e3_field4, '', '', '') ?>

            
            
            <?= select_edit(
              'tabel_e3_field5',
              $tl_e3->$tabel_e3_field5,
              $tbl_e4,
              $tabel_e4_field1,
              $tabel_e4_field2,
              'required'
            ); ?>


            <?= input_hidden('tabel_e3_field1', $tl_e3->$tabel_e3_field1, 'required') ?>
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




  <div id="lihat<?= $tl_e3->$tabel_e3_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header_id($tabel_e3_alias, $tl_e3->$tabel_e3_field1) ?>
        <form>
          <div class="modal-body">
            <?= table_data(
              row_data('tabel_e3_field2', $tl_e3->$tabel_e3_field2) .
              row_data('tabel_e3_field3', $tl_e3->$tabel_e3_field3) .
              row_data('tabel_e3_field4', $tl_e3->$tabel_e3_field4) .
              row_data('tabel_e3_field5', $tl_e3->$tabel_e3_field5),
              'table-light'
            ) ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= get_flashdata('pesan_lihat') ?></p>

          <div class="modal-footer">
            <?= btn_history('tabel_e3', $tl_e3->$tabel_e3_field1) ?>
            <?= btn_tutup() ?>
          </div>
        </form>
      </div>
    </div>
  </div>


<?php endforeach ?>

<?= adjust_col_js('col-md-3', 'col-md-4') ?>
<?= load_card_pagination_js($tbl_e3->num_rows(), 28) ?>