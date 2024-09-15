<h1><?= $title ?><?= $phase ?></h1>
<hr>

<div class="row">
  <div class="col-md-10">
    <?= btn_tambah() ?>
    <?= btn_laporan('tabel_e3') ?>

  </div>

  <div class="col-md-2 d-flex justify-content-end">
    <?= view_switcher() ?>
  </div>
</div>



<div id="card-view" class="row data-view active">
  <?php if (empty($tbl_e3->result())) {
    load_view('_partials/no_data');
  } else {
    foreach ($tbl_e3->result() as $tl_e3):
      echo card_regular(
        $tl_e3->$tabel_e3_field1,
        $tl_e3->$tabel_e3_field2,
        $tl_e3->$tabel_e3_field5,
        btn_lihat($tl_e3->$tabel_e3_field1) . ' ' .
        btn_edit($tl_e3->$tabel_e3_field1) . ' ' .
        btn_hapus('tabel_e3', $tl_e3->$tabel_e3_field1),
        'text-white bg-danger',
        'col-md-3',
        $tabel_e3,
      );
    endforeach;
  } ?>
</div>


<div id="table-view" class="table-responsive data-view" style="display: none;">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_e3_field1_alias ?></th>
        <th><?= $tabel_e4_field2_alias ?></th>
        <th><?= $tabel_e3_field4_alias ?></th>
        <th><?= $tabel_e3_field5_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_e3->result() as $tl_e3): ?>
        <?php foreach ($tbl_e4->result() as $tl_e4): ?>
          <?php if ($tl_e4->$tabel_e3_field2 == $tl_e3->$tabel_e3_field2) { ?>
            <tr>
              <td></td>
              <td><?= $tl_e3->$tabel_e3_field1 ?></td>
              <td><?= $tl_e4->$tabel_e4_field2 ?></td>
              <td><?= $tl_e3->$tabel_e3_field4 ?></td>
              <td><?= $tl_e3->$tabel_e3_field5 ?></td>
              <td>
                <a class="btn btn-light text-info" type="button" data-toggle="modal"
                  data-target="#lihat<?= $tl_e3->$tabel_e3_field1; ?>">
                  <i class="fas fa-eye"></i>
                </a>
                <a class="btn btn-light text-info" href="<?= site_url($tabel_e3 . '/detail/' . $tl_e3->$tabel_e3_field1) ?>">
                  <i class="fas fa-info-circle"></i>
                </a>
              </td>
            </tr>
          <?php } ?>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </tbody>

    <!-- <tfoot>
      <tr>
        <th>No</th>
        <th><?= $tabel_e3_field1_alias ?></th>
        <th><?= $tabel_e3_field2_alias ?></th>
        <th><?= $tabel_e3_field4_alias ?></th>
        <th><?= $tabel_e3_field5_alias ?></th>
        <th>Aksi</th>
      </tr>
    </tfoot> -->
  </table>
</div>



