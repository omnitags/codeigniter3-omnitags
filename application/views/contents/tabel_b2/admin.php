<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_b2) ?><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor->result() as $dk):
      echo tampil_dekor('175px', $tabel_b1, $dk->$tabel_b1_field4);
    endforeach ?>
  </div>
</div>
<hr>

<!-- tabel fiter pesanan -->
<table class="mb-4">

  <!-- method get supaya nilai dari filter bisa tampil nanti -->
  <form action="<?= site_url($tabel_b2 . '/admin') ?>" method="get">
    <tr>

      <td class="pr-2">
        <?= select_edit(
          'tabel_b2_field7',
          $tabel_b2_field7_value,
          $tbl_b7,
          $tabel_b7_field1,
          $tabel_b7_field2,
          'required'
        ); ?>

      </td>

      <td>
        <?= btn_cari() ?>
        <?= btn_redo('tabel_b2', '/admin') ?>
      </td>

    </tr>
  </form>
</table>


<p>Some images will not change immediately, cache needs to be cleared first.</p>
<div class="row">
  <div class="col-md-10">
    <?= btn_tambah() ?>
    <?= btn_laporan('tabel_b2') ?>
    <?= btn_archive('tabel_b2') ?>
  </div>

  <div class="col-md-2 d-flex justify-content-end">
    <?= view_switcher() ?>
  </div>
</div>




