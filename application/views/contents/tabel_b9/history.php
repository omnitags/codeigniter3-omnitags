<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?> (ID = <?= $table_id ?>)<?= count_data($tbl_b9) ?><?= $phase ?></h1>
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
        <th>No</th>
        <th>ID History</th>
        <th><?= $tabel_b9_field1_alias ?></th>
        <th><?= $tabel_b9_field2_alias ?></th>
        <th>Updated By</th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($current->result() as $tl_cr): ?>
        <tr class="bg-light">
          <td></td>
          <td>[current]</td>
          <td><?= $tl_cr->$tabel_b9_field1 ?></td>
          <td><?= $tl_cr->$tabel_b9_field2 ?></td>
          <td><?= show_info_user($tl_cr->updated_by, $users) ?></td>
          <td></td>
        </tr>
      <?php endforeach; ?>
      <?php foreach ($tbl_b9->result() as $tl_b9): ?>
        <tr>
          <td></td>
          <td><?= $tl_b9->id_history; ?></td>
          <td><?= $tl_b9->$tabel_b9_field1 ?></td>
          <td><?= $tl_b9->$tabel_b9_field2 ?></td>
          <td><?= $tl_b9->updated_at ?></td>
          <td><?= show_info_user($tl_b9->updated_by, $users) ?></td>
          <td>
            <?= btn_lihat($tl_b9->id_history) ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>


  </table>
</div>

<!-- modal lihat-->
<?php foreach ($tbl_b9->result() as $tl_b9): ?>
  <div id="lihat<?= $tl_b9->id_history; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header_id($tabel_b9_alias, $tl_b9->id_history) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <?= table_data(
              row_data('tabel_b9_field1', $tl_b9->$tabel_b9_field1) .
              row_data('tabel_b9_field2', $tl_b9->$tabel_b9_field2),
              'table-light'
            ) ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= get_flashdata('pesan_lihat') ?></p>

          <div class="modal-footer">
            <?= btn_push('tabel_b9', $tl_b9->id_history) ?>
            <?= btn_tutup() ?>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach; ?>