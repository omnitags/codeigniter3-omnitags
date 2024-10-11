<?php switch ($this->session->userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
    // case 'tabel_c2_field6_value4_alias':
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>
<a class="btn btn-info mb-4" href="<?= site_url($tabel_c2 . '/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_c2_field1_alias ?></th>
        <th><?= $tabel_c2_field2_alias ?></th>
        <th><?= $tabel_c2_field3_alias ?></th>
        <th><?= $tabel_c2_field5_alias ?></th>
        <th><?= $tabel_c2_field6_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_c2 as $tl_c2) : ?>
        <tr>
          <td></td>
          <td><?= $tl_c2->$tabel_c2_field1; ?></td>
          <td><?= $tl_c2->$tabel_c2_field2 ?></td>
          <td><?= $tl_c2->$tabel_c2_field3 ?></td>
          <td><?= $tl_c2->$tabel_c2_field5 ?></td>
          <td><?= $tl_c2->$tabel_c2_field6 ?></td>
          <td><a class="btn btn-light text-info" type="button" data-toggle="modal" data-target="#lihat<?= $tl_c2->$tabel_c2_field1; ?>">
              <i class="fas fa-eye"></i></a>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $tl_c2->$tabel_c2_field1; ?>">
              <i class="fas fa-edit"></i></a>

            <!-- Sebelumnya saya sudah membahas ini di v_admin_spp
          Saya akan mempending fitur ini dengan alasan yang sama dalam waktu yang belum ditentukan -->
            <!-- <a class="btn btn-light text-danger" onclick="return confirm('Hapus user?')" href="< site_url($tabel_c2 . '/hapus/' . $tl_c2->$tabel_c2_field1) ?>">
            <i class="fas fa-trash"></i></a> -->

          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>
</div>

<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah <?= $tabel_c2_alias ?></h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url($tabel_c2 . '/tambah') ?>" method="post">
        <div class="modal-body">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input class="form-control" type="text" required name="<?= $tabel_c2_field2_input ?>" placeholder="Masukkan <?= $tabel_c2_field2_alias ?>">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input class="form-control" type="text" required name="<?= $tabel_c2_field3_input ?>" placeholder="Masukkan <?= $tabel_c2_field3_alias ?>">
          </div>

          <!-- administrator dapat menentukan password untuk akun baru -->
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input class="form-control" type="password" required name="<?= $tabel_c2_field4_input ?>" placeholder="Masukkan <?= $tabel_c2_field4_alias ?>">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input class="form-control" type="password" required name="konfirm" placeholder="Konfirmasi <?= $tabel_c2_field4_alias ?>">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-phone"></i></span>
            </div>
            <input class="form-control" type="text" required name="<?= $tabel_c2_field5_input ?>" placeholder="Masukkan <?= $tabel_c2_field5_alias ?>">
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-users"></i></span>
            </div>

            <!-- hanya admin yang bisa menentukan level user -->
            <select class="form-control" required name="<?= $tabel_c2_field6_input ?>">
              <option value="" selected hidden>Pilih <?= $tabel_c2_field6_alias ?></option>
              <option value="<?= $tabel_c2_field6_value5 ?>"><?= $tabel_c2_field6_value5_alias ?></option>
              <option value="<?= $tabel_c2_field6_value4 ?>"><?= $tabel_c2_field6_value4_alias ?></option>
              <option value="<?= $tabel_c2_field6_value2 ?>"><?= $tabel_c2_field6_value2_alias ?></option>
              <option value="<?= $tabel_c2_field6_value3 ?>"><?= $tabel_c2_field6_value3_alias ?></option>
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
<?php foreach ($tbl_c2 as $tl_c2) : ?>
  <div id="ubah<?= $tl_c2->$tabel_c2_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel_c2_alias ?> <?= $tl_c2->$tabel_c2_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak dapat mengubah password akun lain -->
        <form action="<?= site_url($tabel_c2 . '/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input class="form-control" type="text" required name="<?= $tabel_c2_field2_input ?>" value="<?= $tl_c2->$tabel_c2_field2; ?>">
              <input type="hidden" name="<?= $tabel_c2_field1_input ?>" value="<?= $tl_c2->$tabel_c2_field1; ?>">
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input class="form-control" type="text" required name="<?= $tabel_c2_field3_input ?>" value="<?= $tl_c2->$tabel_c2_field3; ?>">
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
              <input class="form-control" type="text" required name="<?= $tabel_c2_field5_input ?>" value="<?= $tl_c2->$tabel_c2_field5; ?>">
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-users"></i></span>
              </div>
              <select class="form-control" required name="<?= $tabel_c2_field6_input ?>">
                <option selected hidden><?= $tl_c2->$tabel_c2_field6; ?></option>
                <option value="<?= $tabel_c2_field6_value5 ?>"><?= $tabel_c2_field6_value5_alias ?></option>
              <option value="<?= $tabel_c2_field6_value4 ?>"><?= $tabel_c2_field6_value4_alias ?></option>
              <option value="<?= $tabel_c2_field6_value2 ?>"><?= $tabel_c2_field6_value2_alias ?></option>
              <option value="<?= $tabel_c2_field6_value3 ?>"><?= $tabel_c2_field6_value3_alias ?></option>
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
<?php foreach ($tbl_c2 as $tl_c2) : ?>
  <div id="lihat<?= $tl_c2->$tabel_c2_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $tabel_c2_alias ?> <?= $tl_c2->$tabel_c2_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label><?= $tabel_c2_field2_alias ?> : </label>
              <p><?= $tl_c2->$tabel_c2_field2; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel_c2_field3_alias ?> : </label>
              <p><?= $tl_c2->$tabel_c2_field3; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel_c2_field5_alias ?> : </label>
              <p><?= $tl_c2->$tabel_c2_field5; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel_c2_field6_alias ?> : </label>
              <p><?= $tl_c2->$tabel_c2_field6; ?></p>
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