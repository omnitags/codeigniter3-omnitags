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
          case $tabel_f2_field12_value2:
            $button = btn_field($tabel_f3_field6 . $tl_f2->$tabel_f2_field1, '<i class="fas fa-shopping-cart"></i>');
            $theme = 'text-white bg-primary';
            break;
          case $tabel_f2_field12_value3:
            $button = btn_print('tabel_f2', $tl_f2->$tabel_f2_field1);
            $theme = 'text-white bg-info';
            break;
          case $tabel_f2_field12_value4:
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
        <th><?= $tabel_f2_field10_alias ?></th>
        <th><?= $tabel_f2_field11_alias ?></th>
        <th><?= $tabel_f2_field12_alias ?></th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_f2->result() as $tl_f2): ?>
        <tr>
          <td></td>
          <td><?= $tl_f2->$tabel_f2_field6 ?></td>
          <td><?= $tl_f2->$tabel_f2_field10 ?></td>
          <td><?= $tl_f2->$tabel_f2_field11 ?></td>
          <td><?= $tl_f2->$tabel_f2_field12 ?></td>
          <td>
            <?= btn_lihat($tl_f2->$tabel_f2_field1) ?>
            <?php switch ($tl_f2->$tabel_f2_field12) {
              case $tabel_f2_field12_value2: ?>
                <?= btn_field($tabel_f3_field6 . $tl_f2->$tabel_f2_field1, '<i class="fas fa-shopping-cart"></i>') ?>

                <?php break;
              case $tabel_f2_field12_value3:
              case $tabel_f2_field12_value4: ?>
                <?= btn_print('tabel_f2', $tl_f2->$tabel_f2_field1) ?>
                <?php break;
            } ?>
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

      <form action="<?= site_url($tabel_f2 . '/daftar') ?>" method="get">
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
          <?= btn_redo('tabel_f2', '/daftar') ?>
        </div>
      </form>

    </div>
  </div>
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

<?php endforeach ?>

<?= adjust_col_js('col-md-3', 'col-md-4') ?>
<?= load_card_pagination_js($tbl_f2->num_rows(), 28) ?>

<?= adjust_date3($tabel_f2_field10_filter1, $tabel_f2_field10_filter2, $tabel_f2_field11_filter1, $tabel_f2_field11_filter2) ?>
<?= adjust_date2($tabel_f2_field11_filter1, $tabel_f2_field11_filter2) ?>