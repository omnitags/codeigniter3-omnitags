<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?> (ID = <?= $table_id ?>)<?= count_data($tbl_f2) ?><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor->result() as $dk):
      echo tampil_dekor_history('175px', $tabel_b1, $dk->$tabel_b1_field4);
    endforeach ?>
  </div>
</div>
<hr>



<div id="table-view" class="table-responsive data-view">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= lang('no') ?></th>
        <th>ID History</th>
        <th><?= lang('tabel_f2_field1_alias') ?></th>
        <th><?= lang('tabel_f2_field2_alias') ?></th>
        <th>Updated At</th>
        <th>Updated By</th>
        <th><?= lang('action') ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_f2->result() as $tl_f2): ?>
        <tr>
          <td></td>
          <td><?= $tl_f2->id_history; ?></td>
          <td><?= $tl_f2->$tabel_f2_field1 ?></td>
          <td><?= $tl_f2->$tabel_f2_field2 ?></td>
          <td><?= $tl_f2->updated_at ?></td>
          <td><?= $tl_f2->updated_by ?></td>
          <td>
            <?= btn_lihat($tl_f2->id_history) ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>


  </table>
</div>

<!-- modal lihat-->
<?php foreach ($tbl_f2->result() as $tl_f2): ?>
  <div id="lihat<?= $tl_f2->id_history; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header_id(lang('tabel_f2_alias'), $tl_f2->id_history) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <?= table_data(
              row_data('tabel_f2_field1', $tl_f2->$tabel_f2_field1) . 
              row_data('tabel_f2_field2', $tl_f2->$tabel_f2_field2),
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