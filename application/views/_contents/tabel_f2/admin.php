<?php switch ($this->session->userdata($tabel_c2_field6)) {
    // case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value4:
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<!-- tabel fiter pesanan -->
<table class="mb-4">

  <!-- method get supaya nilai dari filter bisa tampil nanti -->
  <form action="<?= site_url($tabel_f2 . '/filter') ?>" method="get">
    <tr>

      <td class="pr-2"><?= $tabel_f2_field10_alias ?></td>
      <td class="pr-2">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Dari</span>
          </div>
          <input type="date" class="form-control" name="<?= $tabel_f2_field10_filter1 ?>" value="<?= $tabel_f2_field10_filter1_value ?>">
        </div>
      </td>
      <td class="pr-2">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Ke</span>
          </div>
          <input type="date" class="form-control" name="<?= $tabel_f2_field10_filter2 ?>" value="<?= $tabel_f2_field10_filter2_value ?>">
        </div>
      </td>

      <td>
        <button class="btn btn-success" type="submit">
          <a type="submit"><i class="fas fa-search"></i></a>
        </button>
        <a class="btn btn-danger" type="button" href="<?= site_url($tabel_f2 . '/admin') ?>">
          <i class="fas fa-redo"></i></a>
      </td>

    </tr>


    <!-- Mengecek data menggunakan tanggal cek out -->
    <!-- method get supaya nilai dari filter bisa tampil nanti -->
    <tr>

      <td class="pr-2"><?= $tabel_f2_field11_alias ?></td>
      <td class="pr-2">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Dari</span>
          </div>
          <input type="date" class="form-control" name="<?= $tabel_f2_field11_filter1 ?>" value="<?= $tabel_f2_field11_filter1_value ?>">

        </div>
      </td>
      <td class="pr-2">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Ke</span>
          </div>
          <input type="date" class="form-control" name="<?= $tabel_f2_field11_filter2 ?>" value="<?= $tabel_f2_field11_filter2_value ?>">
        </div>

      </td>


    </tr>
  </form>
</table>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_f2_field1_alias ?></th>
        <th><?= $tabel_f2_field6_alias ?></th>
        <th><?= $tabel_f2_field10_alias ?></th>
        <th><?= $tabel_f2_field11_alias ?></th>
        <th><?= $tabel_f2_field12_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_f2 as $tl_f2) : ?>
        <tr>
          <td></td>
          <td><?= $tl_f2->$tabel_f2_field1 ?></td>
          <td><?= $tl_f2->$tabel_f2_field6 ?></td>
          <td><?= $tl_f2->$tabel_f2_field10 ?></td>
          <td><?= $tl_f2->$tabel_f2_field11 ?></td>
          <td><?= $tl_f2->$tabel_f2_field12 ?></td>

          <td>
            <?php switch ($tl_f2->$tabel_f2_field12) {
              case $tabel_f2_field12_value1: ?>
                <a class="btn btn-light text-success" type="button" data-toggle="modal" data-target="#book<?= $tl_f2->$tabel_f2_field1 ?>">
                  <i class="fas fa-concierge-bell"></i>
                </a>
              <?php break;
              case $tabel_f2_field12_value3:
              case $tabel_f2_field12_value4: ?>
                <a class="btn btn-light text-warning" type="button" data-toggle="modal" data-target="#ubah<?= $tl_f2->$tabel_f2_field1 ?>">
                  <i class="fas fa-edit"></i>
                </a>
              <?php break;
              case $tabel_f2_field12_value5: ?>
                <a class="btn btn-light text-danger" onclick="return confirm('Hapus pesanan?')" href="<?= site_url($tabel_f2 . '/hapus/' . $tl_f2->$tabel_f2_field1) ?>">
                  <i class="fas fa-trash"></i>
                </a>
            <?php break;
            } ?>
            <!-- tombol print, hasil print akan muncul di tab baru 
        https://stackoverflow.com/questions/32778670/codeigniter-load-view-in-new-tab#:~:text=Say%20you%20want%20it%20to,_blank%22%20in%20the%20form%20tag.&text=That%27s%20all.
        terimakasih pada link di atas
        -->
            <a class="btn btn-light text-info" href="<?= site_url($tabel_f2 . '/print/' . $tl_f2->$tabel_f2_field1) ?>" target="_blank">
              <i class="fas fa-print"></i>
            </a>
          </td>

        </tr>
      <?php endforeach ?>
    </tbody>

  </table>
</div>

