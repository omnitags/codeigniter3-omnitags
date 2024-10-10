<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_f2) ?><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor->result() as $dk): ?>
      <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200" alt="Image">
    <?php endforeach ?>
  </div>
</div>
<hr>


<table class="mb-4">

  <!-- method get supaya nilai dari filter bisa tampil nanti -->
  <form action="<?= site_url($tabel_f2 . '/admin') ?>" method="get">
    <tr>

      <td class="pr-2">
        <?= input_edit($tabel_f2_field3_value, 'text', 'tabel_f2_field3', $tabel_f2_field3_value, 'required') ?>
      </td>

      <td>
        <?= btn_cari() ?>
        <?= btn_redo('tabel_f2', '/admin') ?>
      </td>

    </tr>
  </form>
</table>

<?php foreach ($tbl_c1->result() as $tl_c1):
  foreach ($tbl_e4->result() as $tl_e4):
    if ($tl_c1->$tabel_c1_field1 == '') { ?>     <?php } else { ?>
      <h1>Biodata <?= $tabel_c1_alias ?><?= $phase ?></h1>
      <hr>

      <div class="row">
        <div class="col-md-6">
          <?= table_data(
            row_data('tabel_c1_field1', $tl_c1->$tabel_c1_field1) .
            row_data('tabel_c1_field2', $tl_c1->$tabel_c1_field2) .
            row_data('tabel_c1_field3', $tl_c1->$tabel_c1_field3) .
            row_data('tabel_c1_field5', $tl_c1->$tabel_c1_field5),
            'bg-light'
          ) ?>
        </div>
        <div class="col-md-6"></div>
      </div>


    <?php } ?>


    <br><br>
    <h1>Pembayaran SPP<?= $phase ?></h1>
    <hr>

    <div class="row">
      <div class="col-md-10">
        <?= btn_tambah() ?>
      </div>

      <div class="col-md-2 d-flex justify-content-end">
        <?= view_switcher() ?>
      </div>
    </div>

    <div id="card-view" class="row data-view active">
      <?php if (empty($tbl_e4->result())) {
        load_view('partials/no_data');
      } else {
        $counter = 1;
        foreach ($tbl_f2->result() as $tl_f2):
          echo card_regular(
            $counter,
            $tl_f2->$tabel_f2_field1,
            $tl_f2->$tabel_f2_field1 . ' | ' . $tl_f2->$tabel_f2_field3,
            $tl_f2->$tabel_f2_field5 . ' ' . $tl_f2->$tabel_f2_field6 . '<br> Rp' . number_format($tl_f2->$tabel_f2_field8, '2', ',', '.'),
            btn_lihat($tl_f2->$tabel_f2_field1) . ' ' .
            btn_print('tabel_f2', $tl_f2->$tabel_f2_field1),
            'text-dark bg-light',
            'col-md-3',
            $tabel_f2,
          );
          $counter++;
        endforeach;
      }
      ?>
    </div>



    <div id="table-view" class="table-responsive data-view" style="display: none;">
      <table class="table table-light" id="data">
        <thead class="thead-light">
          <tr>
            <th>No</th>
            <th><?= $tabel_f2_field1_alias ?></th>
            <th><?= $tabel_f2_field2_alias ?></th>
            <th><?= $tabel_f2_field3_alias ?></th>
            <th><?= $tabel_f2_field4_alias ?></th>
            <th><?= $tabel_f2_field5_alias ?></th>
            <th><?= $tabel_f2_field6_alias ?></th>
            <th><?= $tabel_f2_field7_alias ?></th>
            <th><?= $tabel_f2_field8_alias ?></th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($tbl_f2->result() as $tl_f2): ?>
            <tr>
              <td></td>
              <td><?= $tl_f2->$tabel_f2_field1 ?></td>
              <td><?= $tl_f2->$tabel_f2_field2 ?></td>
              <td><?= $tl_f2->$tabel_f2_field3 ?></td>
              <td><?= $tl_f2->$tabel_f2_field4 ?></td>
              <td><?= $tl_f2->$tabel_f2_field5 ?></td>
              <td><?= $tl_f2->$tabel_f2_field6 ?></td>
              <td><?= $tl_f2->$tabel_f2_field7 ?></td>
              <td>Rp <?= number_format($tl_f2->$tabel_f2_field8, '2', ',', '.') ?></td>
              <td>
                <?= btn_print('tabel_f2', $tl_f2->$tabel_f2_field1) ?>
              </td>

            </tr>
          <?php endforeach ?>
        </tbody>

      </table>
    </div>


    <!-- modal tambah -->
    <div id="tambah" class="modal fade tambah">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <?= modal_header('Add ' . $tabel_f2_alias, '') ?>

          <form action="<?= site_url($tabel_f2 . '/tambah') ?>" method="post"
            enctype="multipart/form-data">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <?= table_data(
                    row_data('tabel_c1_field2', $tl_c1->$tabel_c1_field2) .
                    row_data('tabel_c1_field3', $tl_c1->$tabel_c1_field3) .
                    row_data('tabel_c1_field5', $tl_c1->$tabel_c1_field5) .
                    row_data('tabel_e4_field2', $tl_e4->$tabel_e4_field2) .
                    row_data('tabel_e4_field3', $tl_e4->$tabel_e4_field3),
                    'bg-light'
                  ) ?>
                </div>
                <?= input_hidden('tabel_f2_field2', userdata($tabel_c2_field1), 'required') ?>
                <?= input_hidden('tabel_f2_field3', $tl_c1->$tabel_c1_field1, 'required') ?>
                <?= input_hidden('tabel_f2_field7', $tl_e4->$tabel_e4_field1, 'required') ?>

                <div class="col-md-6">
                  <?= edit_min_max('date', 'tabel_f2_field4', date('Y-m-d'), 'required', date('Y-m-d'), '') ?>

                  <div class="form-group">
                    <select id="<?= $tabel_f2_field5_input ?>" class="form-control float" required
                      name="<?= $tabel_f2_field5_input ?>">
                      <option value="" selected hidden>Pilih <?= $tabel_f2_field5_alias ?></option>
                      <option value="Januari">Januari</option>
                      <option value="Februari">Februari</option>
                      <option value="Maret">Maret</option>
                      <option value="April">April</option>
                      <option value="Mei">Mei</option>
                      <option value="Juni">Juni</option>
                      <option value="Juli">Juli</option>
                      <option value="Agustus">Agustus</option>
                      <option value="September">September</option>
                      <option value="Oktober">Oktober</option>
                      <option value="November">November</option>
                      <option value="Desember">Desember</option>
                    </select>
                    <label for="<?= $tabel_f2_field5_input ?>" class="form-label"><?= $tabel_f2_field5_alias ?> </label>
                  </div>

                  <?= edit_min_max('number', 'tabel_f2_field6', $tl_e4->$tabel_e4_field2, 'required', $tl_e4->$tabel_e4_field2, '') ?>
                  <?= edit_min_max('number', 'tabel_f2_field8', $tl_e4->$tabel_e4_field3, 'required readonly', $tl_e4->$tabel_e4_field2, '') ?>

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


    <?php foreach ($tbl_f2->result() as $tl_f2): ?>
      <div id="lihat<?= $tl_f2->$tabel_f2_field1; ?>" class="modal fade lihat" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <?= modal_header('Data ' . $tabel_f2_alias, $tl_f2->$tabel_f2_field1) ?>

            <!-- administrator tidak bisa melihat password user lain -->
            <form>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <?= table_data(
                      row_data('tabel_f2_field1', $tl_f2->$tabel_f2_field1) .
                      row_data('tabel_f2_field2', $tl_f2->$tabel_f2_field2) .
                      row_data('tabel_f2_field3', $tl_f2->$tabel_f2_field3) .
                      row_data('tabel_f2_field4', $tl_f2->$tabel_f2_field4),
                      'table-light'
                    ) ?>
                  </div>
                  <div class="col-md-6">
                    <?= table_data(
                      row_data('tabel_f2_field5', $tl_f2->$tabel_f2_field5) .
                      row_data('tabel_f2_field6', $tl_f2->$tabel_f2_field6) .
                      row_data('tabel_f2_field7', $tl_f2->$tabel_f2_field7) .
                      row_data('tabel_f2_field8', 'Rp' . number_format($tl_f2->$tabel_f2_field8, '2', ',', '.')),
                      'table-light'
                    )

                      ?>
                  </div>
                </div>

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


    <?php endforeach; endforeach; endforeach; ?>


<?= adjust_col_js('col-md-3', 'col-md-4') ?>

<!-- <= adjust_datf2($tabel_f2_field10_filter1, $tabel_f2_field10_filter2, $tabel_f2_field11_filter1, $tabel_f2_field11_filter2) ?> -->
<!-- <= adjust_date2($tabel_f2_field11_filter1, $tabel_f2_field11_filter2) ?> -->

<?php foreach ($tbl_f2->result() as $tl_f2): ?>


<?php endforeach ?>