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




<div class="row">
  <div class="col-md-10">
    <?= btn_field('filter', '<i class="fas fa-filter"></i> Filter') ?>
  </div>

  <div class="col-md-2 d-flex justify-content-end">
    <?= view_switcher() ?>
  </div>
</div>

<div id="card-view" class="row data-view active">
  <?php if (empty($tbl_f2->result())) { ?>
    <div class="col-md-12">
      <div class="text-center">
        <?php foreach ($no_data->result() as $nd): ?>
          <img src="img/<?= $tabel_b1 ?>/<?= $nd->$tabel_b1_field4 ?>" width="200" alt="Image">
        <?php endforeach ?>
        <h3>NO DATA</h3>
      </div>
    </div>

  <?php } else {
    foreach ($tbl_f2->result() as $tl_f2):
      switch ($tl_f2->$tabel_f2_field12) {
        case $tabel_f2_field12_value1:
          $button = btn_book($tl_f2->$tabel_f2_field1);
          break;
        case $tabel_f2_field12_value3:
        case $tabel_f2_field12_value4:
          $button = btn_edit($tl_f2->$tabel_f2_field1);
          break;
        case $tabel_f2_field12_value5:
          $button = btn_hapus('tabel_f2', $tl_f2->$tabel_f2_field1);
          break;
        default:
          $button = "";
          break;
      }

      echo card_regular(
        $tl_f2->$tabel_f2_field1,
        $tl_f2->$tabel_f2_field1 . ' | ' . $tl_f2->$tabel_e4_field2,
        $tl_f2->$tabel_f2_field12,
        $button . ' ' .
        btn_print('tabel_f2', $tl_f2->$tabel_f2_field1),
        'text-dark bg-light',
        'col-md-3',
        $tabel_f2,
      );
    endforeach;
  } ?>
</div>


<div id="table-view" class="table-responsive data-view" style="display: none;">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= lang('no') ?></th>
        <th><?= lang('tabel_f2_field1_alias') ?></th>
        <th><?= lang('tabel_f2_field6_alias') ?></th>
        <th><?= lang('tabel_f2_field10_alias') ?></th>
        <th><?= lang('tabel_f2_field11_alias') ?></th>
        <th><?= lang('tabel_f2_field12_alias') ?></th>
        <th><?= lang('action') ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_f2->result() as $tl_f2): ?>
        <tr>
          <td></td>
          <td><?= $tl_f2->$tabel_f2_field1 ?></td>
          <td><?= $tl_f2->$tabel_f2_field6 ?></td>
          <td><?= $tl_f2->$tabel_f2_field10 ?></td>
          <td><?= $tl_f2->$tabel_f2_field11 ?></td>
          <td><?= $tl_f2->$tabel_f2_field12 ?></td>

          <td>
            <?php switch ($tl_f2->$tabel_f2_field12) {
              case $tabel_f2_field12_value1: ?>
                <?= btn_book($tl_f2->$tabel_f2_field1) ?>
                <?php break;
              case $tabel_f2_field12_value3:
              case $tabel_f2_field12_value4: ?>
                <?= btn_edit($tl_f2->$tabel_f2_field1) ?>
                <?php break;
              case $tabel_f2_field12_value5: ?>
                <?= btn_hapus('tabel_f2', $tl_f2->$tabel_f2_field1) ?>
                <?php break;
            } ?>
            <!-- tombol print, hasil print akan muncul di tab baru 
        https://stackoverflow.com/questions/32778670/codeigniter-load-view-in-new-tab#:~:text=Say%20you%20want%20it%20to,_blank%22%20in%20the%20form%20tag.&text=That%27s%20all.
        terimakasih pada link di atas
        -->
            <?= btn_print('tabel_f2', $tl_f2->$tabel_f2_field1) ?>
          </td>

        </tr>
      <?php endforeach ?>
    </tbody>

  </table>
</div>

