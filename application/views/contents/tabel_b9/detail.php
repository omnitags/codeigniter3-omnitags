<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor->result() as $dk):
      echo tampil_dekor('175px', $tabel_b1, $dk->$tabel_b1_field4);
    endforeach ?>
  </div>
</div>
<hr>

<?php foreach ($tbl_b9->result() as $tl_b9): ?>
  <div class="table-responsive">
    <table class="table table-light" id="data">
      <thead></thead>
      <tbody>
        <tr>
          <td class="table-secondary table-active"><?= $tabel_b9_field4_alias ?></td>
          <td class="table-light"><?= $tl_b9->$tabel_b9_field4 ?></td>
        </tr>

        <tr>
          <td class="table-secondary table-active">Created At</td>
          <td class="table-light"><?= datetime_elapsed_string($tl_b9->created_at) ?></td>
        </tr>
      </tbody>
      <tfoot></tfoot>
    </table>
    </div>
    
  <?php endforeach ?>