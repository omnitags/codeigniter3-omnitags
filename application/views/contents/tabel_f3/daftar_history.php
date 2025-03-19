<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_f3) ?><?= $phase ?></h1>
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
    <?php if (empty($tbl_f3->result())) {
    load_view('partials/no_data');
  } else {
    $counter = 1;
    foreach ($tbl_f3->result() as $tl_f3):

      echo card_regular(
        $counter,
        $tl_f3->$tabel_f3_field1,
        $tl_f3->$tabel_f3_field1 . ' | ' . $tabel_f2_alias . ' ' . $tl_f3->$tabel_f3_field4,
        card_content('40%', 'tabel_f3_field5', $tl_f3->$tabel_f3_field5) .
        card_content('40%', 'tabel_f3_field6', 'Rp ' . number_format($tl_f3->$tabel_f3_field6, '2', ',', '.')) .
        card_content('40%', 'tabel_f3_field7', $tl_f3->$tabel_f3_field7),
        btn_lihat($tl_f3->$tabel_f3_field1) . ' ' .
        btn_print('tabel_f3', $tl_f3->$tabel_f3_field1),
        'text-light bg-secondary',
        'col-md-4',
        $tabel_f3,
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
        <th><?= $tabel_f3_field1_alias ?></th>
        <th><?= $tabel_f1_field1_alias ?></th>
        <th><?= $tabel_f3_field5_alias ?></th>
        <th><?= $tabel_f3_field6_alias ?></th>
        <th><?= $tabel_f3_field7_alias ?></th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_f3->result() as $tl_f3): ?>
        <tr>
          <td></td>
          <td><?= $tl_f3->$tabel_f3_field1 ?></td>
          <td><?= $tl_f3->$tabel_f1_field1 ?></td>
          <td><?= $tl_f3->$tabel_f3_field5 ?></td>
          <td><?= $tl_f3->$tabel_f3_field6 ?></td>
          <td><?= $tl_f3->$tabel_f3_field7 ?></td>
          <td>
            <?= btn_lihat($tl_f3->$tabel_f3_field1) ?>
            <?= btn_print('tabel_f3', $tl_f3->$tabel_f3_field1) ?>
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

      <form action="<?= site_url($tabel_f3 . '/daftar_history') ?>" method="get">
        <div class="modal-body">
          <!-- method get supaya nilai dari filter bisa tampil nanti -->
          <span><?= $tabel_f3_field7_alias ?></span>
          <div class="row mb-3">
            <div class="col-md-6">
              <?= filter_min_max('date', 'Dari', 'tabel_f3_field7_filter1', 'oninput="myFunction1()"', '', '') ?>
            </div>
            <div class="col-md-6">
              <?= filter_min_max('date', 'Ke', 'tabel_f3_field7_filter2', 'required', '', '') ?>
            </div>
          </div>

        </div>

        <!-- pesan untuk pengguna yang sedang merubah password -->
        <p class="small text-center text-danger"><?= get_flashdata('pesan_filter') ?></p>

        <div class="modal-footer">
          <?= btn_cari() ?>
          <?= btn_redo('tabel_f3', '/daftar_history') ?>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- modal lihat -->
<!-- Tabel transaksi dan tabel history literally sudah bergabung
Jadi tidak perlu menambahkan foreach hitory lagi -->
<?php foreach ($tbl_f3->result() as $tl_f3): ?>
  <div id="lihat<?= $tl_f3->$tabel_f3_field1 ?>" class="modal fade lihat">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <?= modal_header_id($tabel_f3_alias, $tl_f3->$tabel_f3_field1) ?>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <?= table_data(
                row_data('tabel_f3_field1', $tl_f3->$tabel_f3_field1) .
                row_data('tabel_f1_field1', $tl_f3->$tabel_f1_field1) .
                row_data('tabel_f3_field5', $tl_f3->$tabel_f3_field5) .
                row_data('tabel_f3_field6', $tl_f3->$tabel_f3_field6),
                'table-light'
              ) ?>
            </div>
            <div class="col-md-6">
              <?= table_data(
                row_data('tabel_f2_field6', $tl_f3->$tabel_f2_field6) .
                row_data('tabel_e4_field2', $tl_f3->$tabel_e4_field2) .
                row_data('tabel_f2_field10', $tl_f3->$tabel_f2_field10) .
                row_data('tabel_f2_field11', $tl_f3->$tabel_f2_field11),
                'table-light'
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