<!-- modal filter -->
<div id="filter" class="modal fade filter">
  <div class="modal-dialog">
    <div class="modal-content">
      <?= modal_header('Filter', '') ?>

      <form action="<?= site_url($language . '/' . $tabel_f2 . '/admin') ?>" method="get">
        <div class="modal-body">
          <!-- method get supaya nilai dari filter bisa tampil nanti -->
          <span><?= $tabel_f2_field10_alias ?></span>
          <div class="row mb-3">
            <div class="col-md-6">
              <?= filter_min_max('date', 'Dari', 'tabel_f2_field10_filter1', 'oninput="myFunction3()"', '', '') ?>
            </div>
            <div class="col-md-6">
              <?= filter_min_max('date', 'Ke', 'tabel_f2_field10_filter2', 'required', '', '') ?>
            </div>
          </div>
          <span><?= $tabel_f2_field11_alias ?></span>
          <div class="row mb-3">
            <div class="col-md-6">
              <?= filter_min_max('date', 'Dari', 'tabel_f2_field11_filter1', 'oninput="myFunction2()"', '', '') ?>
            </div>
            <div class="col-md-6">
              <?= filter_min_max('date', 'Ke', 'tabel_f2_field11_filter2', 'required', '', '') ?>
            </div>
          </div>
        </div>

        <!-- pesan untuk pengguna yang sedang merubah password -->
        <p class="small text-center text-danger"><?= get_flashdata('pesan_filter') ?></p>

        <div class="modal-footer">
          <?= btn_cari() ?>
          <?= btn_redo('tabel_f2', '/admin') ?>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- modal ubah -->
