<h1><?= $title ?><?= $phase ?></h1>
<hr>
<div class="row">
  <div class="col-md-6">
    <?php foreach ($tbl_c1 as $tl_c1): ?>

      <!-- tombol untuk memunculkan modal memperbaiki password -->
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal"
        data-target="#password<?= $tl_c1->$tabel_c1_field1 ?>">
        <i class="fas fa-edit"></i> Ubah <?= $tabel_c1_field4_alias ?></a>

      <!-- form ini terpisah dengan form ubah password untuk keamanan sesama :) -->
      <form action="<?= site_url($tabel_c1 . '/update_profil') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label><?= $tabel_c1_field2_alias ?></label>
          <input class="form-control tabel_a1" type="text" name="<?= $tabel_c1_field2_input ?>"
            value="<?= $tl_c1->$tabel_c1_field2; ?>">
          <input type="hidden" name="<?= $tabel_c1_field1_input ?>" value="<?= $tl_c1->$tabel_c1_field1; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel_c1_field3_alias ?>*</label>
          <input class="form-control tabel_a1" type="text" name="<?= $tabel_c1_field3_input ?>"
            value="<?= $tl_c1->$tabel_c1_field3; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel_c1_field5_alias ?></label>
          <input class="form-control tabel_a1" type="text" name="<?= $tabel_c1_field5_input ?>"
            value="<?= $tl_c1->$tabel_c1_field5; ?>">
        </div>

        <div class="form-group">
          <button class="btn btn-success" onclick="return confirm('Ubah data profil?')" type="submit">Simpan
            Perubahan</button>
        </div>
        <small>*Merubah <?= $tabel_c1_field3_alias ?> ini tidak akan merubah <?= $tabel_c1_field3_alias ?> yang ada di
          <?= $tabel_f2_alias ?></small>
      </form>
    <?php endforeach; ?>
  </div>

  <div class="col-md-6">
    <?php foreach ($dekor as $dk): ?>
      <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" class="img-fluid">
    <?php endforeach ?>
  </div>
</div>


<!-- modal edit password-->
<?php foreach ($tbl_c1 as $tl_c1): ?>
  <div id="password<?= $tl_c1->$tabel_c1_field1 ?>" class="modal fade <?= $tabel_c1_field4 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ubah <?= $tabel_c1_field4_alias ?> Anda</h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <form action="<?= site_url($tabel_c1 . '/update_pass') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input class="form-control" type="password" required name="<?= $tabel_c1_field4_old ?>"
                placeholder="Masukkan <?= $tabel_c1_field4_alias ?> lama">
              <input type="hidden" name="<?= $tabel_c1_field1_input ?>" value="<?= $tl_c1->$tabel_c1_field1; ?>">
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input class="form-control" id="psw" type="password" required name="<?= $tabel_c1_field4_input ?>"
                placeholder="Masukkan <?= $tabel_c1_field4_alias ?> baru" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
            </div>

            <div id="message">
              <label class="checkpass">Password must contain the following:</label><br>
              <div class="row">
                <div class="col-md-6">
                  <label id="letter" class="checkpass invalid">A <b>lowercase</b> letter</label><br>
                  <label id="capital" class="checkpass invalid">A <b>capital (uppercase)</b> letter</label><br>

                </div>
                <div class="col-md-6">
                  <label id="number" class="checkpass invalid">A <b>number</b></label><br>
                  <label id="length" class="checkpass invalid">Minimum <b>8 characters</b></label>

                </div>
              </div>
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input class="form-control" type="password" required name="konfirm"
                placeholder="Konfirmasi <?= $tabel_c1_field4_alias ?> baru">
            </div>
          </div>

          <!-- pesan untuk pengguna yang sedang merubah password -->
          <!-- untuk bagian ini akan kuubah nanti -->
          <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_' . $tabel_c1_field4) ?></p>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm('Ubah <?= $tabel_c1_field4_alias ?>?')"
              type="submit">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>