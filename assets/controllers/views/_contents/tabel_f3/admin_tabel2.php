<?php switch ($this->session->userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value2:
    // case $tabel_c2_field6_value4:
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
        <th><?= $tabel_f3_field1_alias ?></th>
        <th><?= $tabel_f3_field4_alias ?></th>
        <th><?= $tabel_f3_field5_alias ?></th>
        <th><?= $tabel_f3_field6_alias ?></th>
        <th><?= $tabel_f3_field7_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_f3 as $tl_f3) : ?>
        <tr>
          <td></td>
          <td><?= $tl_f3->$tabel_f3_field1 ?></td>
          <td><?= $tl_f3->$tabel_f3_field4 ?></td>
          <td><?= $tl_f3->$tabel_f3_field5 ?></td>
          <td>Rp <?= number_format($tl_f3->$tabel_f3_field6, '2', ',', '.') ?></td>
          <td><?= $tl_f3->$tabel_f3_field7 ?></td>
          <td>
            <a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tl_f3->$tabel_f3_field1 ?>">
              <i class="fas fa-eye"></i></a>
            <a class="btn btn-light text-info" href="<?= site_url($tabel_f3 . '/print/' . $tl_f3->$tabel_f3_field1) ?>" target="_blank">
              <i class="fas fa-receipt"></i></a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>



  </table>
</div>

<!-- modal lihat -->
<!-- Tabel transaksi dan tabel history literally sudah bergabung
Jadi tidak perlu menambahkan foreach hitory lagi -->
<?php foreach ($tbl_f3 as $tl_f3) : ?>
  <div id="lihat<?= $tl_f3->$tabel_f3_field1 ?>" class="modal fade lihat" role="dialog">
    <?php foreach ($tbl_e4 as $tl_e4) : ?>
      <?php if ($tl_e4->$tabel_e4_field1 === $tl_f3->$tabel_e4_field1) { ?>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $tabel_f3_alias ?> <?= $tl_f3->$tabel_f3_field1 ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel_f3_field1_alias ?></label>
                    <p><?= $tl_f3->$tabel_f3_field1 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_f3_field4_alias ?></label>
                    <p><?= $tl_f3->$tabel_f3_field4 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_f3_field5_alias ?></label>
                    <p><?= $tl_f3->$tabel_f3_field5 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_f3_field6_alias ?></label>
                    <p>Rp <?= number_format($tl_f3->$tabel_f3_field6, '2', ',', '.') ?></p>
                  </div>
                </div>

                <!-- Di sini adalah bagian menampilkan data history -->



                <div class="col-md-6">
                  <div class="form-group">
                    <label><?= $tabel_f2_field6_alias ?></label>
                    <p><?= $tl_f3->$tabel_f2_field6 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_e4_field2_alias ?></label>
                    <p><?= $tl_e4->$tabel_e4_field2 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_f2_field10_alias ?></label>
                    <p><?= $tl_f3->$tabel_f2_field10 ?></p>
                  </div>
                  <hr>

                  <div class="form-group">
                    <label><?= $tabel_f2_field11_alias ?></label>
                    <p><?= $tl_f3->$tabel_f2_field11 ?></p>
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
      <?php } ?>
    <?php endforeach ?>
  </div>
<?php endforeach ?>