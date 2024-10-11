<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_b7) ?><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor->result() as $dk):
      echo tampil_dekor('175px', $tabel_b1, $dk->$tabel_b1_field4);
    endforeach ?>
  </div>
</div>
<hr>

<div class="row">
  <div class="col-md-10">
    <?= btn_tambah() ?>
    <?= btn_laporan('tabel_b7') ?>
    <?= btn_archive('tabel_b7') ?>
  </div>

  <div class="col-md-2 d-flex justify-content-end">
    <?= view_switcher() ?>
  </div>
</div>




<div id="card-view" class="data-view active">
  <div class="row">
    <?php if (empty($tbl_b7->result())) {
      load_view('partials/no_data');
    } else {
      $counter = 1;
      foreach ($tbl_b7->result() as $tl_b7):
        echo card_file(
          $counter,
          $tl_b7->$tabel_b7_field1,
          $tl_b7->$tabel_b7_field2,
          btn_field($tabel_b7_field3 . $tl_b7->$tabel_b7_field1, '<i class="fas fa-globe"></i>') . ' ' .
          btn_field($tabel_b7_field4 . $tl_b7->$tabel_b7_field1, '<i class="fas fa-rocket"></i>') . ' ' .
          btn_field($tabel_b7_field5 . $tl_b7->$tabel_b7_field1, '<i class="fas fa-image"></i>'),
          btn_lihat($tl_b7->$tabel_b7_field1) . ' ' .
          btn_edit($tl_b7->$tabel_b7_field1) . ' ' .
          ($tl_b7->$tabel_b7_field2 != $database ?
            '<a class="btn mr-1 mb-2 btn-light text-danger"
          onclick="return confirm(\'Tindakan anda akan menghapus hal-hal berikut:\n' . $tabel_b7_alias . '\n' . $tabel_b1_alias . '\n' . $tabel_b2_alias . '\n' . $tabel_b5_alias . '\n' . $tabel_b6_alias . '\nHapus data?\')"
          href="' . site_url($tabel_b7 . $tl_b7->$tabel_b7_field1 . '/delete') . '">
          <i class="fas fa-trash"></i></a>' : ''
          ),
          'text-light bg-dark',
          'col-md-3',
          $tabel_b7,
          $tl_b7->$tabel_b7_field3,
        );
        $counter++;
      endforeach;
    } ?>

  </div>
  <div class="row">
    <?= card_pagination() ?>
  </div>
</div>


<div id="table-view" class="table-responsive data-view" style="display: none;">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_b7_field1_alias ?></th>
        <th><?= $tabel_b7_field2_alias ?></th>
        <th><?= $tabel_b7_field3_alias ?></th>
        <th><?= $tabel_b7_field4_alias ?></th>
        <th><?= $tabel_b7_field5_alias ?></th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_b7->result() as $tl_b7): ?>
        <tr>
          <td></td>
          <td><?= xss_clean($tl_b7->$tabel_b7_field1); ?></td>
          <td><?= xss_clean($tl_b7->$tabel_b7_field2) ?></td>
          <td width="10%"><img src="img/<?= xss_clean($tabel_b7) ?>/<?= xss_clean($tl_b7->$tabel_b7_field3) ?>"
              width="50">
            <?= btn_field($tabel_b7_field3 . $tl_b7->$tabel_b7_field1, '<i class="fas fa-globe"></i>') ?>
          </td>
          <td width="10%"><img src="img/<?= xss_clean($tabel_b7) ?>/<?= xss_clean($tl_b7->$tabel_b7_field4) ?>"
              width="50">
            <?= btn_field($tabel_b7_field4 . $tl_b7->$tabel_b7_field1, '<i class="fas fa-rocket"></i>') ?>
          </td>
          <td width="10%"><img src="img/<?= xss_clean($tabel_b7) ?>/<?= xss_clean($tl_b7->$tabel_b7_field5) ?>"
              width="100">
            <?= btn_field($tabel_b7_field5 . $tl_b7->$tabel_b7_field1, '<i class="fas fa-image"></i>') ?>
          </td>
          <td width="20%">
            <?= btn_lihat($tl_b7->$tabel_b7_field1) ?>
            <?= btn_edit($tl_b7->$tabel_b7_field1) ?>

            <?php if ($tl_b7->$tabel_b7_field2 != $database) { ?>
              <a class="btn btn-light text-danger"
                onclick="return confirm('Tindakan anda akan menghapus hal-hal berikut:\n<?= xss_clean($tabel_b7_alias) ?>\n<?= xss_clean($tabel_b1_alias) ?>\n<?= xss_clean($tabel_b2_alias) ?>\n<?= xss_clean($tabel_b5_alias) ?>\n<?= xss_clean($tabel_b6_alias) ?>\nHapus data?')"
                href="<?= site_url($tabel_b7 . '/' . $tl_b7->$tabel_b7_field1 . '/delete') ?>">
                <i class="fas fa-trash"></i></a>
            <?php } ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>


  </table>
</div>

