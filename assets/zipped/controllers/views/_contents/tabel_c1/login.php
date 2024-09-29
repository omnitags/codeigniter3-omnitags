<!-- form login -->
<form action="<?= site_url($language . '/' . $tabel_c1 . '/ceklogin') ?>" method="post">

  <?= input_add('email', 'tabel_c1_field3', 'required') ?>
  <?= input_add('password', 'tabel_c1_field4', 'required') ?>

  <!-- <p class="text-center"><a class="text-decoration-none" href="<?= site_url($language . '/' . $tabel_c1 . '/login') ?>">Login sebagai <?= $tabel_c1_alias ?></a></p> -->

  <!-- pesan untuk pengguna yang login -->
  <p class="small text-center text-danger"><?= get_flashdata($flash1) ?></p>

  <div class="form-group">
    <div class="d-flex justify-content-center mb-4">
      <button class="btn btn-primary login" type="submit">
        <?= lang('login') ?>
      </button>
    </div>

    <div class="text-center">
      <span><?= lang('dont_have_account') ?></span>
      <a class="text-primary text-decoration-none login" type="button"
        href="<?= site_url($language . '/' . $tabel_c1 . '/signup') ?>">
        <?= lang('create_account') ?>
      </a>
    </div>
  </div>


</form>