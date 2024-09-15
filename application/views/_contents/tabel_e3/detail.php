<?php switch ($this->session->userdata($tabel_c2_field6)) {
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

<?php foreach ($tbl_e3->result() as $tl_e3):
  if ($tl_e3->$tabel_e3_field1 == '') { ?>   <?php } else { ?>

    <a class="btn btn-info mb-4" href="<?= site_url($tabel_e3 . '/print/' . $tl_e3->$tabel_e3_field1) ?>" target="_blank">
      <i class="fas fa-print"></i> Print</a>
    <div class="table-responsive">
      <table class="table-light" id="data">
        <thead></thead>
        <tbody>
          <tr>
            <td class="table-secondary table-active"><?= $tabel_e3_field1_alias ?></td>
            <td class="table-light"><?= $tl_e3->$tabel_e3_field1 ?></td>
          </tr>

          <tr>
            <td class="table-secondary table-active"><?= $tabel_e3_field2_alias ?></td>
            <td class="table-light"><?= $tl_e3->$tabel_e3_field2 ?></td>
          </tr>

          <tr>
            <td class="table-secondary table-active"><?= $tabel_e3_field3_alias ?></td>
            <td class="table-light"><?= $tl_e3->$tabel_e3_field3 ?></td>
          </tr>

          <tr>
            <td class="table-secondary table-active"><?= $tabel_e3_field4_alias ?></td>
            <td class="table-light"><?= $tl_e3->$tabel_e3_field4 ?></td>
          </tr>

          <tr>
            <td class="table-secondary table-active"><?= $tabel_e3_field5_alias ?></td>
            <td class="table-light"><?= $tl_e3->$tabel_e3_field5 ?></td>
          </tr>

          <tr>
            <td class="table-secondary table-active"><?= $tabel_e3_field6_alias ?></td>
            <td class="table-light"><?= $tl_e3->$tabel_e3_field6 ?></td>
          </tr>

          <tr>
            <?php switch ($tl_e3->$tabel_e3_field4) {
              case $tabel_e3_field4_value0:
              case $tabel_e3_field4_value1:
              case $tabel_e3_field4_value3:
              case $tabel_e3_field4_value4: ?>

                <td class="table-secondary table-active"><?= $tabel_e3_field7_alias ?></td>
                <td class="table-light"><?= $tl_e3->$tabel_e3_field7 ?></td>

                <?php break;
              case $tabel_e3_field4_value2:
              case $tabel_e3_field4_value5: ?>

                <td class="table-secondary table-active"><?= $tabel_e3_field7_alias ?> <?= $tabel_f2_alias ?></td>
                <td class="table-light"><?= $tl_e3->$tabel_e3_field7 ?></td>

                <?php break;
              default: ?>
                <p><?= $tabel_e3_field7_alias ?> tidak valid</p>
                <?php break;
            } ?>
          </tr>

          <tr>
            <td class="table-secondary table-active">Jumlah <?= $tabel_e1_alias ?></td>
            <td class="table-light"><?= $count1 ?></td>
          </tr>

          <tr>
            <td class="table-secondary table-active">Jumlah <?= $tabel_f2_alias ?></td>
            <td class="table-light"><?= $count8 ?></td>
          </tr>

        </tbody>
        <tfoot></tfoot>
      </table>
    </div>


    <?php switch ($tl_e3->$tabel_e3_field4) {
      case $tabel_e3_field4_value0:
      case $tabel_e3_field4_value1: ?>

        <br><br>
        <h1><?= $tabel_e2_alias ?><?= $phase ?></h1>
        <hr>

        <div class="table-responsive"><!-- proses di tabel 3 -->
          <table class="table table-light" id="data">
            <thead class="thead-light">
              <tr class="table-info text-center">
                <td colspan="9">
                  <?php if (!$tbl_e2) { ?>
                    <a class="btn btn-light text-success" type="button" data-toggle="modal" data-target="#<?= $tabel_e2 ?>">
                      + Tambah Entri</a>
                  <?php } else { ?>

                  <?php } ?>


                </td>
              </tr>
              <tr>
                <th><?= $tabel_e2_field1_alias ?></th>
                <th><?= $tabel_e2_field3_alias ?></th>
                <th><?= $tabel_e2_field4_alias ?></th>
                <th><?= $tabel_e2_field5_alias ?></th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>

              <?php foreach ($tbl_e2->result() as $tl_e2): ?>
                <tr>
                  <td><?= $tl_e2->$tabel_e2_field1 ?></td>
                  <td><?= $tl_e2->$tabel_e2_field3 ?></td>
                  <td><?= $tl_e2->$tabel_e2_field4 ?></td>
                  <td><?= $tl_e2->$tabel_e2_field5 ?></td>

                  <td>
                    <?php switch ($tl_e3->$tabel_e3_field4) {
                      case $tabel_e3_field4_value0: ?>
                        <?php break;
                      case $tabel_e3_field4_value1: ?>

                        <?php switch ($this->session->userdata($tabel_c2_field6)) {
                          case $tabel_c2_field6_value3:
                          case $tabel_c2_field6_value4: ?>
                            <a class="btn btn-light text-success" type="button" data-toggle="modal"
                              data-target="#ubah<?= $tl_e2->$tabel_e3_field1 ?>">
                              Setujui</a>
                            <?php break;

                          case $tabel_c2_field6_value5: ?>
                            <p>Tunggu</p>
                            <?php break;

                          default:
                            break;
                        }
                        ?>





                        <?php break;
                      default: ?>
                        <?php break;
                    } ?>
                    <a class="btn btn-light text-info" href="<?= site_url($tabel_e2 . '/print/' . $tl_e2->$tabel_e2_field1) ?>"
                      target="_blank">
                      <i class="fas fa-print"></i></a>

                  </td>

                </tr>
              <?php endforeach ?>
            </tbody>

          </table>
        </div>

        <?php break;
      case $tabel_e3_field4_value2: ?>

        <?php switch ($this->session->userdata($tabel_c2_field6)) {
          case $tabel_c2_field6_value2:
          case $tabel_c2_field6_value3:
          case $tabel_c2_field6_value4: ?>


            <?php break;
          case $tabel_c2_field6_value5: ?>

            <br><br>
            <h1><?= $tabel_f2_alias ?><?= $phase ?></h1>
            <hr>

            <div class="table-responsive"><!-- proses di tabel 8 -->
              <table class="table table-light" id="data">
                <thead class="thead-light">
                  <tr class="table-info text-center">
                    <td colspan="9">
                      <a class="btn btn-light text-success" type="button" data-toggle="modal" data-target="#<?= $tabel_f2 ?>">
                        + Tambah Entri</a>
                    </td>
                  </tr>
                  <tr>
                    <th><?= $tabel_f2_field1_alias ?></th>
                    <th><?= $tabel_f2_field2_alias ?></th>
                    <th><?= $tabel_f2_field3_alias ?></th>
                    <th><?= $tabel_f2_field4_alias ?></th>
                    <th><?= $tabel_f2_field5_alias ?></th>
                    <th><?= $tabel_f2_field6_alias ?></th>
                    <th><?= $tabel_f2_field7_alias ?></th>
                    <th><?= $tabel_f2_field8_alias ?></th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>

                  <?php foreach ($tbl_f2->result() as $tl_f2): ?>
                    <tr>
                      <td><?= $tl_f2->$tabel_f2_field1 ?></td>
                      <td><?= $tl_f2->$tabel_f2_field2 ?></td>
                      <td><?= $tl_f2->$tabel_f2_field3 ?></td>
                      <td><?= $tl_f2->$tabel_f2_field4 ?></td>
                      <td><?= $tl_f2->$tabel_f2_field5 ?></td>
                      <td><?= $tl_f2->$tabel_f2_field6 ?></td>
                      <td><?= $tl_f2->$tabel_f2_field7 ?></td>
                      <td>Rp <?= number_format($tl_f2->$tabel_f2_field8, '2', ',', '.') ?></td>

                      <td>
                        <a class="btn btn-light text-info" href="<?= site_url($tabel_f2 . '/print/' . $tl_f2->$tabel_f2_field1) ?>"
                          target="_blank">
                          <i class="fas fa-print"></i></a>

                      </td>

                    </tr>
                  <?php endforeach ?>
                </tbody>


              </table>
            </div>
            <?php break;

          default:
            break;
        }
        ?>





        <?php break;
      case $tabel_e3_field4_value3: ?>
        <br><br>
        <h1><?= $tabel_e3_alias ?> Anda Sudah Aktif<?= $phase ?></h1>

        <?php break;
      case $tabel_e3_field4_value4: ?>


        <?php switch ($this->session->userdata($tabel_c2_field6)) {
          case $tabel_c2_field6_value3:
          case $tabel_c2_field6_value4: ?>


            <?php break;
          case $tabel_c2_field6_value5: ?>
            <br><br>
            <h1>Butuh <?= $tabel_e1_alias ?><?= $phase ?></h1>
            <hr>

            <div class="table-responsive"><!-- proses di tabel 1 -->
              <table class="table table-light" id="data">
                <thead class="thead-light">
                  <tr class="table-info text-center">
                    <td colspan="9">
                      <a class="btn btn-light text-success" type="button" data-toggle="modal" data-target="#<?= $tabel_e1 ?>">
                        + Tambah Entri</a>
                    </td>
                  </tr>
                  <tr>
                    <th><?= $tabel_e1_field1_alias ?></th>
                    <th><?= $tabel_e1_field2_alias ?></th>
                    <th><?= $tabel_e1_field3_alias ?></th>
                    <th><?= $tabel_e1_field4_alias ?></th>
                    <th><?= $tabel_e1_field5_alias ?></th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>

                  <?php foreach ($tbl_e1->result() as $tl_e1): ?>
                    <tr>
                      <td><?= $tl_e1->$tabel_e1_field1 ?></td>
                      <td><?= $tl_e1->$tabel_e1_field2 ?></td>
                      <td><?= $tl_e1->$tabel_e1_field3 ?></td>
                      <td><?= $tl_e1->$tabel_e1_field4 ?></td>
                      <td><?= $tl_e1->$tabel_e1_field5 ?></td>

                      <td>
                        <a class="btn btn-light text-info" href="<?= site_url($tabel_e1 . '/print/' . $tl_e1->$tabel_e1_field1) ?>"
                          target="_blank">
                          <i class="fas fa-print"></i></a>

                      </td>

                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>

            <?php break;

          default:
            break;
        }
        ?>





        <?php break;
      case $tabel_e3_field4_value5: ?>
        <?php switch ($this->session->userdata($tabel_c2_field6)) {
          case $tabel_c2_field6_value3:
          case $tabel_c2_field6_value4: ?>


            <?php break;
          case $tabel_c2_field6_value5: ?>
            <br><br>
            <h1><?= $tabel_f2_alias ?><?= $phase ?></h1>
            <hr>

            <div class="table-responsive"><!-- proses di tabel 8 -->
              <table class="table table-light" id="data">
                <thead class="thead-light">
                  <tr class="table-info text-center">
                    <td colspan="9">
                      <a class="btn btn-light text-success" type="button" data-toggle="modal" data-target="#<?= $tabel_f2 ?>baru">
                        + Tambah Entri</a>
                    </td>
                  </tr>
                  <tr>
                    <th><?= $tabel_f2_field1_alias ?></th>
                    <th><?= $tabel_f2_field2_alias ?></th>
                    <th><?= $tabel_f2_field3_alias ?></th>
                    <th><?= $tabel_f2_field4_alias ?></th>
                    <th><?= $tabel_f2_field5_alias ?></th>
                    <th><?= $tabel_f2_field6_alias ?></th>
                    <th><?= $tabel_f2_field7_alias ?></th>
                    <th><?= $tabel_f2_field8_alias ?></th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>

                  <?php foreach ($tbl_f2->result() as $tl_f2): ?>
                    <tr>
                      <td><?= $tl_f2->$tabel_f2_field1 ?></td>
                      <td><?= $tl_f2->$tabel_f2_field2 ?></td>
                      <td><?= $tl_f2->$tabel_f2_field3 ?></td>
                      <td><?= $tl_f2->$tabel_f2_field4 ?></td>
                      <td><?= $tl_f2->$tabel_f2_field5 ?></td>
                      <td><?= $tl_f2->$tabel_f2_field6 ?></td>
                      <td><?= $tl_f2->$tabel_f2_field7 ?></td>
                      <td>Rp <?= number_format($tl_f2->$tabel_f2_field8, '2', ',', '.') ?></td>

                      <td>
                        <a class="btn btn-light text-info" href="<?= site_url($tabel_f2 . '/print/' . $tl_f2->$tabel_f2_field1) ?>"
                          target="_blank">
                          <i class="fas fa-print"></i></a>

                      </td>

                    </tr>
                  <?php endforeach ?>
                </tbody>


              </table>
            </div>

            <?php break;

          default:
            break;
        }
        ?>






        <?php break;
      default: ?>
        <br><br>
        <h1><?= $tabel_e3_alias ?> Anda Tidak Valid<?= $phase ?></h1>

        <?php break;
    } ?>

  <?php } ?>



  <div id="<?= $tabel_e2 ?>" class="modal fade <?= $tabel_e2 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Entri</h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel_e2 . '/tambah') ?>" method="post" enctype="multipart/form-data">

          <div class="modal-body">
            <div class="row">

              <!-- Data siswa -->
              <div class="col-md-6">
                <input type="hidden" name="<?= $tabel_e2_field2_input ?>" value="<?= $tl_e3->$tabel_e3_field1 ?>">
                <?php foreach ($tbl_c1->result() as $tl_c1): ?>
                  <input type="hidden" name="<?= $tabel_e2_field3_input ?>" value="<?= $tl_c1->$tabel_c1_field1 ?>">
                <?php endforeach ?>

                <div class="form-group">
                  <label><?= $tabel_e2_field4_alias ?></label>
                  <textarea class="form-control" name="<?= $tabel_e2_field4_input ?>" rows="3"></textarea>
                </div>

                <input type="hidden" name="<?= $tabel_e3_field4_input ?>" value="<?= $tabel_e3_field4_value1 ?>">

              </div>

            </div>
          </div>

          <!-- pesan untuk pengguna yang sedang merubah password -->
          <p id="p_bayar" class="small text-center text-danger"><?= $this->session->flashdata('pesan_bayar') ?></p>

          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Daftar</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <div id="<?= $tabel_f2 ?>" class="modal fade <?= $tabel_f2 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Entri</h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel_f2 . '/tambah') ?>" method="post" enctype="multipart/form-data">

          <div class="modal-body">

            <?php foreach ($tbl_e4->result() as $tl_e4): ?>
              <?php if ($tl_e4->$tabel_e4_field1 == $tl_e3->$tabel_e4_field1) { ?>
                <div class="row">

                  <!-- Data siswa -->

                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?= $tabel_e3_field1_alias ?></label>
                      <p><?= $tl_e3->$tabel_e3_field1 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_e3_field2_alias ?></label>
                      <p><?= $tl_e3->$tabel_e3_field2 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_e3_field3_alias ?></label>
                      <p><?= $tl_e3->$tabel_e3_field3 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_e3_field5_alias ?></label>
                      <p><?= $tl_e3->$tabel_e3_field5 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_e4_field2_alias ?></label>
                      <p><?= $tl_e4->$tabel_e4_field2 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_e4_field3_alias ?></label>
                      <p><?= $tl_e4->$tabel_e4_field3 ?></p>
                    </div>
                    <hr>


                  </div>


                  <!-- Data SPP -->

                  <div class="col-md-6">

                    <input type="hidden" name="<?= $tabel_f2_field2_input ?>"
                      value="<?= $this->session->userdata($tabel_c2_field1) ?>">
                    <input type="hidden" name="<?= $tabel_f2_field3_input ?>" value="<?= $tl_e4->$tabel_e4_field1 ?>">

                    <input type="hidden" name="<?= $tabel_f2_field7_input ?>" value="<?= $tl_e3->$tabel_e3_field1 ?>">

                    <input id="<?= $tabel_e3_field6_input ?>_date" type="hidden" name="<?= $tabel_f2_field6_input ?>"
                      value="<?= $tl_e3->$tabel_e3_field6 ?>">

                    <div class="form-group">
                      <label><?= $tabel_e3_field7_alias ?></label>
                      <input class="form-control" type="datetime-local" name="<?= $tabel_e3_field7_input ?>"
                        id="<?= $tabel_e3_field7_input ?>_date" value="<?= date("Y-m-d H:i:s", strtotime($tabel_e3_field7_limit2)) ?>"
                        min="<?= date("Y-m-d H:i:s", strtotime($tabel_e3_field7_limit2)) ?>">
                    </div>

                    <div class="form-group">
                      <label><?= $tabel_f2_field8_alias ?> </label>
                      <input id="<?= $tabel_f2_field8_input ?>_cost" class="form-control" readonly type="text" required
                        name="<?= $tabel_f2_field8_input ?>" value="">
                    </div>
                  </div>

                <?php }
            endforeach; ?>
            </div>
          </div>

          <!-- pesan untuk pengguna yang sedang merubah password -->
          <p id="p_bayar" class="small text-center text-danger"><?= $this->session->flashdata('pesan_bayar') ?></p>

          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Bayar</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <div id="<?= $tabel_e1 ?>" class="modal fade <?= $tabel_e1 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Entri</h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel_e1 . '/tambah') ?>" method="post" enctype="multipart/form-data">

          <div class="modal-body">
            <div class="row">

              <!-- Data siswa -->
              <?php foreach ($tbl_e4->result() as $tl_e4): ?>
                <?php if ($tl_e4->$tabel_e4_field1 == $tl_e3->$tabel_e4_field1) { ?>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?= $tabel_e3_field1_alias ?></label>
                      <p><?= $tl_e3->$tabel_e3_field1 ?></p>
                      <input type="hidden" name="<?= $tabel_e3_field1_input ?>" value="<?= $tl_e3->$tabel_e3_field1 ?>">
                      <input type="hidden" name="<?= $tabel_c2_field1_input ?>"
                        value="<?= $this->session->userdata($tabel_c2_field1) ?>">
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_e3_field2_alias ?></label>
                      <p><?= $tl_e3->$tabel_e3_field2 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_e3_field3_alias ?></label>
                      <p><?= $tl_e3->$tabel_e3_field3 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_e3_field5_alias ?></label>
                      <p><?= $tl_e3->$tabel_e3_field5 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_e1_field3_alias ?></label>
                      <p><?= $tl_e4->$tabel_e4_field1 ?></p>
                    </div>
                    <hr>

                  </div>


                  <div class="col-md-6">

                    <input type="hidden" name="<?= $tabel_e1_field2_input ?>" value="<?= $tl_e3->$tabel_e3_field1 ?>">
                    <input type="hidden" name="<?= $tabel_e1_field3_input ?>" value="<?= $tl_e4->$tabel_e4_field1 ?>">
                    <input type="hidden" name="<?= $tabel_e3_field4_input ?>" value="<?= $tabel_e3_field4_value5 ?>">


                  </div>
                <?php }
              endforeach; ?>
            </div>
          </div>

          <!-- pesan untuk pengguna yang sedang merubah password -->
          <p id="p_bayar" class="small text-center text-danger"><?= $this->session->flashdata('pesan_bayar') ?></p>

          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Perbaharui</button>
          </div>
        </form>

      </div>
    </div>
  </div>


  <div id="ubah<?= $tl_e3->$tabel_e3_field1 ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Lisensi <?= $tl_e3->$tabel_e3_field1 ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- form untuk mengubah nilai status sebuah pesanan -->
        <form action="<?= site_url($tabel_e3 . '/update_status') ?>" method="post">
          <div class="modal-body">
            <input type="hidden" name="<?= $tabel_e3_field1_input ?>" value="<?= $tl_e3->$tabel_e3_field1 ?>">
            <input type="hidden" name="<?= $tabel_e3_field4_input ?>" value="<?= $tabel_e3_field4_value2 ?>">

          </div>

          <!-- memunculkan notifikasi modal -->
          <p id="p_ubah" class="small text-center text-danger"><?= $this->session->flashdata('pesan_ubah') ?></p>

          <div class="modal-footer">
            <!-- pesan yg muncul berdasarkan nilai status -->

            <p>Setujui Pendaftaran?</p>
            <button class="btn btn-success" type="submit">Ya</button>
          </div>

        </form>

      </div>
    </div>
  </div>


  <div id="<?= $tabel_f2 ?>baru" class="modal fade <?= $tabel_f2 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Entri Baru</h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel_f2 . '/tambah_baru') ?>" method="post" enctype="multipart/form-data">

          <div class="modal-body">
            <div class="row">

              <!-- Data siswa -->
              <?php foreach ($tbl_e4->result() as $tl_e4): ?>
                <?php if ($tl_e4->$tabel_e4_field1 == $tl_e3->$tabel_e4_field1) { ?>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?= $tabel_e3_field1_alias ?></label>
                      <p><?= $tl_e3->$tabel_e3_field1 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_e3_field2_alias ?></label>
                      <p><?= $tl_e3->$tabel_e3_field2 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_e3_field3_alias ?></label>
                      <p><?= $tl_e3->$tabel_e3_field3 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_e3_field5_alias ?></label>
                      <p><?= $tl_e3->$tabel_e3_field5 ?></p>
                    </div>
                    <hr>
                    <div class="form-group">
                      <label><?= $tabel_e4_field2_alias ?></label>
                      <p><?= $tl_e4->$tabel_e4_field2 ?></p>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label><?= $tabel_e4_field3_alias ?></label>
                      <p><?= $tl_e4->$tabel_e4_field3 ?></p>
                    </div>
                    <hr>


                  </div>


                  <!-- Data SPP -->

                  <div class="col-md-6">
                    <input type="hidden" name="<?= $tabel_e3_field7_input ?>" value="<?= $value2 ?>">

                    <input type="hidden" name="<?= $tabel_f2_field2_input ?>"
                      value="<?= $this->session->userdata($tabel_c2_field1) ?>">
                    <input type="hidden" name="<?= $tabel_f2_field3_input ?>" value="<?= $tl_e4->$tabel_e4_field1 ?>">


                    <input type="hidden" name="<?= $tabel_f2_field7_input ?>" value="<?= $tl_e3->$tabel_e3_field1 ?>">

                    <input id="<?= $tabel_e3_field6_input2 ?>_date" type="hidden" name="<?= $tabel_f2_field6_input ?>"
                      value="<?= $tl_e3->$tabel_e3_field6 ?>">

                    <div class="form-group">
                      <label><?= $tabel_e3_field7_alias ?></label>
                      <input class="form-control" type="datetime-local" name="<?= $tabel_e3_field7_input ?>"
                        id="<?= $tabel_e3_field7_input ?>2_date" value="<?= date("Y-m-d H:i:s", strtotime($tabel_e3_field7_limit2)) ?>"
                        min="<?= date("Y-m-d H:i:s", strtotime($tabel_e3_field7_limit2)) ?>">
                    </div>

                    <div class="form-group">
                      <label><?= $tabel_f2_field8_alias ?> </label>
                      <input id="<?= $tabel_f2_field8_input ?>2_cost" class="form-control" readonly type="text" required
                        name="<?= $tabel_f2_field8_input ?>" value="">
                    </div>
                  </div>
                <?php } ?>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- pesan untuk pengguna yang sedang merubah password -->
          <p id="p_bayar" class="small text-center text-danger"><?= $this->session->flashdata('pesan_bayar') ?></p>

          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Bayar</button>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach; ?>


<script>
  // Trigger the calculation function on change of input values
  document.getElementById("<?= $tabel_e3_field6_input ?>_date").addEventListener("change", calculateCost);
  document.getElementById("<?= $tabel_e3_field7_input ?>_date").addEventListener("change", calculateCost);
  document.getElementById("<?= $tabel_e3_field6_input ?>2_date").addEventListener("change", calculateCost2);
  document.getElementById("<?= $tabel_e3_field7_input ?>2_date").addEventListener("change", calculateCost2);
</script>