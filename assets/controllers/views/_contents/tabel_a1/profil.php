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
<div class="row">
  <div class="col-md-6">
    <p>Beberapa gambar tidak akan langsung berubah, perlu menghapus cache terlebih dahulu.</p>

    <!-- form edit favicon, logo, dan foto -->
    <?php foreach ($tbl_a1 as $tl_a1): ?>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal"
        data-target="#<?= $tabel_b7_field3 . $tl_a1->$tabel_b7_field1 ?>">
        <i class="fas fa-edit"></i> <?= $tabel_b7_field3_alias ?></a>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal"
        data-target="#<?= $tabel_b7_field4 . $tl_a1->$tabel_b7_field1 ?>">
        <i class="fas fa-edit"></i> <?= $tabel_b7_field4_alias ?></a>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal"
        data-target="#<?= $tabel_b7_field5 . $tl_a1->$tabel_b7_field1 ?>">
        <i class="fas fa-edit"></i> <?= $tabel_b7_field5_alias ?></a>
    <?php endforeach; ?>

    <?php foreach ($tbl_a1 as $tl_a1): ?>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal"
        data-target="#<?= $tabel_a1_field8 . $tl_a1->$tabel_a1_field1 ?>">
        <i class="fas fa-edit"></i> <?= $tabel_b7_alias ?></a>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal"
        data-target="#<?= $tabel_b2 . $tl_a1->$tabel_a1_field1 ?>">
        <i class="fas fa-edit"></i> <?= $tabel_b2_alias ?></a>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal"
        data-target="#<?= $tabel_b5 . $tl_a1->$tabel_a1_field1 ?>">
        <i class="fas fa-edit"></i> <?= $tabel_b5_alias ?></a>

      <a class="btn btn-info mb-4" href="<?= site_url($tabel_b1 . '/admin') ?>">
        <i class="fas fa-edit"></i> Kelola <?= $tabel_b1_alias ?></a>
      <a class="btn btn-info mb-4" href="<?= site_url($tabel_b8 . '/admin') ?>">
        <i class="fas fa-edit"></i> Kelola <?= $tabel_b8_alias ?></a>
      <a class="btn btn-info mb-4" href="<?= site_url($tabel_b6 . '/admin') ?>">
        <i class="fas fa-edit"></i> <?= $tabel_b6_alias ?></a>



      <form action="<?= site_url($tabel_a1 . '/update') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label><?= $tabel_a1_field2_alias ?></label>
          <input class="form-control tabel_a1" required type="text" name="<?= $tabel_a1_field2_input ?>"
            value="<?= $tl_a1->$tabel_a1_field2; ?>">
          <input type="hidden" name="<?= $tabel_a1_field1_input ?>" value="<?= $tl_a1->$tabel_a1_field1; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel_a1_field3_alias ?></label>
          <textarea class="form-control tabel_a1" required name="<?= $tabel_a1_field3_input ?>"
            rows="3"><?= $tl_a1->$tabel_a1_field3; ?></textarea>
        </div>

        <div class="form-group">
          <label><?= $tabel_a1_field4_alias ?></label>
          <input class="form-control tabel_a1" required type="text" name="<?= $tabel_a1_field4_input ?>"
            value="<?= $tl_a1->$tabel_a1_field4; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel_a1_field5_alias ?></label>
          <input class="form-control tabel_a1" required type="text" name="<?= $tabel_a1_field5_input ?>"
            value="<?= $tl_a1->$tabel_a1_field5; ?>">
        </div>

        <div class="form-group">
          <button class="btn btn-success" onclick="return confirm('Ubah data website?')" type="submit">Simpan
            Perubahan</button>
        </div>
      </form>
    <?php endforeach; ?>
  </div>
  <div class="col-md-6">
    <?php foreach ($dekor as $dk): ?>
      <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" class="img-fluid">
    <?php endforeach ?>
  </div>
</div>