<?php foreach ($tbl_f2->result() as $tl_f2): ?>
  <?php switch ($tl_f2->$tabel_f2_field12) {
    case $tabel_f2_field12_value1: ?>
      <div id="book<?= $tl_f2->$tabel_f2_field1 ?>" class="modal fade book">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <?= modal_header_id(lang('tabel_f2_alias'), $tl_f2->$tabel_f2_field1) ?>

            <!-- form untuk mengubah nilai status sebuah pesanan -->
            <form action="<?= site_url($language . '/' . $tabel_f2 . '/book') ?>" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <?= table_data(
                      row_data('tabel_f2_field1', $tl_f2->$tabel_f2_field1) .
                      row_data('tabel_f2_field3', $tl_f2->$tabel_f2_field3) .
                      row_data('tabel_f2_field6', $tl_f2->$tabel_f2_field6),
                      'table-light'
                    ) ?>
                  </div>
                  <div class="col-md-6">
                    <?= table_data(
                      row_data('tabel_e4_field2', $tl_f2->$tabel_e4_field2) .
                      row_data('tabel_f2_field10', $tl_f2->$tabel_f2_field10) .
                      row_data('tabel_f2_field11', $tl_f2->$tabel_f2_field11),
                      'table-light'
                    ) ?>
                  </div>
                </div>

                <?= input_hidden('tabel_f2_field1', $tl_f2->$tabel_f2_field1, 'required') ?>
                <?= input_hidden('tabel_f2_field7', $tl_f2->$tabel_f2_field7, 'required') ?>

                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?= lang('select') ?>       <?= $tl_f2->$tabel_e4_field2 . ' ' . $tabel_e3_field1_alias ?></label>

                      <div class="row">
                        <?php foreach ($tbl_e3->result() as $tl_e3):
                          if ($tl_f2->$tabel_f2_field7 == $tl_e3->$tabel_f2_field7) {
                            if ($tl_e3->$tabel_f2_field7 == $tl_f2->$tabel_f2_field7) {
                              if ($tl_e3->$tabel_e3_field4 == $tabel_e3_field4_value2) { ?>

                                <div class="col-md-2 mb-4">
                                  <?= btn_checkbox(
                                    $tl_f2->$tabel_f2_field1,
                                    '<i class="fas fa-bed"></i><br>' .
                                    $tl_e3->$tabel_e3_field1,
                                    'tabel_f2_field13',
                                    $tl_e3->$tabel_e3_field1,
                                    'required'
                                  ) ?>

                                </div>


                              <?php }
                            }
                          }
                        endforeach; ?>

                      </div>


                      <p>*Jika tidak ada, berarti semua <?= $tabel_e3_alias ?> full</p>
                      <?= input_hidden('tabel_f2_field12', $tabel_f2_field12_value2, '') ?>
                    </div>
                  </div>
                </div>

              </div>

              <!-- memunculkan notifikasi modal -->
              <p class="small text-center text-danger"><?= get_flashdata('pesan_book') ?></p>

              <div class="modal-footer">

                <p>Pesan <?= $tabel_e3_alias ?>?</p>
                <button class="btn btn-success" type="submit">Ya</button>

              </div>
            </form>

          </div>
        </div>

      </div>
      <?php break;
    case $tabel_f2_field12_value3:
    case $tabel_f2_field12_value4: ?>
      <div id="ubah<?= $tl_f2->$tabel_f2_field1 ?>" class="modal fade ubah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <?= modal_header_id(lang('tabel_f2_alias'), $tl_f2->$tabel_f2_field1) ?>

            <!-- form untuk mengubah nilai status sebuah pesanan -->
            <form action="<?= site_url($language . '/' . $tabel_f2 . '/update_status') ?>" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <?= table_data(
                      row_data('tabel_f2_field3', $tl_f2->$tabel_f2_field3) .
                      row_data('tabel_f2_field4', $tl_f2->$tabel_f2_field4) .
                      row_data('tabel_f2_field5', $tl_f2->$tabel_f2_field5) .
                      row_data('tabel_f2_field6', $tl_f2->$tabel_f2_field6),
                      'table-light'
                    ) ?>
                  </div>
                  <div class="col-md-6">
                    <?= table_data(
                      row_data('tabel_e4_field2', $tl_f2->$tabel_e4_field2) .
                      row_data('tabel_f2_field10', $tl_f2->$tabel_f2_field10) .
                      row_data('tabel_f2_field11', $tl_f2->$tabel_f2_field11),
                      'table-light'
                    ) ?>
                  </div>
                </div>

                <?= input_hidden('tabel_f2_field1', $tl_f2->$tabel_f2_field1, 'required') ?>
                <?= input_hidden('tabel_f2_field7', $tl_f2->$tabel_f2_field7, 'required') ?>
                <!-- input status berdasarkan nilai status -->
                <!-- seharusnya jika status masih belum bayar, resepsionis tidak bisa melakukan apa-apa terhadap pesanan -->
                <?php switch ($tl_f2->$tabel_f2_field12) {
                  case $tabel_f2_field12_value3: ?>
                    <?= input_hidden('tabel_f2_field12', $tabel_f2_field12_value4, 'required') ?>
                    <?php break;
                  case $tabel_f2_field12_value4: ?>
                    <?= input_hidden('tabel_f2_field12', $tabel_f2_field12_value5, 'required') ?>
                    <?php break;
                  default:
                    break;
                } ?>
              </div>

              <!-- memunculkan notifikasi modal -->
              <p class="small text-center text-danger"><?= get_flashdata('pesan_ubah') ?></p>

              <div class="modal-footer">
                <!-- pesan yg muncul berdasarkan nilai status -->
                <?php switch ($tl_f2->$tabel_f2_field12) {
                  case $tabel_f2_field12_value3: ?>
                    <p>Ubah Status Menjadi <?= $tabel_f2_field12_value4 ?>?</p>
                    <button class="btn btn-success" type="submit">Ya</button>
                    <?php break;
                  case $tabel_f2_field12_value4: ?>
                    <p>Ubah Status Menjadi <?= $tabel_f2_field12_value5 ?>?</p>
                    <button class="btn btn-success" type="submit">Ya</button>
                    <?php break;
                  default:
                    break;
                } ?>
              </div>

            </form>

          </div>
        </div>
      </div>
      <?php break;
    default:
      break;
  } ?>

  <?= checkbox_js($tl_f2->$tabel_f2_field1) ?>
<?php endforeach ?>

<?= adjust_col_js() ?>

<?= adjust_date3($tabel_f2_field10_filter1, $tabel_f2_field10_filter2, $tabel_f2_field11_filter1, $tabel_f2_field11_filter2) ?>
<?= adjust_date2($tabel_f2_field11_filter1, $tabel_f2_field11_filter2) ?>

<?php foreach ($tbl_f2->result() as $tl_f2): ?>


<?php endforeach ?>