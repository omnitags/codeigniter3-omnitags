<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_b11) ?><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor->result() as $dk):
      tampil_dekor('175px', $tabel_b1, $dk->$tabel_b1_field4);
    endforeach ?>
  </div>
</div>
<hr>

<?= btn_laporan('tabel_b11') ?>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= lang('no') ?></th>
        <th><?= lang('tabel_b11_field1_alias') ?></th>
        <th><?= lang('tabel_b11_field2_alias') ?></th>
        <th><?= lang('tabel_b11_field3_alias') ?></th>
        <th><?= lang('created_at_alias') ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_b11->result() as $tl_b11): ?>
        <tr>
          <td></td>
          <td><?= $tl_b11->$tabel_b11_field1; ?></td>
          <td><?= $tl_b11->$tabel_b11_field2 ?></td>
          <td><?= $tl_b11->$tabel_b11_field3 ?></td>
          <td><?= $tl_b11->$created_at ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>


  </table>
</div>