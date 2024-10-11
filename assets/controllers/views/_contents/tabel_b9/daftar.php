<?php switch ($this->session->userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value2:
  case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value4:
  case $tabel_c2_field6_value5:
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<?php foreach ($dekor as $dk): ?>
  <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200">
<?php endforeach ?>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_b8_field3_alias ?></th>
        <th><?= $tabel_b9_field4_alias ?></th>
        <th><?= $tabel_b9_field5_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_b9_alt as $tl_b9_alt):
        if ($tl_b9_alt->$tabel_b9_field6 == NULL) { ?>
          <tr class="bg-light">
            <td></td>
            <td><?= $tl_b9_alt->$tabel_b8_field3 ?></td>
            <td><?= $tl_b9_alt->$tabel_b9_field4 ?></td>
            <td><?= $tl_b9_alt->$tabel_b9_field5 ?></td>
            <td>
              <a class="btn btn-light text-warning"
                href="<?= site_url($tabel_b9 . '/lihat/' . $tl_b9_alt->$tabel_b9_field1) ?>">
                <i class="fas fa-eye"></i></a>
              <a class="btn btn-light text-info" type="button" data-toggle="modal"
                data-target="#lihat<?= $tl_b9_alt->$tabel_b9_field1; ?>">
                <i class="fab fa-readme"></i></a>
            </td>
          <?php } else { ?>
          <tr>
            <td></td>
            <td><?= $tl_b9_alt->$tabel_b8_field3 ?></td>
            <td><?= $tl_b9_alt->$tabel_b9_field4 ?></td>
            <td><?= $tl_b9_alt->$tabel_b9_field5 ?></td>
            <td>
              <a class="btn btn-light text-info" type="button" data-toggle="modal"
                data-target="#lihat<?= $tl_b9_alt->$tabel_b9_field1; ?>">
                <i class="fab fa-readme"></i></a>
            </td>
          <?php } endforeach; ?>
    </tbody>


  </table>
</div>


<!-- modal lihat -->
<?php foreach ($tbl_b9_alt as $tl_b9_alt): ?>
  <div id="lihat<?= $tl_b9_alt->$tabel_b9_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $tabel_b9_alias ?>   <?= $tl_b9_alt->$tabel_b9_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label><?= $tabel_b8_field3_alias ?> : </label>
              <p><?= $tl_b9_alt->$tabel_b8_field3; ?></p>
            </div>
            <hr>
            
            <div class="form-group">
              <label><?= $tabel_b9_field4_alias ?> : </label>
              <p><?= html_entity_decode($tl_b9_alt->$tabel_b9_field4); ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel_b9_field5_alias ?> : </label>
              <p><?= $tl_b9_alt->$tabel_b9_field5; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel_b9_field6_alias ?> : </label>
              <p><?= $tl_b9_alt->$tabel_b9_field6; ?></p>
            </div>
            <hr>


          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_lihat') ?></p>

          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach; ?>