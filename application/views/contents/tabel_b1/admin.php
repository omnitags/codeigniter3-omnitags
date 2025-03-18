<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_b1) ?><?= $phase ?></h1>
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
  <form action="<?= site_url($tabel_b1 . '/admin') ?>" method="get">
    <tr>
      <td class="pr-2">
        <?= select_edit(
          'tabel_b1_field7',
          $tabel_b1_field7_value,
          $tbl_b7,
          $tabel_b7_field1,
          $tabel_b7_field2,
          'required'
        ); ?>
      </td>

      <td>
        <?= btn_cari() ?>
        <?= btn_redo('tabel_b1', '/admin') ?>
        <?php if ($tabel_b1_field7_value == NULL) { ?>

        <?php } else { ?>
          <?= btn_sync('tabel_b1', $tabel_b1_field7_value) ?>
        <?php } ?>
      </td>

    </tr>
  </form>
</table>



<p>Some images will not change immediately, cache needs to be cleared first.</p>

<div class="row">
  <div class="col-md-10">
    <?= btn_tambah() ?>
    <?= btn_laporan('tabel_b1') ?>
    <?= btn_archive('tabel_b1') ?>
  </div>

  <div class="col-md-2 d-flex justify-content-end">
    <?= view_switcher() ?>
  </div>
</div>



