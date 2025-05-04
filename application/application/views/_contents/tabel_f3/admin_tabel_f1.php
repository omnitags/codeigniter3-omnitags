<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_f3) ?><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor->result() as $dk): ?>
      <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200" alt="Image">
    <?php endforeach ?>
  </div>
</div>
<hr>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= lang('no') ?></th>
        <th><?= lang('tabel_f3_field1_alias') ?></th>
        <th><?= lang('tabel_f3_field4_alias') ?></th>
        <th><?= lang('tabel_f3_field5_alias') ?></th>
        <th><?= lang('tabel_f3_field6_alias') ?></th>
        <th><?= lang('tabel_f3_field7_alias') ?></th>
        <th><?= lang('action') ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_f3->result() as $tl_f3): ?>
        <tr>
          <td></td>
          <td><?= $tl_f3->$tabel_f3_field1 ?></td>
          <td><?= $tl_f3->$tabel_f3_field4 ?></td>
          <td><?= $tl_f3->$tabel_f3_field5 ?></td>
          <td>Rp <?= number_format($tl_f3->$tabel_f3_field6, '2', ',', '.') ?></td>
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

<!-- modal lihat -->
<!-- Tabel transaksi dan tabel history literally sudah bergabung
Jadi tidak perlu menambahkan foreach hitory lagi -->
<?php foreach ($tbl_f3->result() as $tl_f3): ?>
  <div id="lihat<?= $tl_f3->$tabel_f3_field1 ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <?= modal_header_id(lang('tabel_f3_alias'), $tl_f3->$tabel_f3_field1) ?>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <?= table_data(
                row_data('tabel_f3_field1', $tl_f3->$tabel_f3_field1) .
                row_data('tabel_f3_field4', $tl_f3->$tabel_f3_field4) .
                row_data('tabel_f3_field5', $tl_f3->$tabel_f3_field5) .
                row_data('tabel_f3_field6', 'Rp' . number_format($tl_f3->$tabel_f3_field6, '2', ',', '.')),
                'table-light'
              ) ?>
            </div>
            <div class="col-md-6">
              <?= table_data(
                row_data('tabel_f2_field6', $tl_f3->$tabel_f2_field6) .
                row_data('tabel_e4_field2', $tl_e4->$tabel_e4_field2) .
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