<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah <?= $tabel_e3_alias ?></h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url($tabel_e3 . '/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

          <!-- memilih salah satu tipe kamar yang ada -->
          <div class="form-group">
            <label><?= $tabel_e4_field1_alias ?></label>
            <select class="form-control" required name="<?= $tabel_e4_field1_input ?>">
              <option selected hidden value="">Pilih <?= $tabel_e4_field1_alias ?>...</option>
              <?php foreach ($tbl_e4->result() as $tl_e4): ?>

                <!-- mengambil nilai tipe dari tipe kamar -->
                <option value="<?= $tl_e4->$tabel_e3_field2 ?>"><?= $tl_e4->$tabel_e4_field2; ?></option>

              <?php endforeach ?>

            </select>
          </div>

          <div class="form-group">
            <label><?= $tabel_e3_field3_alias ?></label>
            <select class="form-control" required name="<?= $tabel_e3_field3_input ?>">
              <option selected hidden value="">Pilih <?= $tabel_e3_field3_alias ?>...</option>

              <!-- memilih nilai status -->
              <option value="<?= $tabel_e3_field3_value1 ?>"><?= $tabel_e3_field3_value1_alias ?></option>
              <option value="<?= $tabel_e3_field3_value2 ?>"><?= $tabel_e3_field3_value2_alias ?></option>

            </select>
          </div>

          <input type="hidden" name="<?= $tabel_e3_field4_input ?>" value="<?= $tabel_e3_field4_value0 ?>">

        </div>

        <!-- memunculkan notifikasi modal -->
        <p id="p_tambah" class="small text-center text-danger"><?= $this->session->flashdata('pesan_tambah') ?></p>

        <div class="modal-footer">
          <button class="btn btn-success" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal edit -->
<?php foreach ($tbl_e3->result() as $tl_e3): ?>
  <?php foreach ($tbl_e4->result() as $tl_e4): ?>
    <?php if ($tl_e4->$tabel_e3_field2 == $tl_e3->$tabel_e3_field2) { ?>
      <div id="ubah<?= $tl_e3->$tabel_e3_field1; ?>" class="modal fade ubah">
        <div class="modal-dialog">
          <div class="modal-content">
            <?= modal_header_id(lang('change_data') . ' ' . lang('tabel_e3_alias'), $tl_e3->$tabel_e3_field1) ?>

            <form action="<?= site_url($tabel_e3 . '/update') ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <?= input_hidden('tabel_e3_field1', $tl_e4->$tabel_e3_field2, 'required') ?>
                <?= input_add('text', 'tabel_e4_field2', 'required readonly') ?>

                <div class="form-group">
                  <label><?= $tabel_e3_field4_alias ?></label>
                  <select class="form-control" required name="<?= $tabel_e3_field4_input ?>">
                    <option selected hidden value="<?= $tl_e3->$tabel_e3_field4; ?>"><?= $tl_e3->$tabel_e3_field4; ?></option>

                    <!-- memilih nilai status -->
                    <option value="<?= $tabel_e3_field4_value4 ?>"><?= $tabel_e3_field4_value4_alias ?></option>
                    <option value="<?= $tabel_e3_field4_value5 ?>"><?= $tabel_e3_field4_value5_alias ?></option>

                  </select>
                  <input type="hidden" name="<?= $tabel_e3_field1_input ?>" value="<?= $tl_e3->$tabel_e3_field1; ?>">
                </div>

                <?= input_textarea('tabel_e3_field5', $tl_e3->$tabel_e3_field5, 'required') ?>
              </div>

              <!-- memunculkan notifikasi modal -->
              <p class="small text-center text-danger"><?= get_flashdata('pesan_tambah') ?></p>

              <div class="modal-footer">
                <?= fontawesome_link() ?>
                <?= btn_simpan() ?>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  <?php endforeach; ?>
<?php endforeach; ?>

<!-- Modal Lihat -->
<?php foreach ($tbl_e3->result() as $tl_e3): ?>
  <?php foreach ($tbl_e4->result() as $tl_e4): ?>
    <?php if ($tl_e4->$tabel_e3_field2 == $tl_e3->$tabel_e3_field2) { ?>

      <div id="lihat<?= $tl_e3->$tabel_e3_field1; ?>" class="modal fade lihat" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $tabel_e3_alias ?>       <?= $tl_e3->$tabel_e3_field1; ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <form>
              <div class="modal-body">
                <div class="form-group">
                  <label><?= $tabel_e4_field2_alias ?> : </label>
                  <p><?= $tl_e4->$tabel_e4_field2; ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel_e3_field4_alias ?> : </label>
                  <p><?= $tl_e3->$tabel_e3_field4; ?></p>
                </div>
                <hr>

                <div class="form-group">
                  <label><?= $tabel_e3_field5_alias ?> : </label>
                  <p><?= $tl_e3->$tabel_e3_field5; ?></p>
                </div>

              </div>

              <!-- memunculkan notifikasi modal -->
              <p id="p_lihat" class="small text-center text-danger"><?= $this->session->flashdata('pesan_lihat') ?></p>

              <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  <?php endforeach; ?>
<?php endforeach; ?>