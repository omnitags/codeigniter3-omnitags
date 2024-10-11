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
<a class="btn btn-info mb-4" href="<?= site_url($tabel_c1 . '/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_c1_field1_alias ?></th>
        <th><?= $tabel_c1_field2_alias ?></th>
        <th><?= $tabel_c1_field3_alias ?></th>
        <th><?= $tabel_c1_field4_alias ?></th>
        <th><?= $tabel_c1_field5_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_c1 as $tl_c1): ?>
        <tr>
          <td></td>
          <td><?= $tl_c1->$tabel_c1_field1; ?></td>
          <td><?= $tl_c1->$tabel_c1_field2 ?></td>
          <td><?= $tl_c1->$tabel_c1_field3 ?></td>
          <td><?= $tl_c1->$tabel_c1_field4 ?></td>
          <td><?= $tl_c1->$tabel_c1_field5 ?></td>
          <td><a class="btn btn-light text-info" type="button" data-toggle="modal"
              data-target="#lihat<?= $tl_c1->$tabel_c1_field1; ?>">
              <i class="fas fa-eye"></i></a>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal"
              data-target="#ubah<?= $tl_c1->$tabel_c1_field1; ?>">
              <i class="fas fa-edit"></i></a>

            <!-- Sebelumnya saya sudah membahas ini di v_admin_spp
          Saya akan mempending fitur ini dengan alasan yang sama dalam waktu yang belum ditentukan -->
            <!-- <a class="btn btn-light text-danger" onclick="return confirm('Hapus user?')" href="< site_url($tabel_c2 . '/hapus/' . $tl_c1->$tabel_c1_field1) ?>">
            <i class="fas fa-trash"></i></a> -->

          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>


  </table>
</div>




<!-- Khusus tabel_c1 aku menyediakan dua mode, satu mode tabel_c1 biasa -->

<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah <?= $tabel_c1_alias ?></h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url($tabel_c1 . '/tambah') ?>" method="post">
        <div class="modal-body">

          <div class="form-group">
            <label><?= $tabel_c1_field2_alias ?></label>
            <input class="form-control" type="text" required name="<?= $tabel_c1_field2_input ?>" placeholder="Masukkan <?= $tabel_c1_field2_alias ?>">
          </div>

          <!-- administrator dapat menentukan password untuk akun baru -->
          <div class="form-group">
            <label><?= $tabel_c1_field3_alias ?></label>
            <input class="form-control" type="email" required name="<?= $tabel_c1_field3_input ?>" placeholder="Masukkan <?= $tabel_c1_field3_alias ?>">
          </div>

          <div class="form-group">
            <label><?= $tabel_c1_field4_alias ?></label>
            <input class="form-control" type="text" required name="<?= $tabel_c1_field4_input ?>" placeholder="Masukkan <?= $tabel_c1_field4_alias ?>">
          </div>

          <!-- Di bawah ini adalah penginputan password dan konfirmasi password untuk tabel_c1, sangat opsional -->
          <!-- <div class="form-group">
          <label><?= $tabel_c1_field4_alias ?></label>
            <input class="form-control" type="password" required name="<?= $tabel_c1_field4_input ?>" placeholder="Masukkan <?= $tabel_c1_field4_alias ?>">
          </div>

          <div class="form-group">
          <label>Konfirmasi <?= $tabel_c1_field4_alias ?></label>
            <input class="form-control" type="password" required name="konfirm" placeholder="Konfirmasi <?= $tabel_c1_field4_alias ?>">
          </div> -->


          <div class="form-group">
            <label><?= $tabel_c1_field5_alias ?></label>
            <input class="form-control-file" name="<?= $tabel_c1_field5_input ?>" type="file">
          </div>



          <div class="form-group">
            <label><?= $tabel_c1_field6_alias ?></label>
            <select class="form-control" required name="<?= $tabel_c1_field6_input ?>">
              <option value="" selected hidden>Pilih <?= $tabel_c1_field6_alias ?></option>
              <option value="<?= $tabel_c1_field6_value1 ?>"><?= $tabel_c1_field6_value1_alias ?></option>
              <option value="<?= $tabel_c1_field6_value2 ?>"><?= $tabel_c1_field6_value2_alias ?></option>
            </select>
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
<?php foreach ($tbl_c1 as $tl_c1): ?>
  <div id="ubah<?= $tl_c1->$tabel_c1_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel_c1_alias ?>   <?= $tl_c1->$tabel_c1_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak dapat mengubah password akun lain -->
        <form action="<?= site_url($tabel_c1 . '/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label><?= $tabel_c1_field2_alias ?></label>
              <input class="form-control" type="text" required name="<?= $tabel_c1_field2_input ?>" placeholder="Masukkan <?= $tabel_c1_field2_alias ?>" value="<?= $tl_c1->$tabel_c1_field2 ?>">
              <input type="hidden" name="<?= $tabel_c1_field1_input ?>" value="<?= $tl_c1->$tabel_c1_field1 ?>">
            </div>

            <!-- administrator dapat menentukan password untuk akun baru -->
            <div class="form-group">
              <label><?= $tabel_c1_field3_alias ?></label>
              <input class="form-control" type="email" required name="<?= $tabel_c1_field3_input ?>" placeholder="Masukkan <?= $tabel_c1_field3_alias ?>" value="<?= $tl_c1->$tabel_c1_field3 ?>">
            </div>

            <div class="form-group">
              <label><?= $tabel_c1_field4_alias ?></label>
              <input class="form-control" type="text" required name="<?= $tabel_c1_field4_input ?>" placeholder="Masukkan <?= $tabel_c1_field4_alias ?>" value="<?= $tl_c1->$tabel_c1_field4 ?>">
            </div>

            <div class="form-group">
              <img src="img/<?= $tabel_c1 ?>/<?= $tl_c1->$tabel_c1_field5; ?>" width="300">
            </div>
            <hr>

            <div class="form-group">
              <label>Ubah <?= $tabel_c1_field5_alias ?></label>
              <input class="form-control-file" type="file" name="<?= $tabel_c1_field5_input ?>">
              <input type="hidden" name="<?= $tabel_c1_field5_old ?>" value="<?= $tl_c1->$tabel_c1_field5; ?>">
            </div>

            <div class="form-group">
              <label><?= $tabel_c1_field6_alias ?></label>
              <select class="form-control" required name="<?= $tabel_c1_field6_input ?>">
                <option value="<?= $tl_c1->$tabel_c1_field6 ?>" selected hidden><?= $tl_c1->$tabel_c1_field6 ?></option>
                <option value="<?= $tabel_c1_field6_value1 ?>"><?= $tabel_c1_field6_value1_alias ?></option>
                <option value="<?= $tabel_c1_field6_value2 ?>"><?= $tabel_c1_field6_value2_alias ?></option>
              </select>
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
<?php foreach ($tbl_c1 as $tl_c1): ?>
  <div id="lihat<?= $tl_c1->$tabel_c1_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $tabel_c1_alias ?>   <?= $tl_c1->$tabel_c1_field1; ?></h5>

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
                  <label><?= $tabel_c1_field2_alias ?> : </label>
                  <p><?= $tl_c1->$tabel_c1_field2; ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel_c1_field3_alias ?> : </label>
                  <p><?= $tl_c1->$tabel_c1_field3; ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel_c1_field4_alias ?> : </label>
                  <p><?= $tl_c1->$tabel_c1_field4; ?></p>
                </div>
                <hr>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label><?= $tabel_c1_field5_alias ?> : </label>
                  <p><?= $tl_c1->$tabel_c1_field5; ?></p>
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