<div id="card-view" class="data-view active">
  <div class="row">
    <?php if (empty($tbl_b1->result())) {
      load_view('partials/no_data');
    } else {
      $counter = 1;
      foreach ($tbl_b1->result() as $tl_b1):
        echo card_file(
          $counter,
          $tl_b1->$tabel_b1_field1,
          $tl_b1->$tabel_b1_field2,
          $tl_b1->$tabel_b1_field5,
          btn_lihat($tl_b1->$tabel_b1_field1) . ' ' .
          btn_edit($tl_b1->$tabel_b1_field1) . ' ' .
          btn_hapus('tabel_b1', $tl_b1->$tabel_b1_field1),
          'text-light bg-dark',
          'col-md-3',
          $tabel_b1,
          $tl_b1->$tabel_b1_field4,
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
        <th><?= $tabel_b1_field1_alias ?></th>
        <th><?= $tabel_b1_field2_alias ?></th>
        <th><?= $tabel_b1_field3_alias ?></th>
        <th><?= $tabel_b1_field4_alias ?></th>
        <th><?= $tabel_b1_field5_alias ?></th>
        <th><?= $tabel_b1_field6_alias ?></th>
        <th><?= $tabel_b1_field7_alias ?></th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_b1->result() as $tl_b1): ?>
        <tr>
          <td></td>
          <td><?= $tl_b1->$tabel_b1_field1; ?></td>
          <td><?= $tl_b1->$tabel_b1_field2 ?></td>
          <td><?= $tl_b1->$tabel_b1_field3 ?></td>
          <td><img src="img/<?= $tabel_b1 ?>/<?= $tl_b1->$tabel_b1_field4 ?>" height="75"></td>
          <td>
            <h2><?= $tl_b1->$tabel_b1_field5 ?></h2>
          </td>
          <td><?= $tl_b1->$tabel_b1_field6 ?></td>
          <td><?= $tl_b1->$tabel_b1_field7 ?></td>
          <td>
            <?= btn_lihat($tl_b1->$tabel_b1_field1) ?>
            <?= btn_edit($tl_b1->$tabel_b1_field1) ?>
            <?= btn_hapus('tabel_b1', $tl_b1->$tabel_b1_field1) ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>


  </table>
</div>

<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= modal_header('Add ' . $tabel_b1_alias, '') ?>

      <form action="<?= site_url($tabel_b1 . '/tambah') ?>" enctype="multipart/form-data"
        method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <?= input_add('text', 'tabel_b1_field2', 'required') ?>
              <?= input_add('text', 'tabel_b1_field3', 'required') ?>
              <?= add_file('tabel_b1_field4', 'required') ?>

            </div>
            <div class="col-md-6">
              <?= input_add('text', 'tabel_b1_field5', 'required') ?>

              <div class="form-group">
                <select id="<?= $tabel_b1_field6_input ?>" class="form-control float" required
                  name="<?= $tabel_b1_field6_input ?>">
                  <option value="a">a</option>
                  <option value="b">b</option>
                  <option value="c">c</option>
                  <option value="d">d</option>
                  <option value="e">e</option>
                  <option value="f">f</option>
                  <option value="o">o</option>
                </select>
                <label for="<?= $tabel_b1_field6_input ?>" class="form-label">Select
                  <?= $tabel_b1_field6_alias ?></label>
              </div>

              <?= select_add(
                'tabel_b1_field7',
                $tbl_b7,
                $tabel_b7_field1,
                $tabel_b7_field2,
                'required'
              ); ?>
            </div>
          </div>

        </div>

        <!-- memunculkan notifikasi modal -->
        <p class="small text-center text-danger"><?= get_flashdata('pesan_tambah') ?></p>

        <div class="modal-footer">
          <?= fontawesome_link() ?>
          <?= btn_simpan() ?>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- modal edit-->
<?php foreach ($tbl_b1->result() as $tl_b1): ?>
  <div id="ubah<?= $tl_b1->$tabel_b1_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <?= modal_header_id('Make changes to ' . $tabel_b1_alias, $tl_b1->$tabel_b1_field1) ?>

        <form action="<?= site_url($tabel_b1 . '/update') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <small>* Even if you only want to change the name, you still need to re-upload the image as well.</small>
                <?= input_hidden('tabel_b1_field1', $tl_b1->$tabel_b1_field1, 'required') ?>
                <?= input_edit($tl_b1->$tabel_b1_field1, 'text', 'tabel_b1_field2', $tl_b1->$tabel_b1_field2, 'required') ?>
                <?= input_edit($tl_b1->$tabel_b1_field1, 'text', 'tabel_b1_field3', $tl_b1->$tabel_b1_field3, 'required') ?>
                <?= edit_file('tabel_b1', 'tabel_b1_field4', $tl_b1->$tabel_b1_field4, '') ?>

              </div>
              <div class="col-md-6">
                <?= input_edit($tl_b1->$tabel_b1_field1, 'text', 'tabel_b1_field5', htmlspecialchars($tl_b1->$tabel_b1_field5), 'required') ?>
                <?= select_ubah('tabel_b1_field6', option_selected($tl_b1->$tabel_b1_field6, $tl_b1->$tabel_b1_field6), option_b1(), 'required') ?>

                <?= select_edit(
                  'tabel_b1_field7',
                  $tl_b1->$tabel_b1_field7,
                  $tbl_b7,
                  $tabel_b7_field1,
                  $tabel_b7_field2,
                  'required'
                ); ?>

              </div>
            </div>

          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= get_flashdata('pesan_ubah') ?></p>

          <div class="modal-footer">
            <?= fontawesome_link() ?>
            <?= btn_update() ?>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="lihat<?= $tl_b1->$tabel_b1_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header_id($tabel_b1_alias, $tl_b1->$tabel_b1_field1) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <?= table_data(
              row_data('tabel_b1_field1', $tl_b1->$tabel_b1_field1) .
              row_data('tabel_b1_field2', $tl_b1->$tabel_b1_field2) .
              row_data('tabel_b1_field3', $tl_b1->$tabel_b1_field3) .
              row_file($tabel_b1, 'tabel_b1_field4', $tl_b1->$tabel_b1_field4) .
              row_data('tabel_b1_field5', $tl_b1->$tabel_b1_field5) .
              row_data('tabel_b1_field6', $tl_b1->$tabel_b1_field6) .
              row_data('tabel_b1_field7', $tl_b1->$tabel_b1_field7),
              'table-light'
            ) ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= get_flashdata('pesan_lihat') ?></p>

          <div class="modal-footer">
            <?= btn_history('tabel_b1', $tl_b1->$tabel_b1_field1) ?>
            <?= btn_tutup() ?>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach; ?>

<?= adjust_col_js('col-md-3', 'col-md-4') ?>
<?= load_card_pagination_js($tbl_b1->num_rows(), 28) ?>