<h2 class="pt-2"><?= $title ?><?= $phase ?></h2>
<hr>

<?php if (userdata($tabel_c2_field1)) { ?>

<?php } else {
  $button = '';
} ?>


<div id="card-view" class="row data-view active">
  <?php if (empty($tbl_e4->result())) { ?>
    <div class="col-md-12">
      <div class="text-center">
        <?php foreach ($no_data->result() as $nd): ?>
          <img src="img/<?= $tabel_b1 ?>/<?= $nd->$tabel_b1_field4 ?>" width="200" alt="Image">
        <?php endforeach ?>
        <h3>NO DATA</h3>
      </div>
    </div>

  <?php } else {
    foreach ($tbl_e4->result() as $tl_e4):
      if ($tl_e4->$tabel_e4_field9 == $tabel_e4_field9_value1) {
        $button = '';
      } else {
        if ($tl_e4->$tabel_e4_field2 != userdata($tabel_c2_field1)) {
          $button = '';
        } else {

          if ($tl_e4->$tabel_e4_field8 == $tabel_e4_field8_value1) {
            $button =
              btn_action('tabel_e4', '/nonaktifkan/' . $tl_e4->$tabel_e4_field1, '<i class="far fa-eye"></i>', 'text-success btn-light') .
              btn_hapus('tabel_e4', $tl_e4->$tabel_e4_field1);
          } elseif ($tl_e4->$tabel_e4_field8 == $tabel_e4_field8_value2) {
            $button =
              btn_action('tabel_e4', '/aktifkan/' . $tl_e4->$tabel_e4_field1, '<i class="far fa-eye-slash"></i>', 'text-secondary btn-light') .
              btn_hapus('tabel_e4', $tl_e4->$tabel_e4_field1);
          }
        }
      }
      if ($tl_e4->$tabel_e4_field8 == $tabel_e4_field8_value2) {
      } else {
        echo card_file(
          $tl_e4->$tabel_e4_field1,
          $tl_e4->$tabel_e4_field3,
          $tl_e4->$tabel_e4_field8,
          btn_lihat($tl_e4->$tabel_e4_field1) .
          $button,
          'text-white bg-danger',
          'col-md-4',
          $tabel_e4,
          $tl_e4->$tabel_e4_field5,
        );
      }
    endforeach;
  } ?>
</div>



<!-- modal edit -->
<?php foreach ($tbl_e4->result() as $tl_e4):
  if ($tl_e4->$tabel_e4_field2 == userdata($tabel_c2_field1)) { ?>


  <?php } ?>

  <!-- modal lihat -->
  <div id="lihat<?= $tl_e4->$tabel_e4_field1 ?>" class="modal fade lihat">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <?= modal_header($tl_e4->$tabel_e4_field3, '') ?>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <?= tampil_image('400px', $tabel_e4, $tl_e4->$tabel_e4_field5, $tl_e4->$tabel_e4_field5) ?>

            </div>
            <div class="col-md-6">
              <div class="border border-dark">
                <div style="height: 200px" class="overflow-auto">
                  <p><?= $tl_e4->$tabel_e4_field4 ?></p>
                </div>

              </div>
              <?= table_data(
                row_data('tabel_e4_field2', $tl_e4->$tabel_e4_field2) .
                row_data('tabel_e4_field6', $tl_e4->$tabel_e4_field6) .
                row_data('tabel_e4_field7', $tl_e4->$tabel_e4_field7),
                'text-dark bg-light'
              ); ?>
            </div>
          </div>
        </div>

        <!-- memunculkan notifikasi modal -->
        <p class="small text-center text-danger"><?= get_flashdata('pesan_lihat') ?></p>

        <div class="modal-footer">
          <?= btn_tutup() ?>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>