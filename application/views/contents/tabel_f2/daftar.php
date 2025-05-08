<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_f2) ?><?= $phase ?></h1>
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
    <?= btn_field('filter', '<i class="fas fa-filter"></i> Filter') ?>
  </div>

  <div class="col-md-2 d-flex justify-content-end">
    <?= view_switcher() ?>
  </div>
</div>

<div id="card-view" class="data-view active">
  <div class="row">
    <?php if (empty($tbl_f2->result())) {
      load_view('partials/no_data');
    } else {
      $counter = 1;
      foreach ($tbl_f2->result() as $tl_f2):
        switch ($tl_f2->$tabel_f2_field12) {
          case $tabel_f2_field5_value2:
            $button = btn_field($tabel_f3_field6 . $tl_f2->$tabel_f2_field1, '<i class="fas fa-shopping-cart"></i>');
            $theme = 'text-white bg-primary';
            break;
          case $tabel_f2_field5_value3:
            $button = btn_print('tabel_f2', $tl_f2->$tabel_f2_field1);
            $theme = 'text-white bg-info';
            break;
          case $tabel_f2_field5_value4:
            $button = btn_print('tabel_f2', $tl_f2->$tabel_f2_field1);
            $theme = 'text-white bg-success';
            break;
          default:
            $button = '';
            $theme = 'text-white bg-secondary';
            break;
        }

        echo card_regular(
          $counter,
          $tl_f2->$tabel_f2_field1,
          $tl_f2->$tabel_f2_field1 . ' | ' . $tl_f2->$tabel_e4_field2,
          $tl_f2->$tabel_f2_field12,
          btn_lihat($tl_f2->$tabel_f2_field1) . ' ' .
            $button,
          $theme,
          'col-md-3',
          $tabel_f2,
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
        <th><?= $tabel_f2_field6_alias ?></th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_f2->result() as $tl_f2): ?>
        <tr>
          <td></td>
          <td><?= $tl_f2->$tabel_f2_field6 ?></td>
          <td>
            <?= btn_lihat($tl_f2->$tabel_f2_field1) ?>
            <?php switch ($tl_f2->$tabel_f2_field12) {
              case $tabel_f2_field5_value2: ?>
                <?= btn_field($tabel_f3_field6 . $tl_f2->$tabel_f2_field1, '<i class="fas fa-shopping-cart"></i>') ?>

              <?php break;
              case $tabel_f2_field5_value3:
              case $tabel_f2_field5_value4: ?>
                <?= btn_print('tabel_f2', $tl_f2->$tabel_f2_field1) ?>
            <?php break;
            } ?>
          </td>

        </tr>
      <?php endforeach ?>
    </tbody>

  </table>
</div>

<?php foreach ($tbl_f2->result() as $tl_f2): ?>
  <div id="lihat<?= $tl_f2->$tabel_f2_field1 ?>" class="modal fade lihat">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <?= modal_header_id($tabel_f2_alias, $tl_f2->$tabel_f2_field1) ?>

        <div class="modal-body">

          <div class="row">
            <div class="col-md-6">
              <?= table_data(
                row_data('tabel_f2_field1', $tl_f2->$tabel_f2_field1) .
                  row_data('tabel_f2_field3', $tl_f2->$tabel_f2_field3) .
                  row_data('tabel_f2_field4', $tl_f2->$tabel_f2_field4) .
                  row_data('tabel_f2_field5', $tl_f2->$tabel_f2_field5),
                'table-secondary'
              ) ?>
            </div>
            <div class="col-md-6">
              <?= table_data(
                row_data('tabel_f2_field6', $tl_f2->$tabel_f2_field6) .
                  row_data('tabel_e4_field2', $tl_f2->$tabel_e4_field2),
                'table-secondary'
              ) ?>
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

  <?php switch ($tl_f2->$tabel_f2_field12) {
    case $tabel_f2_field5_value2: ?>
      <div id="<?= $tabel_f3_field6 . $tl_f2->$tabel_f2_field1 ?>" class="modal fade <?= $tabel_f3_field6 ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <?= modal_header_id($tabel_f3_alias, $tl_f2->$tabel_f2_field1) ?>

            <form action="<?= site_url($tabel_f3 . '/tambah') ?>" method="post"
              enctype="multipart/form-data">

              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <?= table_data(
                      row_data('tabel_f2_field1', $tl_f2->$tabel_f2_field1) .
                        row_data('tabel_f2_field3', $tl_f2->$tabel_f2_field3) .
                        row_data('tabel_f2_field4', $tl_f2->$tabel_f2_field4) .
                        row_data('tabel_f2_field5', $tl_f2->$tabel_f2_field5),
                      'table-light'
                    ) ?>
                  </div>
                  <div class="col-md-6">
                    <?= table_data(
                      row_data('tabel_f2_field6', $tl_f2->$tabel_f2_field6) .
                        row_data('tabel_e4_field2', $tl_f2->$tabel_e4_field2),
                      'table-light'
                    ) ?>
                  </div>
                </div>

                <?= input_hidden('tabel_f2_field4', $tl_f2->$tabel_f2_field4, 'required') ?>


                <!-- Input metode pembayaran -->
                <div class="row">
                  <div class="col-md-6">
                    <?= table_data(
                      row_data('tabel_f2_field9', 'Rp ' . number_format($tl_f2->$tabel_f2_field9, '2', ',', '.')),
                      'table-light'
                    ) ?>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <select class="form-control float" required name="<?= $tabel_f3_field5_input ?>">
                        <option selected hidden value="">Select <?= $tabel_f3_field5_alias ?>...</option>
                        <option value="<?= $tabel_f3_field5_value1 ?>"><?= $tabel_f3_field5_value1_alias ?></option>
                        <option value="<?= $tabel_f3_field5_value2 ?>"><?= $tabel_f3_field5_value2_alias ?></option>
                      </select>
                      <label class="form-label"><?= $tabel_f3_field5_alias ?></label>
                    </div>

                    <?= input_hidden('tabel_f2_field1', $tl_f2->$tabel_f2_field1, 'required') ?>
                    <?= input_hidden('tabel_f2_field12', $tabel_f2_field5_value3, 'required') ?>
                    <?= edit_min_max('number', 'tabel_f3_field6', $tl_f2->$tabel_f2_field9, 'required readonly', '0', '') ?>
                  </div>
                </div>


              </div>

              <!-- pesan untuk pengguna yang sedang merubah password -->
              <p class="small text-center text-danger"><?= get_flashdata('pesan_' . $tabel_f3_field6) ?></p>

              <div class="modal-footer">
                <button class="btn btn-success" type="submit">Bayar</button>
              </div>
            </form>

          </div>
        </div>
      </div>

    <?php break;
    case $tabel_f2_field5_value3:
    case $tabel_f2_field5_value4: ?>

  <?php break;
  } ?>
<?php endforeach ?>

<?= adjust_col_js('col-md-3', 'col-md-4') ?>
<?= load_card_pagination_js($tbl_f2->num_rows(), 28) ?>
