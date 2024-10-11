<?php switch ($this->session->userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value4:
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_f1_field2_alias ?></th>
        <th><?= $tabel_f1_field3_alias ?></th>
        <th><?= $tabel_f1_field4_alias ?></th>
        <th><?= $tabel_f1_field5_alias ?></th>
        <th><?= $tabel_f1_field6_alias ?></th>
        <th><?= $tabel_f1_field7_alias ?></th>
        <th><?= $tabel_f1_field8_alias ?></th>
        <th><?= $tabel_f1_field9_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tbl_f1 as $tl_f1) :
        foreach ($tbl_e4 as $tl_e4) :
          if ($tl_e4->$tabel_e4_field1 == $tl_f1->$tabel_e4_field1) { ?>
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
              <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tl_f1->$tabel_f1_field1 ?>">
                  <i class="fas fa-eye"></i></a>
                <a class="btn btn-light text-danger" onclick="return confirm('Hapus data <?= $tabel_f1_alias ?>?')" href="<?= site_url($tabel_f1 . '/hapus/' . $tl_f1->$tabel_f1_field1) ?>">
                  <i class="fas fa-trash"></i></a>
              </td>
            </tr>
      <?php }
        endforeach;
      endforeach; ?>
    </tbody>
    


  </table>
</div>

<!-- modal lihat -->
<?php foreach ($tbl_f1 as $tl_f1) : ?>
  <?php foreach ($tbl_e4 as $tl_e4) : ?>
    <?php if ($tl_e4->$tabel_e4_field1 == $tl_f1->$tabel_e4_field1) { ?>
      <div id="lihat<?= $tl_f1->$tabel_f1_field1 ?>" class="modal fade lihat">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $tabel_f1_alias ?> <?= $tl_f1->$tabel_f1_field1 ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel_f1_field2_alias ?></label>
                    <p><?= $tl_f1->$tabel_f1_field2 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_f1_field4_alias ?></label>
                    <p><?= $tl_f1->$tabel_f1_field4 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_f1_field5_alias ?></label>
                    <p><?= $tl_f1->$tabel_f1_field5 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_f1_field6_alias ?></label>
                    <p><?= $tl_f1->$tabel_f1_field6 ?></p>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel_f1_field7_alias ?></label>
                    <p><?= $tl_f1->$tabel_f1_field7 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_e4_field2_alias ?></label>
                    <p><?= $tl_e4->$tabel_e4_field2 ?></p>

                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_f1_field11_alias ?></label>
                    <p><?= $tl_f1->$tabel_f1_field11 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_f1_field12_alias ?></label>
                    <p><?= $tl_f1->$tabel_f1_field12 ?></p>
                  </div>
                </div>
              </div>
            </div>

            <!-- memunculkan notifikasi modal -->
            <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_lihat') ?></p>

            <div class="modal-footer">
              <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  <?php endforeach ?>
<?php endforeach ?>