<!-- modal ubah -->
<?php foreach ($tbl_f2 as $tl_f2) : ?>
  <div id="ubah<?= $tl_f2->$tabel_f2_field1 ?>" class="modal fade ubah">
    <?php foreach ($tbl_e4 as $tl_e4) : ?>
      <?php if ($tl_e4->$tabel_f2_field7 === $tl_f2->$tabel_f2_field7) { ?>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Pesanan <?= $tl_f2->$tabel_f2_field1 ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <!-- form untuk mengubah nilai status sebuah pesanan -->
            <form action="<?= site_url($tabel_f2 . '/update_status') ?>" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?= $tabel_f2_field1_alias ?></label>
                      <p><?= $tl_f2->$tabel_f2_field1 ?></p>
                      <input type="hidden" name="<?= $tabel_f2_field1_input ?>" value="<?= $tl_f2->$tabel_f2_field1; ?>">
                      <input type="hidden" name="<?= $tabel_f2_field7_input ?>" value="<?= $tl_f2->$tabel_f2_field7; ?>">

                      <!-- input status berdasarkan nilai status -->
                      <!-- seharusnya jika status masih belum bayar, resepsionis tidak bisa melakukan apa-apa terhadap pesanan -->
                      <?php switch ($tl_f2->$tabel_f2_field12) {
                        case $tabel_f2_field12_value2: ?>
                          <input type="hidden" name="<?= $tabel_f2_field12_input ?>" value="<?= $tabel_f2_field12_value3 ?>">
                        <?php break;
                        case $tabel_f2_field12_value3: ?>
                          <input type="hidden" name="<?= $tabel_f2_field12_input ?>" value="<?= $tabel_f2_field12_value4 ?>">
                        <?php break;
                        case $tabel_f2_field12_value4: ?>
                          <input type="hidden" name="<?= $tabel_f2_field12_input ?>" value="<?= $tabel_f2_field12_value5 ?>">
                      <?php break;
                      } ?>


                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_f2_field3_alias ?></label>
                      <p><?= $tl_f2->$tabel_f2_field3 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_f2_field4_alias ?></label>
                      <p><?= $tl_f2->$tabel_f2_field4 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_f2_field5_alias ?></label>
                      <p><?= $tl_f2->$tabel_f2_field5 ?></p>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?= $tabel_f2_field6_alias ?></label>
                      <p><?= $tl_f2->$tabel_f2_field6 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_e4_field2_alias ?></label>
                      <p><?= $tl_e4->$tabel_e4_field2 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_f2_field10_alias ?></label>
                      <p><?= $tl_f2->$tabel_f2_field10 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_f2_field11_alias ?></label>
                      <p><?= $tl_f2->$tabel_f2_field11 ?></p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- memunculkan notifikasi modal -->
              <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_ubah') ?></p>

              <div class="modal-footer">
                <!-- pesan yg muncul berdasarkan nilai status -->
                <?php switch ($tl_f2->$tabel_f2_field12) {
                  case $tabel_f2_field12_value2: ?>
                    <p>Selesaikan Dulu <?= $tabel_f3 ?></p>
                  <?php break;
                  case $tabel_f2_field12_value3: ?>
                    <p>Ubah Status Menjadi <?= $tabel_f2_field12_value4 ?>?</p>
                    <button class="btn btn-success" type="submit">Ya</button>
                  <?php break;
                  case $tabel_f2_field12_value4: ?>
                    <p>Ubah Status Menjadi <?= $tabel_f2_field12_value5 ?>?</p>
                    <button class="btn btn-success" type="submit">Ya</button>
                <?php break;
                } ?>
              </div>

            </form>

          </div>
        </div>
    <?php }
    endforeach; ?>
  </div>
<?php endforeach ?>