<!-- modal edit tema-->
<?php foreach ($tbl_a1 as $tl_a1): ?>
  <div id="<?= $tabel_a1_field8 . $tl_a1->$tabel_a1_field1 ?>" class="modal fade <?= $tabel_a1_field8 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel_a1_alias ?>   <?= $tl_a1->$tabel_a1_field1; ?></h5>
          &nbsp;&nbsp;&nbsp;<a class="btn btn-info" href="<?= site_url($tabel_b7 . '/admin') ?>">
            <i class="fas fa-edit"></i> Kelola</a>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel_a1 . '/update_id_tema') ?>" method="post">
          <div class="modal-body">

            <div class="form-group">
              <label>Pilih <?= $tabel_b7_alias ?></label>
              <select class="form-control" required name="<?= $tabel_a1_field8_input ?>">

                <?php foreach ($tbl_b7 as $tl_b7): ?>
                  <?php if ($tl_a1->$tabel_a1_field8 == $tl_b7->$tabel_b7_field1) { ?>

                    <option selected hidden value="<?= $tl_b7->$tabel_b7_field1 ?>"><?= $tl_b7->$tabel_b7_field2 ?></option>

                  <?php } ?>
                <?php endforeach ?>

                <?php foreach ($tbl_b7 as $tl_b7): ?>

                  <option value="<?= $tl_b7->$tabel_b7_field1 ?>"><?= $tl_b7->$tabel_b7_field2 ?>
                  </option>

                <?php endforeach ?>

              </select>
              <input type="hidden" name="<?= $tabel_a1_field1_input ?>" value="<?= $tl_a1->$tabel_a1_field1; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel_a1_field8) ?>
          </p>

          <div class="modal-footer">

            <button class="btn btn-success" type="submit">Simpan
              Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal edit event-->
<?php foreach ($tbl_a1 as $tl_a1): ?>
  <div id="<?= $tabel_b2 . $tl_a1->$tabel_a1_field1 ?>" class="modal fade <?= $tabel_a1_field6 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel_b2_alias ?>   <?= $tl_a1->$tabel_a1_field1; ?></h5>
          &nbsp;&nbsp;&nbsp;<a class="btn btn-info" href="<?= site_url($tabel_b2 . '/admin') ?>">
            <i class="fas fa-edit"></i> Kelola</a>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel_a1 . '/update_id_event') ?>" method="post">
          <div class="modal-body">

            <div class="form-group">
              <label>Pilih <?= $tabel_a1_field6_alias ?></label>
              <select class="form-control" required name="<?= $tabel_a1_field6_input ?>">

                <?php foreach ($tbl_b2 as $tl_b2): ?>
                  <?php if ($tl_a1->$tabel_a1_field6 == $tl_b2->$tabel_a1_field6) { ?>

                    <option selected hidden value="<?= $tl_b2->$tabel_a1_field6 ?>"><?= $tl_b2->$tabel_a1_field6 ?> -
                      <?= $tl_b2->$tabel_b2_field2; ?>
                    </option>
                  <?php } ?>
                <?php endforeach ?>

                <option value="0">Tidak ada</option>

                <?php foreach ($tbl_b2 as $tl_b2): ?>

                  <option value="<?= $tl_b2->$tabel_a1_field6 ?>"><?= $tl_b2->$tabel_a1_field6 ?> -
                    <?= $tl_b2->$tabel_b2_field2; ?>
                  </option>

                <?php endforeach ?>

              </select>
              <input type="hidden" name="<?= $tabel_a1_field1_input ?>" value="<?= $tl_a1->$tabel_a1_field1; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel_a1_field6) ?>
          </p>

          <div class="modal-footer">

            <button class="btn btn-success" type="submit">Simpan
              Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal edit favicon-->
<?php foreach ($tbl_a1 as $tl_a1): ?>
  <div id="<?= $tabel_b7_field3 . $tl_a1->$tabel_b7_field1; ?>" class="modal fade <?= $tabel_b7_field3 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel_b7_field3_alias ?>   <?= $tl_a1->$tabel_b7_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel_b7 . '/update_favicon') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field3; ?>" width="300">
            </div>
            <hr>

            <div class="form-group">
              <label>Ubah <?= $tabel_b7_field3_alias ?></label>
              <input class="form-control-file" required type="file" name="<?= $tabel_b7_field3_input ?>">
              <input type="hidden" name="<?= $tabel_b7_field1_input ?>" value="<?= $tl_a1->$tabel_b7_field1; ?>">
              <input type="hidden" name="<?= $tabel_b7_field2_input ?>" value="<?= $tl_b7->$tabel_b7_field2; ?>">
              <input type="hidden" name="<?= $tabel_b7_field3_old ?>" value="<?= $tl_a1->$tabel_b7_field3; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel_b7_field3) ?>
          </p>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm('Ubah <?= $tabel_b7_field3 ?>?')" type="submit">Simpan
              Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal edit logo-->