<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= modal_header('Add ' . $tabel_b7_alias, '') ?>

      <form action="<?= site_url($tabel_b7 . '/tambah') ?>" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <?= input_edit($tl_b7->$tabel_b7_field1, 'text', 'tabel_b7_field2', $database, 'required') ?>
          <?= input_ckeditor('tabel_b7_field6', '', 'required') ?>
        </div>

        <!-- memunculkan notifikasi modal -->
        <p class="small text-center text-danger"><?= get_flashdata('pesan_tambah') ?></p>

        <div class="modal-footer">
          <?= btn_simpan() ?>
        </div>
      </form>
    </div>
  </div>
</div>



<!-- modal ubah-->
<?php foreach ($tbl_b7->result() as $tl_b7): ?>
  <div id="ubah<?= $tl_b7->$tabel_b7_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header_id('Make changes to ' . $tabel_b7_alias, $tl_b7->$tabel_b7_field1) ?>
        <form action="<?= site_url($tabel_b7 . '/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <?= input_hidden('tabel_b7_field1', $tl_b7->$tabel_b7_field1, 'required') ?>
            <?= input_edit($tl_b7->$tabel_b7_field1, 'text', 'tabel_b7_field2', $tl_b7->$tabel_b7_field2, 'required') ?>
            <?= input_ckeditor('tabel_b7_field6', $tl_b7->$tabel_b7_field6, 'required') ?>

          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= get_flashdata('pesan_ubah') ?></p>

          <div class="modal-footer">
            <?= btn_update() ?>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div id="<?= $tabel_b7_field3 . $tl_b7->$tabel_b7_field1; ?>" class="modal fade <?= $tabel_b7_field3 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header_id('Make changes to ' . $tabel_b7_field3_alias, $tl_b7->$tabel_b7_field1) ?>

        <form action="<?= site_url($tabel_b7 . '/update_favicon') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <?= input_hidden('tabel_b7_field1', $tl_b7->$tabel_b7_field1, 'required') ?>
            <?= input_hidden('tabel_b7_field2', $tl_b7->$tabel_b7_field2, 'required') ?>
            <?= edit_file('tabel_b7', 'tabel_b7_field3', $tl_b7->$tabel_b7_field3, '') ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= get_flashdata('pesan_' . $tabel_b7_field3) ?>
          </p>

          <div class="modal-footer">
            <?= btn_update_field('tabel_b7_field3') ?>
          </div>
        </form>
      </div>
    </div>
  </div>



  <div id="<?= $tabel_b7_field4 . $tl_b7->$tabel_b7_field1; ?>" class="modal fade <?= $tabel_b7_field4 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header_id('Make changes to ' . $tabel_b7_field4_alias, $tl_b7->$tabel_b7_field1) ?>

        <form action="<?= site_url($tabel_b7 . '/update_logo') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <?= input_hidden('tabel_b7_field1', $tl_b7->$tabel_b7_field1, 'required') ?>
            <?= input_hidden('tabel_b7_field2', $tl_b7->$tabel_b7_field2, 'required') ?>
            <?= edit_file('tabel_b7', 'tabel_b7_field4', $tl_b7->$tabel_b7_field4, '') ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= get_flashdata('pesan_' . $tabel_b7_field4) ?>
          </p>

          <div class="modal-footer">
            <?= btn_update_field('tabel_b7_field4') ?>
          </div>
        </form>
      </div>
    </div>
  </div>



  <div id="<?= $tabel_b7_field5 . $tl_b7->$tabel_b7_field1; ?>" class="modal fade <?= $tabel_b7_field5 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header_id('Make changes to ' . $tabel_b7_field5_alias, $tl_b7->$tabel_b7_field1) ?>

        <form action="<?= site_url($tabel_b7 . '/update_foto') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <?= input_hidden('tabel_b7_field1', $tl_b7->$tabel_b7_field1, 'required') ?>
            <?= input_hidden('tabel_b7_field2', $tl_b7->$tabel_b7_field2, 'required') ?>
            <?= edit_file('tabel_b7', 'tabel_b7_field5', $tl_b7->$tabel_b7_field5, '') ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= get_flashdata('pesan_' . $tabel_b7_field5) ?>
          </p>

          <div class="modal-footer">
            <?= btn_update_field('tabel_b7_field5') ?>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div id="lihat<?= $tl_b7->$tabel_b7_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header_id($tabel_b7_alias, $tl_b7->$tabel_b7_field1) ?>
        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <?= table_data(
              row_data('tabel_b7_field2', $tl_b7->$tabel_b7_field2) .
              row_data('tabel_b7_field6', truncateText(html_entity_decode($tl_b7->$tabel_b7_field6), 200) . btn_read_more('tabel_b7', $tl_b7->$tabel_b7_field1)),
              'table-light'
            ) ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= get_flashdata('pesan_lihat') ?></p>

          <div class="modal-footer">
            <?= btn_history('tabel_b7', $tl_b7->$tabel_b7_field1) ?>
            <?= btn_tutup() ?>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach; ?>

<?= adjust_col_js('col-md-3', 'col-md-4') ?>
<?= load_card_pagination_js($tbl_b7->num_rows(), 28) ?>