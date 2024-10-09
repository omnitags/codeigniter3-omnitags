<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_c2) ?><?= $phase ?></h1>
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
    <?= btn_laporan('tabel_c2') ?>
    <?= btn_archive('tabel_c2') ?>
  </div>

  <div class="col-md-2 d-flex justify-content-end">
    <?= view_switcher() ?>
  </div>
</div>

<div id="card-view" class="data-view active">
  <div class="row">
    <?php if (empty($tbl_c2->result())) {
    load_view('partials/no_data');
  } else {
    $counter = 1;
    foreach ($tbl_c2->result() as $tl_c2):
      echo card_regular(
        $counter,
        $tl_c2->$tabel_c2_field1,
        $tl_c2->$tabel_c2_field2,
        $tl_c2->$tabel_c2_field5,
        btn_lihat($tl_c2->$tabel_c2_field1) . ' ' .
        btn_edit($tl_c2->$tabel_c2_field1) . ' ' .
        btn_hapus('tabel_c2', $tl_c2->$tabel_c2_field1),
        'text-light bg-dark',
        'col-md-3',
        $tabel_c2,
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
        <th><?= $tabel_c2_field1_alias ?></th>
        <th><?= $tabel_c2_field2_alias ?></th>
        <th><?= $tabel_c2_field3_alias ?></th>
        <th><?= $tabel_c2_field5_alias ?></th>
        <th><?= $tabel_c2_field6_alias ?></th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_c2->result() as $tl_c2): ?>
        <tr>
          <td></td>
          <td><?= $tl_c2->$tabel_c2_field1; ?></td>
          <td><?= $tl_c2->$tabel_c2_field2 ?></td>
          <td><?= $tl_c2->$tabel_c2_field3 ?></td>
          <td><?= $tl_c2->$tabel_c2_field5 ?></td>
          <td><?= $tl_c2->$tabel_c2_field6 ?></td>
          <td>
            <?= btn_lihat($tl_c2->$tabel_c2_field1) ?>
            <?= btn_edit($tl_c2->$tabel_c2_field1) ?>

            <!-- Sebelumnya saya sudah membahas ini di v_admin_spp
          Saya akan mempending fitur ini dengan alasan yang sama dalam waktu yang belum ditentukan -->
            <!-- <a class="btn btn-light text-danger" onclick="return confirm('Hapus user?')" href="< site_url($tabel_c2 . '/hapus/' . $tl_c2->$tabel_c2_field1) ?>">
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
      <?= modal_header('Add ' . $tabel_c2_alias, '') ?>

      <form action="<?= site_url($tabel_c2 . '/tambah') ?>" method="post">
        <div class="modal-body">
          <?= input_add('text', 'tabel_c2_field2', 'required') ?>
          <?= input_add('email', 'tabel_c2_field3', 'required autocomplete="username"') ?>
          <?= add_new_password('tabel_c2_field4', 'required autocomplete="new-password"') ?>
          <?= password_req() ?>
          <?= add_confirm('password', 'tabel_c2_field4', 'required autocomplete="new-password"') ?>
          <?= input_add('text', 'tabel_c2_field5', 'required') ?>

          <div class="form-group">
            <!-- hanya admin yang bisa menentukan level user -->
            <select class="form-control float" required name="<?= $tabel_c2_field6_input ?>" id="<?= $tabel_c2_field6_input ?>">
              <option value="" selected hidden>Select <?= $tabel_c2_field6_alias ?></option>
              <option value="<?= $tabel_c2_field6_value5 ?>"><?= $tabel_c2_field6_value5_alias ?></option>
              <option value="<?= $tabel_c2_field6_value4 ?>"><?= $tabel_c2_field6_value4_alias ?></option>
              <option value="<?= $tabel_c2_field6_value2 ?>"><?= $tabel_c2_field6_value2_alias ?></option>
              <option value="<?= $tabel_c2_field6_value3 ?>"><?= $tabel_c2_field6_value3_alias ?></option>
            </select>
            <label class="form-label" for="<?= $tabel_c2_field6_input ?>"><?= $tabel_c2_field6_alias ?></label>
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
<?php foreach ($tbl_c2->result() as $tl_c2): ?>
  <div id="ubah<?= $tl_c2->$tabel_c2_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header_id('Make changes to ' . $tabel_c2_alias, $tl_c2->$tabel_c2_field1) ?>

        <!-- administrator tidak dapat mengubah password akun lain -->
        <form action="<?= site_url($tabel_c2 . '/update') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">
            <?= input_hidden('tabel_c2_field1', $tl_c2->$tabel_c2_field1, 'required') ?>
            <?= input_edit($tl_c2->$tabel_c2_field1, 'text', 'tabel_c2_field2', $tl_c2->$tabel_c2_field2, 'required') ?>
            <?= input_edit($tl_c2->$tabel_c2_field1, 'text', 'tabel_c2_field3', $tl_c2->$tabel_c2_field3, 'required') ?>
            <?= input_edit($tl_c2->$tabel_c2_field1, 'text', 'tabel_c2_field5', $tl_c2->$tabel_c2_field5, 'required') ?>

            <div class="form-group">
              <select class="form-control float" required name="<?= $tabel_c2_field6_input ?>" id="<?= $tabel_c2_field6_input . $tl_c2->$tabel_c2_field1 ?>">
                <option selected hidden><?= $tl_c2->$tabel_c2_field6; ?></option>
                <option value="<?= $tabel_c2_field6_value5 ?>"><?= $tabel_c2_field6_value5_alias ?></option>
                <option value="<?= $tabel_c2_field6_value4 ?>"><?= $tabel_c2_field6_value4_alias ?></option>
                <option value="<?= $tabel_c2_field6_value2 ?>"><?= $tabel_c2_field6_value2_alias ?></option>
                <option value="<?= $tabel_c2_field6_value3 ?>"><?= $tabel_c2_field6_value3_alias ?></option>
              </select>
              <label class="form-label" for="<?= $tabel_c2_field6_input . $tl_c2->$tabel_c2_field1 ?>"><?= $tabel_c2_field6_alias ?></label>
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



  <div id="lihat<?= $tl_c2->$tabel_c2_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header_id($tabel_c2_alias, $tl_c2->$tabel_c2_field1) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <?= table_data(
              row_data('tabel_c2_field2', $tl_c2->$tabel_c2_field2) .
              row_data('tabel_c2_field3', $tl_c2->$tabel_c2_field3) .
              row_data('tabel_c2_field5', $tl_c2->$tabel_c2_field5) .
              row_data('tabel_c2_field6', $tl_c2->$tabel_c2_field6),
              'table-light',
            ) ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= get_flashdata('pesan_lihat') ?></p>

          <div class="modal-footer">
            <?= btn_history('tabel_c2', $tl_c2->$tabel_c2_field1) ?>
            <?= btn_tutup() ?>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach; ?>

<?= password_js() ?>