<!-- form signup -->
<form action="<?= site_url($language . '/' . $tabel_c2 . '/tambah') ?>" method="post">
  <?= input_hidden('tabel_c2_field6', $tabel_c2_field6_value5, 'required') ?>
  <?= input_add('text', 'tabel_c2_field2', 'required') ?>
  <?= input_add('email', 'tabel_c2_field3', 'required') ?>
  <?= add_new_password('tabel_c2_field4', 'required') ?>
  <?= password_req() ?>
  <?= add_confirm('password', 'tabel_c2_field4', 'required') ?>
  <?= input_add('text', 'tabel_c2_field5', 'required') ?>

  <!-- pesan untuk pengguna yang signup -->
  <p class="small text-center text-danger"><?= get_flashdata($flash1) ?></p>

  <!-- tombol signup dan login -->
  <div class="form-group">
    <div class="d-flex justify-content-center mb-4">
      <button class="btn btn-primary login" type="submit">
        <?= lang('create_account') ?>
      </button>
    </div>

    <div class="text-center">
      <span><?= lang('already_have_account') ?></span>
      <a class="text-primary text-decoration-none login" type="button"
        href="<?= site_url($language . '/login') ?>">
        <?= lang('login') ?>
      </a>
    </div>

  </div>
</form>