<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_f1) ?><?= $phase ?></h1>
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
  <?php if (empty($tbl_f1->result())) { ?>
    <div class="col-md-12">
      <div class="text-center">
        <?php foreach ($no_data->result() as $nd): ?>
          <img src="img/<?= $tabel_b1 ?>/<?= $nd->$tabel_b1_field4 ?>" width="200" alt="Image">
        <?php endforeach ?>
        <h3>NO DATA</h3>
      </div>
    </div>

  <?php } else {
    foreach ($tbl_f1->result() as $tl_f1):
      echo card_regular(
        $tl_f1->$tabel_f1_field1,
        $tl_f1->$tabel_f1_field1 . ' | ' . $tl_f1->$tabel_e4_field2,
        $tl_f1->$tabel_f1_field14,
        btn_lihat($tl_f1->$tabel_f1_field1) . ' ' .
        btn_hapus('tabel_f1', $tl_f1->$tabel_f1_field1) . ' ' .
        btn_print('tabel_f1', $tl_f1->$tabel_f1_field1),
        'text-white bg-secondary',
        'col-md-3',
        $tabel_f1,
      );
    endforeach;
  } ?>
</div>


<div id="table-view" class="table-responsive data-view" style="display: none;">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= lang('no') ?></th>
        <th><?= lang('tabel_f1_field2_alias') ?></th>
        <th><?= lang('tabel_f1_field3_alias') ?></th>
        <th><?= lang('tabel_f1_field4_alias') ?></th>
        <th><?= lang('tabel_f1_field5_alias') ?></th>
        <th><?= lang('tabel_f1_field6_alias') ?></th>
        <th><?= lang('tabel_f1_field7_alias') ?></th>
        <th><?= lang('tabel_f1_field8_alias') ?></th>
        <th><?= lang('tabel_f1_field9_alias') ?></th>
        <th><?= lang('action') ?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tbl_f1->result() as $tl_f1): ?>
        <tr>
          <td></td>
          <td><?= $tl_f1->$tabel_f1_field2 ?></td>
          <td><?= $tl_f1->$tabel_f1_field3 ?></td>
          <td><?= $tl_f1->$tabel_f1_field4 ?></td>
          <td><?= $tl_f1->$tabel_f1_field5 ?></td>
          <td><?= $tl_f1->$tabel_f1_field6 ?></td>
          <td><?= $tl_f1->$tabel_f1_field7 ?></td>
          <td><?= $tl_f1->$tabel_f1_field8 ?></td>
          <td><?= $tl_f1->$tabel_f1_field9 ?></td>
          <td>
            <?= btn_lihat($tl_f1->$tabel_f1_field1) ?>
            <?= btn_hapus('tabel_f1', $tl_f1->$tabel_f1_field1) ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>



  </table>
</div>

<!-- modal filter -->
<div id="filter" class="modal fade filter">
  <div class="modal-dialog">
    <div class="modal-content">
      <?= modal_header('Filter', '') ?>

      <form action="<?= site_url($language . '/' . $tabel_f1 . '/admin') ?>" method="get">
        <div class="modal-body">
          <!-- method get supaya nilai dari filter bisa tampil nanti -->
          <span><?= $tabel_f1_field11_alias ?></span>
          <div class="row mb-3">
            <div class="col-md-6">
              <?= filter_min_max('date', 'Dari', 'tabel_f1_field11_filter1', 'oninput="myFunction3()"', '', '') ?>
            </div>
            <div class="col-md-6">
              <?= filter_min_max('date', 'Ke', 'tabel_f1_field11_filter2', 'required', '', '') ?>
            </div>
          </div>
          <span><?= $tabel_f1_field12_alias ?></span>
          <div class="row mb-3">
            <div class="col-md-6">
              <?= filter_min_max('date', 'Dari', 'tabel_f1_field12_filter1', 'oninput="myFunction2()"', '', '') ?>
            </div>
            <div class="col-md-6">
              <?= filter_min_max('date', 'Ke', 'tabel_f1_field12_filter2', 'required', '', '') ?>
            </div>
          </div>
        </div>

        <!-- pesan untuk pengguna yang sedang merubah password -->
        <p class="small text-center text-danger"><?= get_flashdata('pesan_filter') ?></p>

        <div class="modal-footer">
          <?= btn_cari() ?>
          <?= btn_redo('tabel_f1', '/daftar') ?>
        </div>
      </form>

    </div>
  </div>
</div>


<!-- modal lihat -->
<?php foreach ($tbl_f1->result() as $tl_f1): ?>
  <div id="lihat<?= $tl_f1->$tabel_f1_field1 ?>" class="modal fade lihat">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <?= modal_header_id(lang('tabel_f1_alias'), $tl_f1->$tabel_f1_field1) ?>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <?= table_data(
                row_data('tabel_f1_field2', $tl_f1->$tabel_f1_field2) .
                row_data('tabel_f1_field4', $tl_f1->$tabel_f1_field4) .
                row_data('tabel_f1_field5', $tl_f1->$tabel_f1_field5) .
                row_data('tabel_f1_field6', $tl_f1->$tabel_f1_field6),
                'table-light'
              ) ?>
            </div>
            <div class="col-md-6">
              <?= table_data(
                row_data('tabel_f1_field7', $tl_f1->$tabel_f1_field7) .
                row_data('tabel_e4_field2', $tl_f1->$tabel_e4_field2) .
                row_data('tabel_f1_field11', $tl_f1->$tabel_f1_field11) .
                row_data('tabel_f1_field12', $tl_f1->$tabel_f1_field12),
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