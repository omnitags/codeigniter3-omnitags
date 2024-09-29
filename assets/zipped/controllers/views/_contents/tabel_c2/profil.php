<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor->result() as $dk): ?>
      <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200" alt="Image">
    <?php endforeach ?>
  </div>
</div>
<hr>

<?php foreach ($tbl_c2->result() as $tl_c2): ?>
  <div class="row">
    <div class="col-md-6">
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal"
        data-target="#password<?= $tl_c2->$tabel_c2_field1 ?>">
        <i class="fas fa-edit"></i> <?= lang('tabel_c2_field4_alias') ?></a>
    </div>
    <div class="col-md-4">

      <!-- form ini terpisah dengan form ubah password untuk keamanan sesama :) -->
      <form action="<?= site_url($language . '/' . $tabel_c2 . '/update_profil') ?>" method="post"
        enctype="multipart/form-data">

        <?= input_hidden('tabel_c2_field1', $tl_c2->$tabel_c2_field1, 'required') ?>
        <?= input_edit('text', 'tabel_c2_field2', $tl_c2->$tabel_c2_field2, 'required') ?>
        <?= input_edit('email', 'tabel_c2_field3', $tl_c2->$tabel_c2_field3, 'required') ?>
        <?= input_edit('text', 'tabel_c2_field5', $tl_c2->$tabel_c2_field5, 'required') ?>

        <div class="form-group">
          <?= btn_update() ?>
        </div>
      </form>
    </div>
  </div>



  <div id="password<?= $tl_c2->$tabel_c2_field1 ?>" class="modal fade <?= $tabel_c2_field4 ?>">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <?= modal_header_id(lang('change_data') . ' ' . $tabel_c2_field4_alias, $tl_c2->$tabel_c2_field1) ?>
        <form action="<?= site_url($language . '/' . $tabel_c2 . '/update_pass') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">

            <?= input_hidden('tabel_c2_field1', $tl_c2->$tabel_c2_field1, 'required') ?>
            <?= add_old('password', 'tabel_c2_field4', 'required') ?>
            <?= add_new_password('tabel_c2_field4', 'required') ?>
            <?= password_req() ?>
            <?= add_confirm('password', 'tabel_c2_field4', 'required') ?>
          </div>

          <!-- pesan untuk pengguna yang sedang merubah password -->
          <!-- untuk bagian ini akan kuubah nanti -->
          <p class="small text-center text-danger"><?= get_flashdata('pesan_' . $tabel_c2_field4) ?></p>

          <div class="modal-footer">
            <?= btn_update_field('tabel_c2_field4') ?>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<br>
<br>

<h1><?= lang('tabel_d3_alias') ?><?= $phase ?></h1>
<hr>
<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= lang('no') ?></th>
        <th><?= lang('tabel_d3_field5_alias') ?></th>
        <th><?= lang('tabel_d3_field3_alias') ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_d3->result() as $tl_d3): ?>
        <tr>
          <td></td>
          <td><?= $tl_d3->$tabel_d3_field5 ?></td>
          <td><?= $tl_d3->$tabel_d3_field3 ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>
</div>