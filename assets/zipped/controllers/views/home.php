<?php foreach ($tbl_a1 as $tl_a1): ?>
  <div class="row">
    <?php switch (userdata($tabel_c2_field6)) {
      case $tabel_c2_field6_value5: ?>
        <div class="col-md-12">
          <?php break;

      default: ?>
          <div class="col-md-6 d-flex align-items-center">
            <div>
              <h1>Cek Postingan Daur Ulang Plastik Bekas</h1>
              <br>
              <a href="<?= site_url($language . '/' . $tabel_e4) ?>" class="btn btn-primary mb-4">Cek Sekarang</a>
            </div>
          </div>

          <div class="col-md-6">
            <?php break;
    } ?>
        <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>" class="img-fluid rounded">
      </div>
    </div>
  </div>
<?php endforeach; ?>

<h1 class="text-center">Recent Events</h1>
<hr>
<div id="card-view" class="row">
  <?php foreach ($tbl_b2->result() as $tl_b2): ?>
    <?php
    echo card_event(
      $tl_b2->$tabel_b2_field1,
      $tl_b2->$tabel_b2_field3,
      truncateText(html_entity_decode($tl_b2->$tabel_b2_field5), 110) . btn_read_more('tabel_b2', $tl_b2->$tabel_b2_field1),
      '',
      $tabel_b2,
      $tl_b2->$tabel_b2_field4,
      'text-white bg-dark'
    );
    ?>
  <?php endforeach; ?>
</div>

<br>
<br>
<br>


<?php foreach ($tbl_a1 as $tl_a1): ?>
  <h1 class="text-center">About Us</h1>
  <hr>
  <div class="row">
    <div class="col-md-6">
      <p><?= html_entity_decode($tl_a1->$tabel_b7_field6) ?></p>
    </div>

    <div class="col-md-6">
      <?php foreach ($dekor->result() as $dk): ?>
        <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" class="img-fluid rounded">
      <?php endforeach ?>
    </div>
  </div>
<?php endforeach ?>


<!-- <= adjust_date1($tabel_f2_field10_input, $tabel_f2_field11_input) ?> -->
<?= adjust_col_js() ?>