<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_d4) ?><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor->result() as $dk):
      echo tampil_dekor('175px', $tabel_b1, $dk->$tabel_b1_field4);
    endforeach ?>
  </div>
</div>
<hr>

<?= btn_laporan('tabel_d4') ?>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_d4_field1_alias ?></th>
        <th><?= $tabel_d4_field2_alias ?></th>
        <th><?= $tabel_d4_field3_alias ?></th>
        <th>Created At</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_d4->result() as $tl_d4): ?>
        <tr>
          <td></td>
          <td><?= $tl_d4->$tabel_d4_field1; ?></td>
          <td><?= $tl_d4->$tabel_d4_field2 ?></td>
          <td><?= $tl_d4->$tabel_d4_field3 ?></td>
          <td><?= $tl_d4->created_at ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>


  </table>
</div>