<div id="card-view" class="data-view active">
  <div class="row">
    <?php if (empty($tbl_b2->result())) {
    load_view('partials/no_data');
  } else {
    $counter = 1;
    foreach ($tbl_b2->result() as $tl_b2): ?>
      <?php
      $btn_class = '';
      if ($tl_b2->$tabel_b2_field6 == $tabel_b2_field6_value1) {
        $btn_class = btn_action('tabel_b2', 'nonaktifkan',  $tl_b2->$tabel_b2_field1, '<i class="fas fa-toggle-on fa-lg"></i>', 'text-warning');
      } elseif ($tl_b2->$tabel_b2_field6 == $tabel_b2_field6_value2) {
        $btn_class = btn_action('tabel_b2', 'aktifkan',  $tl_b2->$tabel_b2_field1, '<i class="fas fa-toggle-off fa-lg"></i>', 'text-warning');
      }
      echo card_file(
        $counter,
        $tl_b2->$tabel_b2_field1,
        $tl_b2->$tabel_b2_field2,
        $btn_class,
        btn_lihat($tl_b2->$tabel_b2_field1) . ' ' .
        btn_edit($tl_b2->$tabel_b2_field1) . ' ' .
        btn_hapus('tabel_b2', $tl_b2->$tabel_b2_field1),
        'text-light bg-dark',
        'col-md-3',
        $tabel_b2,
        $tl_b2->$tabel_b2_field4,
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
        <th><?= $tabel_b2_field1_alias ?></th>
        <th><?= $tabel_b2_field2_alias ?></th>
        <th><?= $tabel_b2_field3_alias ?></th>
        <th><?= $tabel_b2_field4_alias ?></th>
        <th><?= $tabel_b2_field5_alias ?></th>
        <th><?= $tabel_b2_field6_alias ?></th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_b2->result() as $tl_b2): ?>
        <tr>
          <td></td>
          <td><?= $tl_b2->$tabel_b2_field1; ?></td>
          <td><?= $tl_b2->$tabel_b2_field2 ?></td>
          <td><?= $tl_b2->$tabel_b2_field3 ?></td>
          <td><img src="img/<?= $tabel_b2 ?>/<?= $tl_b2->$tabel_b2_field4 ?>" width="100"></td>
          <td><?= truncateText($tl_b2->$tabel_b2_field5, 100) ?></td>
          <td>
            <?php if ($tl_b2->$tabel_b2_field6 == $tabel_b2_field6_value1) { ?>
              <?= btn_action('tabel_b2', 'nonaktifkan',  $tl_b2->$tabel_b2_field1, '<i class="fas fa-toggle-on fa-lg"></i>', 'text-warning') ?>
            <?php } elseif ($tl_b2->$tabel_b2_field6 == $tabel_b2_field6_value2) { ?>
              <?= btn_action('tabel_b2', 'aktifkan',  $tl_b2->$tabel_b2_field1, '<i class="fas fa-toggle-off fa-lg"></i>', 'text-warning') ?>
            <?php } else { ?>

            <?php } ?>
          </td>
          <td>
            <?= btn_lihat($tl_b2->$tabel_b2_field1) ?>
            <?= btn_edit($tl_b2->$tabel_b2_field1) ?>
            <?= btn_hapus('tabel_b2', $tl_b2->$tabel_b2_field1) ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>


  </table>
</div>

<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <?= modal_header('Add ' . $tabel_b2_alias, '') ?>

      <form action="<?= site_url($tabel_b2 . '/tambah') ?>" enctype="multipart/form-data"
        method="post">
        <div class="modal-body">

          <div class="row">
            <div class="col-md-4">
              <?= input_add('text', 'tabel_b2_field2', 'required') ?>
              <?= add_file('tabel_b2_field4', 'required') ?>

              <?= select_add(
                'tabel_b2_field7',
                $tbl_b7,
                $tabel_b7_field1,
                $tabel_b7_field2,
                'required'
              ); ?>

            </div>
            <div class="col-md-8">
              <?= input_add('text', 'tabel_b2_field3', 'required') ?>
              <?= input_ckeditor('tabel_b2_field5', '', 'required') ?>

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


<?php foreach ($tbl_b2->result() as $tl_b2): ?>
  <div id="ubah<?= $tl_b2->$tabel_b2_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <?= modal_header_id('Make changes to ' . $tabel_b2_alias, $tl_b2->$tabel_b2_field1) ?>

        <form action="<?= site_url($tabel_b2 . '/update') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4">
                <?= input_hidden('tabel_b2_field1', $tl_b2->$tabel_b2_field1, 'required') ?>
                <small>* Even if you only want to change the name, you still need to re-upload the image as well.</small>


                <?= input_edit($tl_b2->$tabel_b2_field1, 'text', 'tabel_b2_field2', $tl_b2->$tabel_b2_field2, 'required') ?>
                <?= edit_file('tabel_b2', 'tabel_b2_field4', $tl_b2->$tabel_b2_field4, '') ?>

                <?= select_edit(
                  'tabel_b2_field7',
                  $tl_b2->$tabel_b2_field7,
                  $tbl_b7,
                  $tabel_b7_field1,
                  $tabel_b7_field2,
                  'required'
                ); ?>

              </div>
              <div class="col-md-8">
                <?= input_edit($tl_b2->$tabel_b2_field1, 'text', 'tabel_b2_field3', $tl_b2->$tabel_b2_field3, 'required') ?>
                <?= input_ckeditor('tabel_b2_field5', $tl_b2->$tabel_b2_field5, 'required') ?>

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



  <div id="lihat<?= $tl_b2->$tabel_b2_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <?= modal_header_id($tabel_b2_alias, $tl_b2->$tabel_b2_field1) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <?= table_data(
                  row_data('tabel_b2_field1', $tl_b2->$tabel_b2_field1) .
                  row_data('tabel_b2_field2', $tl_b2->$tabel_b2_field2) .
                  row_data('tabel_b2_field3', $tl_b2->$tabel_b2_field3) .
                  row_file($tabel_b2, 'tabel_b2_field4', $tl_b2->$tabel_b2_field4),
                  'table-light'
                ) ?>
              </div>
              <div class="col-md-6">
                <?=
                  tampil_text('tabel_b2_field5', truncateText(html_entity_decode($tl_b2->$tabel_b2_field5), 300) . btn_read_more('tabel_b2', $tl_b2->$tabel_b2_field1))
                  ?>
              </div>
            </div>

          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= get_flashdata('pesan_lihat') ?></p>

          <div class="modal-footer">
            <?= btn_history('tabel_b2', $tl_b2->$tabel_b2_field1) ?>
            <?= btn_tutup() ?>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach; ?>

<?= adjust_col_js('col-md-3', 'col-md-4') ?>
<?= load_card_pagination_js($tbl_b2->num_rows(), 28) ?>