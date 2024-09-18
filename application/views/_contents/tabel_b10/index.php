<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_b10) ?><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor->result() as $dk): ?>
      <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200" alt="Image">
    <?php endforeach ?>
  </div>
</div>
<hr>

<!-- tabel fiter pesanan -->
<table class="mb-4">

  <!-- method get supaya nilai dari filter bisa tampil nanti -->
  <form action="<?= site_url($language . '/' . $tabel_b10 . '/index') ?>" method="get">
    <tr>

      <td class="pr-2">
        <?= select_edit(
          'tabel_b10_field4',
          $tabel_b10_field4_value,
          $tbl_e4,
          $tabel_e4_field1,
          $tabel_e4_field2,
          'required'
        ); ?>

      </td>

      <td>
        <?= btn_cari() ?>
        <?= btn_redo('tabel_b10', '/index') ?>
      </td>

    </tr>
  </form>
</table>


<div class="row">
  <div class="col-md-10">

  </div>

  <div class="col-md-2 d-flex justify-content-end">
    <?= view_switcher() ?>
  </div>
</div>




<div id="card-view" class="row data-view active">
  <?php if (empty($tbl_b10->result())) {
    load_view('_partials/no_data');
  } else {
    foreach ($tbl_b10->result() as $tl_b10): ?>
      <?php
      echo card_file(
        $tl_b10->$tabel_b10_field1,
        $tl_b10->$tabel_b10_field3,
        $tabel_b10_field4_alias . ": " . $tl_b10->$tabel_b10_field4,
        btn_lihat($tl_b10->$tabel_b10_field1),
        'text-white bg-danger',
        'col-md-3',
        $tabel_b10,
        $tl_b10->$tabel_b10_field2,
      );
      ?>
    <?php endforeach;
  } ?>
</div>


<div id="table-view" class="table-responsive data-view" style="display: none;">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= lang('no') ?></th>
        <th><?= lang('tabel_b10_field1_alias') ?></th>
        <th><?= lang('tabel_b10_field2_alias') ?></th>
        <th><?= lang('tabel_b10_field3_alias') ?></th>
        <th><?= lang('tabel_b10_field4_alias') ?></th>
        <th><?= lang('action') ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_b10->result() as $tl_b10): ?>
        <tr>
          <td></td>
          <td><?= $tl_b10->$tabel_b10_field1; ?></td>
          <td><img src="img/<?= $tabel_b10 ?>/<?= $tl_b10->$tabel_b10_field2 ?>" width="100"></td>
          <td><?= $tl_b10->$tabel_b10_field3 ?></td>
          <td><?= $tl_b10->$tabel_b10_field4 ?></td>
          <td>
            <?= btn_lihat($tl_b10->$tabel_b10_field1) ?>
        </tr>
      <?php endforeach; ?>
    </tbody>


  </table>
</div>

<?php foreach ($tbl_b10->result() as $tl_b10): ?>
  <div id="lihat<?= $tl_b10->$tabel_b10_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header_id(lang('tabel_b10_alias'), $tl_b10->$tabel_b10_field1) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <?= table_data(
              row_data('tabel_b10_field1', $tl_b10->$tabel_b10_field1) .
              row_file($tabel_b10, 'tabel_b10_field2', $tl_b10->$tabel_b10_field2) .
              row_data('tabel_b10_field3', $tl_b10->$tabel_b10_field3) .
              row_data('tabel_b10_field4', $tl_b10->$tabel_b10_field4),
              'table-light'
            ) ?>

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
<?php endforeach; ?>


<?= adjust_col_js('col-md-3', 'col-md-4') ?>