<!-- modal book -->
<?php foreach ($tbl_f2 as $tl_f2) : ?>
  <div id="book<?= $tl_f2->$tabel_f2_field1 ?>" class="modal fade book">
    <?php foreach ($tbl_e4 as $tl_e4) : ?>
      <?php if ($tl_e4->$tabel_f2_field7 === $tl_f2->$tabel_f2_field7) { ?>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $tabel_f2_alias ?> <?= $tl_f2->$tabel_f2_field1 ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <!-- form untuk mengubah nilai status sebuah pesanan -->
            <form action="<?= site_url($tabel_f2 . '/book') ?>" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?= $tabel_f2_field1_alias ?></label>
                      <p><?= $tl_f2->$tabel_f2_field1 ?></p>
                      <input type="hidden" name="<?= $tabel_f2_field1_input ?>" value="<?= $tl_f2->$tabel_f2_field1; ?>">
                      <input type="hidden" name="<?= $tabel_f2_field7_input ?>" value="<?= $tl_f2->$tabel_f2_field7; ?>">

                      <!-- input status berdasarkan nilai status -->
                      <!-- seharusnya jika status masih belum bayar, resepsionis tidak bisa melakukan apa-apa terhadap pesanan -->
                      <?php switch ($tl_f2->$tabel_f2_field12) {
                        case $tabel_f2_field12_value2: ?>
                          <input type="hidden" name="<?= $tabel_f2_field12_input ?>" value="<?= $tabel_f2_field12_value3 ?>">

                        <?php break;
                        case $tabel_f2_field12_value3: ?>
                          <input type="hidden" name="<?= $tabel_f2_field12_input ?>" value="<?= $tabel_f2_field12_value4 ?>">

                        <?php break;
                        case $tabel_f2_field12_value4: ?>
                          <input type="hidden" name="<?= $tabel_f2_field12_input ?>" value=<?= $tabel_f2_field12_value5 ?>>

                      <?php break;
                      } ?>


                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_f2_field3_alias ?></label>
                      <p><?= $tl_f2->$tabel_f2_field3 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_f2_field4_alias ?></label>
                      <p><?= $tl_f2->$tabel_f2_field4 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_f2_field5_alias ?></label>
                      <p><?= $tl_f2->$tabel_f2_field5 ?></p>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?= $tabel_f2_field6_alias ?></label>
                      <p><?= $tl_f2->$tabel_f2_field6 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_e4_field2_alias ?></label>
                      <p><?= $tl_e4->$tabel_e4_field2 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_f2_field10_alias ?></label>
                      <p><?= $tl_f2->$tabel_f2_field10 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_f2_field11_alias ?></label>
                      <p><?= $tl_f2->$tabel_f2_field11 ?></p>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Pilih <?= $tabel_e3_field1_alias ?></label>

                      <div class="row">

                        <!-- <select class="form-control" required name="<?= $tabel_f2_field13_input ?>"> -->
                        <!-- menampilkan nilai id_tipe kamar yang aktif -->
                        <!-- <option selected hidden value="">Pilih <?= $tabel_e3_field1_alias ?>:</option> -->
                        <!-- <option value="<?= $tl_e3->$tabel_f2_field13 ?>"><?= $tl_e3->$tabel_f2_field13; ?> - <?= $tl_e4->$tabel_e4_field2 ?></option> -->
                        <!-- </select> -->

                        <?php foreach ($tbl_e3 as $tl_e3) :
                          if ($tl_f2->$tabel_f2_field7 == $tl_e3->$tabel_f2_field7) {
                            if ($tl_e3->$tabel_f2_field7 == $tl_e4->$tabel_f2_field7) {
                              if ($tl_e3->$tabel_e3_field4 == $tabel_e3_field4_value2) { ?>

                                <div class="col-md-3 mb-4">

                                  <div class="card bg-light">
                                    <div class="card-body text-center">

                                      <div class="checkbox-group">
                                        <p class="card-text"><?= $tl_e3->$tabel_f2_field13; ?></p>

                                        <div class="btn-group-toggle" data-toggle="buttons">
                                          <label class="btn btn-primary">

                                            <input type="checkbox" name="<?= $tabel_f2_field13_input ?>" id="option1" 
                                            class="checkbox-option form-control-lg" 
                                            value="<?= $tl_e3->$tabel_e3_field1 ?>" required>


                                          </label>
                                        </div>
                                      </div>

                                      <!-- <div style="margin-bottom: 20px;" class="form-check d-flex justify-content-center">
                                        <input class="custom-radio form-check-input" type="radio" id="radio_1" name="<?= $tabel_f2_field13_input ?>" value="<?= $tl_e3->$tabel_f2_field13 ?>" required>
                                      </div> -->

                                    </div>
                                  </div>

                                </div>


                        <?php }
                            }
                          }
                        endforeach; ?>

                      </div>


                      <p>*Jika tidak ada, berarti semua <?= $tabel_e3_alias ?> full</p>
                      <input type="hidden" name="<?= $tabel_f2_field12_input ?>" value="<?= $tabel_f2_field12_value2 ?>">
                    </div>
                  </div>
                </div>

              </div>

              <!-- memunculkan notifikasi modal -->
              <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_book') ?></p>

              <div class="modal-footer">

                <p>Pesan <?= $tabel_e3_alias ?>?</p>
                <button class="btn btn-success" type="submit">Ya</button>

              </div>
            </form>

          </div>
        </div>

    <?php }
    endforeach ?>
  </div>
<?php endforeach ?>