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

<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>
<button class="btn btn-info mb-4" type="button" data-toggle="modal" data-target="#import">+ Import</button>
<a class="btn btn-info mb-4" href="<?= site_url($tabel_e4 . '/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>
<button type="button" class="btn btn-info mb-4" id="export-btn" target="_blank">
  <i class="fas fa-print"></i> Cetak Excel</button>


<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_e4_field1_alias ?></th>
        <th><?= $tabel_e4_field2_alias ?></th>
        <th><?= $tabel_e4_field3_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_e4 as $tl_e4) : ?>
        <tr>
          <td></td>
          <td><?= $tl_e4->$tabel_e4_field1; ?></td>
          <td><?= $tl_e4->$tabel_e4_field2 ?></td>
          <td><?= $tl_e4->$tabel_e4_field3 ?></td>
          <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tl_e4->$tabel_e4_field1; ?>">
              <i class="fas fa-eye"></i></a>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $tl_e4->$tabel_e4_field1; ?>">
              <i class="fas fa-edit"></i></a>

            <!-- Sebelumnya saya sudah membahas ini di v_admin_spp
          Saya akan mempending fitur ini dengan alasan yang sama dalam waktu yang belum ditentukan -->
            <!-- <a class="btn btn-light text-danger" onclick="return confirm('Hapus user?')" href="< site_url($tabel_c2 . '/hapus/' . $tl_e4->$tabel_e4_field1) ?>">
            <i class="fas fa-trash"></i></a> -->

          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>
</div>


<!-- modal import -->
<div id="import" class="modal fade import">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Import <?= $tabel_e4_alias ?></h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url($tabel_e4 . '/import') ?>" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          
        <div class="form-group">
          <label for="excel">Import Excel</label>
          <input type="file" class="form-control-file" name="import" id="excel" placeholder="Masukkan" aria-describedby="fileHelpId">
        </div>


        </div>

        <!-- memunculkan notifikasi modal -->
        <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_import') ?></p>

        <div class="modal-footer">
          <button class="btn btn-success" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah <?= $tabel_e4_alias ?></h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url($tabel_e4 . '/tambah') ?>" method="post">
        <div class="modal-body">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input class="form-control" type="text" required name="<?= $tabel_e4_field1_input ?>" placeholder="Masukkan <?= $tabel_e4_field1_alias ?>">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input class="form-control" type="text" required name="<?= $tabel_e4_field2_input ?>" placeholder="Masukkan <?= $tabel_e4_field2_alias ?>">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input class="form-control" type="text" required name="<?= $tabel_e4_field3_input ?>" placeholder="Masukkan <?= $tabel_e4_field3_alias ?>">
          </div>


        </div>

        <!-- memunculkan notifikasi modal -->
        <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_tambah') ?></p>

        <div class="modal-footer">
          <button class="btn btn-success" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal edit -->
<?php foreach ($tbl_e4 as $tl_e4) : ?>
  <div id="ubah<?= $tl_e4->$tabel_e4_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel_e4_alias ?> <?= $tl_e4->$tabel_e4_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak dapat mengubah password akun lain -->
        <form action="<?= site_url($tabel_e4 . '/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input class="form-control" type="text" required name="<?= $tabel_e4_field2_input ?>" placeholder="Masukkan <?= $tabel_e4_field2_alias ?>" value="<?= $tl_e4->$tabel_e4_field2 ?>">
              <input type="hidden" name="<?= $tabel_e4_field1_input ?>" value="<?= $tl_e4->$tabel_e4_field1 ?>">
            </div>

            <!-- administrator dapat menentukan password untuk akun baru -->
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input class="form-control" type="text" required name="<?= $tabel_e4_field3_input ?>" placeholder="Masukkan <?= $tabel_e4_field3_alias ?>" value="<?= $tl_e4->$tabel_e4_field3 ?>">
            </div>

          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_ubah') ?></p>

          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal lihat -->
<?php foreach ($tbl_e4 as $tl_e4) : ?>
  <div id="lihat<?= $tl_e4->$tabel_e4_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $tabel_e4_alias ?> <?= $tl_e4->$tabel_e4_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label><?= $tabel_e4_field2_alias ?> : </label>
                  <p><?= $tl_e4->$tabel_e4_field2; ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel_e4_field3_alias ?> : </label>
                  <p><?= $tl_e4->$tabel_e4_field3; ?></p>
                </div>
                <hr>

              </div>

            </div>
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