<?php foreach ($tbl_a1 as $tl_a1): ?>
  <div id="<?= $tabel_b7_field4 . $tl_a1->$tabel_b7_field1; ?>" class="modal fade <?= $tabel_b7_field4 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel_b7_field4_alias ?>   <?= $tl_a1->$tabel_b7_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel_b7 . '/update_logo') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field4; ?>" width="300">
            </div>
            <hr>


            <div class="form-group">
              <label>Ubah <?= $tabel_b7_field4_alias ?></label>
              <input class="form-control-file" required type="file" name="<?= $tabel_b7_field4_input ?>">
              <input type="hidden" name="<?= $tabel_b7_field1_input ?>" value="<?= $tl_a1->$tabel_b7_field1; ?>">
              <input type="hidden" name="<?= $tabel_b7_field2_input ?>" value="<?= $tl_b7->$tabel_b7_field2; ?>">
              <input type="hidden" name="<?= $tabel_b7_field4_old ?>" value="<?= $tl_a1->$tabel_b7_field4; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel_b7_field4) ?>
          </p>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm('Ubah <?= $tabel_b7_field4 ?>?')" type="submit">Simpan
              Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal edit foto-->
<?php foreach ($tbl_a1 as $tl_a1): ?>
  <div id="<?= $tabel_b7_field5 . $tl_a1->$tabel_b7_field1; ?>" class="modal fade <?= $tabel_b7_field5 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel_b7_field5_alias ?>   <?= $tl_a1->$tabel_b7_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel_b7 . '/update_foto') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5; ?>" width="300">
            </div>
            <hr>

            <div class="form-group">
              <label>Ubah <?= $tabel_b7_field5_alias ?></label>
              <input class="form-control-file" required type="file" name="<?= $tabel_b7_field5_input ?>">
              <input type="hidden" name="<?= $tabel_b7_field1_input ?>" value="<?= $tl_a1->$tabel_b7_field1; ?>">
              <input type="hidden" name="<?= $tabel_b7_field2_input ?>" value="<?= $tl_b7->$tabel_b7_field2; ?>">
              <input type="hidden" name="<?= $tabel_b7_field5_old ?>" value="<?= $tl_a1->$tabel_b7_field5; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel_b7_field5) ?>
          </p>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm('Ubah <?= $tabel_b7_field5 ?>?')" type="submit">Simpan
              Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal edit lisensi-->
<?php foreach ($tbl_a1 as $tl_a1): ?>
  <div id="<?= $tabel_b5 . $tl_a1->$tabel_a1_field1 ?>" class="modal fade <?= $tabel_a1_field7 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel_b5_alias ?>   <?= $tl_a1->$tabel_a1_field1; ?></h5>
          &nbsp;&nbsp;&nbsp;<a class="btn btn-info" href="<?= site_url($tabel_b5 . '/admin') ?>">
            <i class="fas fa-edit"></i> Kelola</a>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel_a1 . '/update_id_lisensi') ?>" method="post">
          <div class="modal-body">

            <div class="form-group">
              <label>Pilih <?= $tabel_a1_field7_alias ?></label>
              <select class="form-control" required name="<?= $tabel_a1_field7_input ?>">

                <?php foreach ($tbl_b5 as $tl_b5): ?>
                  <?php if ($tl_a1->$tabel_a1_field7 == $tl_b5->$tabel_a1_field7) { ?>

                    <option selected hidden value="<?= $tl_b5->$tabel_a1_field7 ?>"><?= $tl_b5->$tabel_a1_field7 ?> -
                      <?= $tl_b5->$tabel_b5_field2; ?>
                    </option>
                  <?php } ?>
                <?php endforeach ?>

                <option value="0">Tidak ada</option>

                <?php foreach ($tbl_b5 as $tl_b5): ?>

                  <option value="<?= $tl_b5->$tabel_a1_field7 ?>"><?= $tl_b5->$tabel_a1_field7 ?> |
                    <?= $tl_b5->$tabel_b5_field2; ?>
                  </option>

                <?php endforeach ?>

              </select>
              <input type="hidden" name="<?= $tabel_a1_field1_input ?>" value="<?= $tl_a1->$tabel_a1_field1; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p id="p_<?= $tabel_a1_field7 ?>" class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel_a1_field7) ?>
          </p>

          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Simpan
              Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>