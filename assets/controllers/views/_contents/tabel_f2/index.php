<?php switch ($this->session->userdata($tabel_c2_field6)) {
    // case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value5:
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

<?php foreach ($tbl_a1 as $tl_a1): ?>
  <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>" class="img-fluid rounded">
<?php endforeach; ?>

<form action="<?= site_url($tabel_f2 . '/tambah') ?>" method="post">

  <!-- form ini berisi data yang sudah diinput sebelumnya dari halaman home -->
  <div class="row justify-content-center align-items-end mt-2">
    <div class="col-md-2">
      <div class="form-group">
        <label><?= $tabel_f2_field10_alias ?></label>
        <input class="form-control" type="date" required name="<?= $tabel_f2_field10_input ?>" value="<?= $tabel_f2_field10_value ?>" min="<?= date('Y-m-d'); ?>">
      </div>
    </div>

    <!-- Seperti di bawah bentuk input array ke depannya cman itu perlu dipending dulu -->
    <!-- <div class="col-md-2">
      <div class="form-group">
        <label>Tanggal Cek Out</label>
        <input class="form-control" type="date" required name="<?= $tabel_f2_field11_input ?>" value=" $cek_out ?>">
      </div>
    </div> -->

    <div class="col-md-2">
      <div class="form-group">
        <label><?= $tabel_f2_field11_alias ?></label>
        <input class="form-control" type="date" required name="<?= $tabel_f2_field11_input ?>" value="<?= $tabel_f2_field11_value ?>" min="<?= date('Y-m-d', strtotime("+1 day")); ?>">
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label><?= $tabel_f2_field8_alias ?></label>
        <input class="form-control" readonly type="number" required name="<?= $tabel_f2_field8_input ?>" min="1" max="10" value="<?= $tabel_f2_field8_value ?>">
      </div>
    </div>


    <div class="col-md-1">
      <div class="form-group">
        <a class="btn btn-primary" type="button" data-toggle="modal" data-target="#ubah">
          Ubah</a>
      </div>
    </div>


  </div>

  <h2>Pesan <?= $tabel_e3_alias ?> Anda</h2>


  <hr>

  <!-- Di bawah ini adalah fitur yang ditetapkan sebagai unfinished, yakni fitur untuk mengelola array dari jumlah pesanan yang telah dilakukan. -->
  <!-- Dengan fitur ini, tamu dapat memesan lebih dari satu kamar  -->
  <!-- dan mendapatkan pesanan yang terpisah masing-masing -->
  <!-- Sebenarnya lebih baik jika menggunakan tabel pesanan dan tabel detail pesanan -->
  <!-- Namun hal itu hanya akan mempersulit masalah yang sudah ada -->
  <!-- Fitur ini akan diselesaikan ketika sudah ada pemahaman mengenai cara kerja array -->
  <!-- 
  $i = 1;
  do { ?> -->
  <!-- <h2>Pesanan  $i ?></h2> -->
  <div class="row justify-content-start mt-4">
    <hr>


    <div class="col-md-6">

      <!-- menentukan id_user jika user sudah membuat akun atau belum -->
      <div class="form-group">
        <label><?= $tabel_f2_field3_alias ?></label>
        <input class="form-control" type="text" required name="<?= $tabel_f2_field3_input ?>" placeholder="Masukkan <?= $tabel_f2_field3_alias ?>" value="<?= $this->session->userdata($tabel_c2_field2) ?>">
        <?php if ($this->session->userdata($tabel_c2_field1)) { ?>
          <input type="hidden" name="<?= $tabel_c2_field1_input ?>" value="<?= $this->session->userdata($tabel_c2_field1) ?>">
        <?php } else { ?>

          <!-- value 0 di id_user untuk pengguna tanpa akun -->
          <input type="hidden" name="<?= $tabel_c2_field1_input ?>" value="0">

        <?php } ?>
      </div>

      <!-- keterangan * di bawah -->
      <div class="form-group">
        <label><?= $tabel_f2_field4_alias ?>*</label>
        <input class="form-control" type="email" required name="<?= $tabel_f2_field4_input ?>" placeholder="Masukkan <?= $tabel_f2_field4_alias ?>" value="<?= $this->session->userdata($tabel_c2_field3) ?>">
      </div>

      <div class="form-group">
        <label><?= $tabel_f2_field5_alias ?></label>
        <input class="form-control" type="text" required name="<?= $tabel_f2_field5_input ?>" placeholder="Masukkan <?= $tabel_f2_field5_alias ?>" value="<?= $this->session->userdata($tabel_c2_field5) ?>">
      </div>

      <div class="form-group">
        <label><?= $tabel_f2_field6_alias ?></label>
        <input class="form-control" type="text" required name="<?= $tabel_f2_field6_input ?>" placeholder="Masukkan <?= $tabel_f2_field6_alias ?>">
      </div>

      <div class="form-group">
        <label><?= $tabel_e4_field2_alias ?></label>
        <select class="form-control" required name="<?= $tabel_e4_field1_input ?>">
          <option selected hidden value="">Pilih <?= $tabel_e4_field2_alias ?>...</option>
          <?php foreach ($tbl_e4 as $tl_e4) : ?>
            <option value="<?= $tl_e4->$tabel_e4_field1; ?>"><?= $tl_e4->$tabel_e4_field2 ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <!-- keterangan * -->
      <small>*<?= $tabel_f2_field4_alias ?> dibutuhkan untuk melakukan <?= $tabel_f2_alias ?> dan <?= $tabel_f3_alias ?></small>

    </div>
    <div class="col-md-6">
    <?php foreach ($dekor as $dk): ?>
  <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" class="img-fluid rounded">
<?php endforeach ?>
    </div>

  </div>


  <hr>

  <!-- $i++;
  } while ($i <= $jlh) ?> -->



  <div class="row justify-content-start mt-4">
    <div class="col-md6">


      <div class="form-group">
        <button class="btn btn-success" onclick="return confirm('Apakah Anda Ingin Memesan <?= $tabel_e3_alias ?>?')" type="submit">Konfirmasi <?= $tabel_f2_alias ?></button>
        <a class="btn btn-danger" type="button" href="<?= site_url('home') ?>">Batal</a>
      </div>
    </div>
  </div>
</form>



<!-- modal edit -->
<div id="ubah" class="modal fade ubah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ubah <?= $tabel_f2_field8_alias ?></h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url($tabel_f2) ?>" method="get">
        <div class="modal-body">
          <div class="form-group">
            <label><?= $tabel_f2_field8_alias ?></label>
            <input class="form-control" type="number" value="<?= $tabel_f2_field8_value ?>" required name="<?= $tabel_f2_field8_input ?>" min="1" max="10" value="1">
            <input type="hidden" name="<?= $tabel_f2_field10_input ?>" value="<?= $tabel_f2_field10_value ?>">
            <input type="hidden" name="<?= $tabel_f2_field11_input ?>" value="<?= $tabel_f2_field11_value ?>">

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