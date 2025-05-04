<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_f4) ?><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor->result() as $dk): ?>
      <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200" alt="Image">
    <?php endforeach ?>
  </div>
</div>
<hr>

<?= btn_laporan('tabel_f4') ?>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= lang('no') ?></th>
        <th><?= lang('tabel_f4_field1_alias') ?></th>
        <th><?= lang('tabel_f4_field2_alias') ?></th>
        <th><?= lang('tabel_f4_field3_alias') ?></th>
        <th><?= lang('tabel_f4_field4_alias') ?></th>
        <th><?= lang('tabel_f4_field5_alias') ?></th>
        <th><?= lang('tabel_f4_field6_alias') ?></th>
        <th><?= lang('action') ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_f4->result() as $tl_f4): ?>
        <tr>
          <td></td>
          <td><?= $tl_f4->$tabel_f4_field1; ?></td>
          <td><?= $tl_f4->$tabel_f4_field2 ?></td>
          <td><?= $tl_f4->$tabel_f4_field3 ?></td>
          <td><?= $tl_f4->$tabel_f4_field4 ?></td>
          <td><?= $tl_f4->$tabel_f4_field5 ?></td>
          <td><?= $tl_f4->$tabel_f4_field6 ?></td>
          <td> <?= btn_lihat($tl_f4->$tabel_f4_field1) ?>
            <?= btn_hapus('tabel_f4', $tl_f4->$tabel_f4_field1) ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>


  </table>
</div>


<!-- modal lihat -->
<?php foreach ($tbl_f4->result() as $tl_f4): ?>
  <div id="lihat<?= $tl_f4->$tabel_f4_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <?= modal_header_id(lang('tabel_f4_alias'), $tl_f4->$tabel_f4_field1) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <?= table_data(
                  row_data('tabel_f4_field1', $tl_f4->$tabel_f4_field1) .
                  row_data('tabel_f4_field2', $tl_f4->$tabel_f4_field2) .
                  row_data('tabel_f4_field3', $tl_f4->$tabel_f4_field3),
                  'table-ligjt'
                ) ?>
              </div>
              <div class="col-md-6">
                <?= table_data(
                  row_data('tabel_f4_field4', $tl_f4->$tabel_f4_field4) .
                  row_data('tabel_f4_field5', $tl_f4->$tabel_f4_field5) .
                  row_data('tabel_f4_field6', $tl_f4->$tabel_f4_field6),
                  'table-ligjt'
                ) ?>
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
<?php endforeach; ?>